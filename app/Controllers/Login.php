<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LoginModel;

class Login extends BaseController
{
    protected $userModel;
    protected $loginModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('user/login', $data);
    }

    public function check()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // $enkripsi = \Config\Services::encrypter();
        // $pw = $enkripsi->encrypt($this->request->getPost('password'));

        $cek = $this->loginModel->check($username, md5($password));

        if (($cek['username'] == $username) && ($cek['password'] == md5($password)) && ($cek['status'] == 1)) {
            $data = [
                'id' => $cek['id'],
                'nama' => $cek['nama'],
                'username' => $cek['username'],
                'password' => $password,
                'no_telp' => $cek['no_telp'],
                'profil' => $cek['profil'],
                'level' => $cek['level'],
                'status' => $cek['status']
            ];
            session()->set($data);
            return redirect()->to('/');
        } elseif (($cek['username'] == $username) && ($cek['password'] == md5($password)) && ($cek['status'] == 0)) {
            session()->setFlashdata('salah', 'Akun Sudah Dinonaktifkan');
            return redirect()->to('/Login');
        } else {
            session()->setFlashdata('salah', 'Username atau Password Salah');
            return redirect()->to('/Login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
