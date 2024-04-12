<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class PegawaiController extends BaseController
{

    protected $pegawai;

    public function __construct() {
        helper(['form']);
    $this->pegawai = new PegawaiModel();
    }

   public function index()
	{
		$data['pegawai'] = $this->pegawai->findAll();
		echo view('pages/pegawai/index', $data);
	}


    public function create()
	{
		// proteksi halaman
		// if (session()->get('username') == '') {
		// 	session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
		// 	return redirect()->to(base_url('login'));
		// }
		return view('pages/pegawai/create');
	}

	public function store()
	{
		$validation =  \Config\Services::validation();
		$data = array(
            'nama'      => $this->request->getPost('nama'),
            'nip'       => $this->request->getPost('nip'),
            'jabatan'   => $this->request->getPost('jabatan'),
		);

		if ($validation->run($data, 'pegawai') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('pegawai/create'));
		} else {
			$simpan = $this->pegawai->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('pegawai'));
			}
		}
	}


	public function edit($id)
	{
		$data['pegawai'] = $this->pegawai->find($id); // Menggunakan method find() untuk mencari pegawai berdasarkan ID
    if (!$data['pegawai']) {
        throw new \Exception('Pegawai tidak ditemukan'); // Jika pegawai tidak ditemukan, lemparkan exception
    }
    return view('pages/pegawai/edit', $data);
	}

    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama'      => $this->request->getPost('nama'),
            'nip'       => $this->request->getPost('nip'),
            'jabatan'   => $this->request->getPost('jabatan'),
        ];
        // Panggil metode updateData dari model untuk melakukan pembaruan data
        $ubah = $this->pegawai->updateData($id, $data);
        if ($ubah) {
            session()->setFlashdata('info', 'Update Data Berhasil');
            return redirect()->to(base_url('pegawai'));
        } else {
            // Jika gagal melakukan pembaruan, tampilkan pesan kesalahan
            session()->setFlashdata('error', 'Gagal melakukan pembaruan data');
            return redirect()->to(base_url('pegawai/edit/' . $id));
        }
    }
	public function delete($id)
	{
		// proteksi halaman
		// if (session()->get('username') == '') {
		// 	session()->setFlashdata('harus login', 'Silahkan Login Terlebih Dahulu');
		// 	return redirect()->to(base_url('login'));
		// }
		$hapus = $this->pegawai->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data  Berhasil');
			return redirect()->to(base_url('pegawai'));
		}
	}

}
