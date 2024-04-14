<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DokumenModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DokumenController extends BaseController
{
    protected $dokumen;

    public function __construct()
	{
		helper(['form']);
		$this->dokumen = new DokumenModel();
	}

	public function index()
	{
		$data['dokumen'] = $this->dokumen->findAll();
		echo view('pages/dokumen/index', $data);
	}

	public function create()
	{
		// proteksi halaman
		// if (session()->get('username') == '') {
		// 	session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
		// 	return redirect()->to(base_url('login'));
		// }
		return view('pages/dokumen/create');
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
			'nama_dokumen'        	=> $this->request->getPost('nama_dokumen'),
			'tipe_dokumen'         		=> $this->request->getPost('tipe_dokumen'),
			'jenis_dokumen'         		=> $this->request->getPost('jenis_dokumen'),
			'lokasi_dokumen'         		=> $this->request->getPost('lokasi_dokumen'),
			'tanggal_upload'         		=> $this->request->getPost('tanggal_upload'),
		);

		if ($validation->run($data, 'dokumen') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('pages/dokumen/create'));
		} else {
			// insert
			$simpan = $this->dokumen->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('dokumen'));
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
		$data['pages/dokumen'] = $this->dokumen->getData($id);
		echo view('pages/dokumen/edit', $data);
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
			'nama_dokumen'        	=> $this->request->getPost('nama_dokumen'),
			'tipe_dokumen'         		=> $this->request->getPost('tipe_dokumen'),
			'jenis_dokumen'         		=> $this->request->getPost('jenis_dokumen'),
			'lokasi_dokumen'         		=> $this->request->getPost('lokasi_dokumen'),
			'tanggal_upload'         		=> $this->request->getPost('tanggal_upload'),

		);
		if ($validation->run($data, 'dokumen') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('pages/dokumen/edit/' . $id));
		} else {
			$ubah = $this->dokumen->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('dokumen'));
			}
		}
	}
	public function delete($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$hapus = $this->dokumen->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data  Berhasil');
			return redirect()->to(base_url('pages/dokumen'));
		}
	}

	public function xls()
	{
		$exportXls = $this->dokumen->findAll();
		$spreadsheet = new Spreadsheet();
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'Laporan Data Dokumen Kelurahan Jatiwarna')
			->setCellValue('A2', 'Tanggal: ' . date('Y-m-d'))
			->setCellValue('B3', 'Nama Dokumen')
			->setCellValue('C3', 'Tipe Dokumen')
			->setCellValue('D3', 'Jenis Dokumen')
			->setCellValue('E3', 'Lokasi Dokumen')
			->setCellValue('F3', 'Tanggal Upload');
	
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
	
		foreach ($exportXls as $dokumens) {
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('B' . $column, $dokumens['nama_dokumen'])
				->setCellValue('C' . $column, $dokumens['tipe_dokumen'])
				->setCellValue('D' . $column, $dokumens['jenis_dokumen'])
				->setCellValue('E' . $column, $dokumens['lokasi_dokumen'])
				->setCellValue('F' . $column, $dokumens['tanggal_upload']);
	
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
		$filename = date('Y-m-d-His'). '-Data-Dokumen';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
