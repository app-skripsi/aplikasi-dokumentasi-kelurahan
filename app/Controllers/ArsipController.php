<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArsipModel;

class ArsipController extends BaseController
{
    protected $arsip;

    public function __construct()
	{
		helper(['form']);
		$this->arsip = new ArsipModel();
	}

	public function index()
	{
		$data['arsip'] = $this->arsip->findAll();
		echo view('pages/arsip/index', $data);
	}

	public function create()
	{
		// proteksi halaman
		// if (session()->get('username') == '') {
		// 	session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
		// 	return redirect()->to(base_url('login'));
		// }
		return view('pages/arsip/create');
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
			'number'        	=> $this->request->getPost('number'),
			'kode'         		=> $this->request->getPost('kode'),
			'nama'         		=> $this->request->getPost('nama'),
			'type'         		=> $this->request->getPost('type'),
			'date'         		=> $this->request->getPost('date'),
			'record'         	=> $this->request->getPost('record'),
			'pic'         		=> $this->request->getPost('pic'),
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
		if (session()->get('username') == '') {
			session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$data['pages/arsip'] = $this->arsip->getData($id);
		echo view('pages/arsip/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('id');

		$validation =  \Config\Services::validation();

		$data = array(
			'number'        	=> $this->request->getPost('number'),
			'kode'         		=> $this->request->getPost('kode'),
			'nama'         		=> $this->request->getPost('nama'),
			'type'         		=> $this->request->getPost('type'),
			'date'         		=> $this->request->getPost('date'),
			'record'         	=> $this->request->getPost('record'),
			'pic'         		=> $this->request->getPost('pic'),

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
