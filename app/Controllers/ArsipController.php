<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArsipModel;
use App\Models\PegawaiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ArsipController extends BaseController
{
    protected $arsip;
	protected $pegawai;

    public function __construct()
	{
		helper(['form']);
		$this->arsip = new ArsipModel();
		$this->pegawai = new PegawaiModel();
	}

	public function index()
	{
		$data['arsip'] = $this->arsip->findAll();
		echo view('pages/arsip/index', $data);
	}

	public function create()
	{
		return view('pages/arsip/create', );
	}

	public function store()
	{
		// proteksi halaman
		// if (session()->get('username') == '') {
		// 	session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
		// 	return redirect()->to(base_url('login'));
		// }
		$validation =  \Config\Services::validation();
		$data = array(
			'kode_arsip'        	=> $this->request->getPost('kode_arsip'),
			'nama_arsip'         		=> $this->request->getPost('nama_arsip'),
			'jenis_arsip'         		=> $this->request->getPost('jenis_arsip'),
			'tanggal_pembuatan'         		=> $this->request->getPost('tanggal_pembuatan'),
			'lokasi_arsip'         		=> $this->request->getPost('lokasi_arsip'),
		);

		if ($validation->run($data, 'arsip') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('arsip/create'));
		} else {
			$simpan = $this->arsip->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('arsip'));
			}
		}
	}


	public function edit($id)
	{
		// proteksi halaman
		// if (session()->get('username') == '') {
		// 	session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
		// 	return redirect()->to(base_url('login'));
		// }
		
		$arsip['arsip'] = $this->arsip->getData($id);
		echo view('pages/arsip/edit', $arsip);
	}

	public function update()
	{
		// proteksi halaman
		// if (session()->get('username') == '') {
		// 	session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
		// 	return redirect()->to(base_url('login'));
		// }
		$id = $this->request->getPost('id');

		$validation =  \Config\Services::validation();

		$data = array(
			'kode_arsip'        	=> $this->request->getPost('kode_arsip'),
			'nama_arsip'         		=> $this->request->getPost('nama_arsip'),
			'jenis_arsip'         		=> $this->request->getPost('jenis_arsip'),
			'tanggal_pembuatan'         		=> $this->request->getPost('tanggal_pembuatan'),
			'lokasi_arsip'         		=> $this->request->getPost('lokasi_arsip'),
		);
		if ($validation->run($data, 'arsip') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('pages/arsip/edit/' . $id));
		} else {
			$ubah = $this->arsip->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('arsip'));
			}
		}
	}
	public function delete($id)
	{
		// proteksi halaman
		// if (session()->get('username') == '') {
		// 	session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
		// 	return redirect()->to(base_url('login'));
		// }
		$hapus = $this->arsip->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data  Berhasil');
			return redirect()->to(base_url('arsip'));
		}
	}
	
	public function xls()
	{
		$exportXls = $this->arsip->findAll();
		$spreadsheet = new Spreadsheet();
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'Laporan Data Arsip Kelurahan Jatiwarna')
			->setCellValue('A2', 'Tanggal: ' . date('Y-m-d'))
			->setCellValue('B3', 'Kode Arsip')
			->setCellValue('C3', 'Nama Arsip')
			->setCellValue('D3', 'Jenis Arsip')
			->setCellValue('E3', 'Tanggal Pembuatan')
			->setCellValue('F3', 'Lokasi Arsip');
	
		// Merge cells for the title
		$spreadsheet->getActiveSheet()->mergeCells('A1:F1');
		$spreadsheet->getActiveSheet()->mergeCells('A2:F2');
		// Center align the title
		$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
		$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

		// Add yellow background and border to the title row
		$spreadsheet->getActiveSheet()->getStyle('A1:F2')->applyFromArray([
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
				'startColor' => ['rgb' => 'FFFF00'], // Yellow background
			],
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		]);
	
		// Set column widths
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(20); // Width for cell A2
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(30);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(30);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	    $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

		// Center align column headers
		$spreadsheet->getActiveSheet()->getStyle('B3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
	
		$column = 4;
		$rowNumber = 1;
	
		foreach ($exportXls as $arsips) {
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('B' . $column, $arsips['kode_arsip'])
				->setCellValue('C' . $column, $arsips['nama_arsip'])
				->setCellValue('D' . $column, $arsips['jenis_arsip'])
				->setCellValue('E' . $column, $arsips['tanggal_pembuatan'])
				->setCellValue('F' . $column, $arsips['lokasi_arsip']);
	
			// Set auto numbering on the left side of the data
			$spreadsheet->getActiveSheet()->setCellValue('A' . $column, $rowNumber++);
			$spreadsheet->getActiveSheet()->getStyle('A' . $column . ':F' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$column++;
		}
	
		// Set border for data cells
		$highestColumn = $spreadsheet->getActiveSheet()->getHighestColumn();
		$highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
		$range = 'A3:' . $highestColumn . $highestRow;
		$spreadsheet->getActiveSheet()->getStyle($range)->applyFromArray([
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		]);
		$spreadsheet->getActiveSheet()->setCellValue('A3', 'No');
		$writer = new Xlsx($spreadsheet);
		$filename = date('Y-m-d-His'). '-Data-Arsip';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
