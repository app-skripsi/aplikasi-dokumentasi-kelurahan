<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DokumenModel;

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

		if ($validation->run($data, 'pages/dokumen') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('pages/dokumen/create'));
		} else {
			// insert
			$simpan = $this->dokumen->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('pages/dokumen'));
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
		if ($validation->run($data, 'pages/dokumen') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('pages/dokumen/edit/' . $id));
		} else {
			$ubah = $this->dokumen->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('pages/dokumen'));
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
}
