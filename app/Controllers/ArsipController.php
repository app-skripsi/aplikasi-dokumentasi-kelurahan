<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArsipModel;
use App\Models\PegawaiModel;

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
}
