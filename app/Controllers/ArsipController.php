<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArsipModel;
use App\Models\JenisModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;

class ArsipController extends BaseController
{
	protected $arsip;
	protected $jenis;

	public function __construct()
	{
		helper(['form']);
		$this->arsip = new ArsipModel();
		$this->jenis = new JenisModel();
	}

	public function index()
	{
		$data['arsip'] = $this->arsip->select('arsip.*, jenis.nama')
			->join('jenis', 'jenis.id = arsip.jenis_id')
			->findAll();
		echo view('pages/arsip/index', $data);
	}

	public function create()
	{
		$jenis = $this->jenis->findAll();
		$data = ['jenis' => $jenis];
		return view('pages/arsip/create', $data);
	}

	public function store()
	{
		$downloadFile = $this->request->getFile('download_file');
		if(!$downloadFile){
			session()->setFlashdata('error','File upload tidak ditemukan');
			return redirect()->to(base_url('arsip/create'));
		}
		if ($downloadFile->isValid() && !$downloadFile->hasMoved()) {
            $resultDownlodFile = $downloadFile->getName();
            $downloadFile->move('uploads/arsip/', $resultDownlodFile);
        } else {
            session()->setFlashdata('error', 'File upload gagal');
            return redirect()->to(base_url('arsip/create'));
        }
		$validation = \Config\Services::validation();
		$data = array(
			'jenis_id' => $this->request->getPost('jenis_id'),
			'kode_arsip' => $this->request->getPost('kode_arsip'),
			'download_file'	=> $resultDownlodFile,
			'pic'			=> $this->request->getPost('pic'),
			'nama_arsip' => $this->request->getPost('nama_arsip'),
			'tanggal_pembuatan' => $this->request->getPost('tanggal_pembuatan'),
			'lokasi_arsip' => $this->request->getPost('lokasi_arsip'),
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
		$jenis = $this->jenis->findAll();
		$data['jenis'] = ['' => 'Pilih jenis'] + array_column($jenis, 'nama', 'id');
		$data['arsip'] = $this->arsip->find($id);
		return view('pages/arsip/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('id');
		$validation = \Config\Services::validation();

		$data = array(
			'jenis_id' => $this->request->getPost('jenis_id'),
			'kode_arsip' => $this->request->getPost('kode_arsip'),
			'nama_arsip' => $this->request->getPost('nama_arsip'),
			'tanggal_pembuatan' => $this->request->getPost('tanggal_pembuatan'),
			'lokasi_arsip' => $this->request->getPost('lokasi_arsip'),
		);
		if ($validation->run($data, 'arsip') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('pages/arsip/edit/' . $id));
		} else {
			$ubah = $this->arsip->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('success', 'Update Data Berhasil');
				session()->setFlashdata('alert', 'success');
				return redirect()->to(base_url('arsip'));
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
		$hapus = $this->arsip->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data  Berhasil');
			return redirect()->to(base_url('arsip'));
		}
	}

	public function xls()
	{
		$exportXls = $this->arsip->getAllArsip(); // Menggunakan metode yang telah diubah di ArsipModel
		$spreadsheet = new Spreadsheet();
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'Laporan Data Arsip Kelurahan Jatiwarna')
			->setCellValue('A2', 'Tanggal: ' . date('Y-m-d'))
			->setCellValue('B3', 'Kode Arsip')
			->setCellValue('C3', 'Nama Arsip')
			->setCellValue('D3', 'Jenis Arsip')
			->setCellValue('E3', 'Tanggal Pembuatan')
			->setCellValue('F3', 'Lokasi Arsip')
			->setCellValue('G3', 'Pic');

		// Merge cells for the title
		$spreadsheet->getActiveSheet()->mergeCells('A1:G1');
		$spreadsheet->getActiveSheet()->mergeCells('A2:G2');
		// Center align the title
		$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
		$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

		// Add yellow background and border to the title row
		$spreadsheet->getActiveSheet()->getStyle('A1:G2')->applyFromArray([
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
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(30);
		$spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

		// Center align column headers
		$spreadsheet->getActiveSheet()->getStyle('B3:G3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

		$column = 4;
		$rowNumber = 1;

		foreach ($exportXls as $arsips) {
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('B' . $column, $arsips['kode_arsip'])
				->setCellValue('C' . $column, $arsips['nama_arsip'])
				->setCellValue('D' . $column, $arsips['nama_jenis']) // Menggunakan 'nama_jenis' yang telah di-alias di query
				->setCellValue('E' . $column, $arsips['tanggal_pembuatan'])
				->setCellValue('F' . $column, $arsips['lokasi_arsip'])
				->setCellValue('G' . $column, $arsips['pic']);

			// Set auto numbering on the left side of the data
			$spreadsheet->getActiveSheet()->setCellValue('A' . $column, $rowNumber++);
			$spreadsheet->getActiveSheet()->getStyle('A' . $column . ':G' . $column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
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
		$filename = date('Y-m-d-His') . '-Data-Arsip';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function pdf()
	{
		// Proteksi halaman
		$data = array(
			'arsip' => $this->arsip->getData(),
		);
		$html = view('pages/arsip/pdf', $data);

		// Initialize TCPDF object
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Adelia');
		$pdf->SetTitle('Laporan Data Arsip Kelurahan Jatiwarna');
		$pdf->SetSubject('Laporan Data Arsip');

		// Calculate responsive logo width based on the page width
		$pageWidth = $pdf->getPageWidth();
		$logoWidth = $pageWidth * 0.15; // Adjust the multiplier as needed for your desired logo size

		// Set header data with responsive logo width
		$pdf->SetHeaderData(PDF_HEADER_LOGO, $logoWidth, 'Laporan Arsip Kelurahan Jatiwarna', 'Jalan Pasar Kecapi, Jatiwarna, Pondokmelati, RT.003/RW.001, Jatiwarna, Bekasi, Kota Bks, Jawa Barat 17415', PDF_HEADER_STRING);

		$pdf->SetY(50); // Adjust position as needed
		$pdf->Line(10, $pdf->GetY(), $pdf->getPageWidth() - 10, $pdf->GetY());

		// Set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// Set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// Set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// Set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->AddPage();

		// Set header
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', 12));
		$pdf->SetFont('dejavusans', '', 10);

		// Write HTML content
		$pdf->writeHTML($html, true, false, true, false, '');

		// Output PDF
		$this->response->setContentType('application/pdf');
		$pdf->Output('Data-Arsip.pdf', 'I');
	}

}
