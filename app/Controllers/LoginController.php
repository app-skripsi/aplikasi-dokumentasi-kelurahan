<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $login;
    public function __construct()
    {
        helper('form');
        $this->login = new UserModel();
    }

    public function index()
    {
        return view('pages/secure/login');
    }

    public function cek_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $this->login->cek_login($username, $password);


        if ($cek !== null && ($cek['username'] == $username) && ($cek['password'] == $password)) {
            // pengecekan jika username dan password benar
            session()->set('nama_user', $cek['nama_user']);
            session()->set('username', $cek['username']);
            session()->set('level', $cek['level']);
            return redirect()->to(base_url('/dashboard'));
        } else {
            // jika pengecekan salah 
            session()->setFlashData('gagal', 'Username atau password tidak benar');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->remove('nama_user');
        session()->remove('username');
        session()->remove('level');
        session()->setFlashData('sukses', 'Anda Berhasil Logout');
        return redirect()->to(base_url('/'));
    }
}