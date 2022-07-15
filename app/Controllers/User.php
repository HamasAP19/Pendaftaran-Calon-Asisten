<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Form Login Calon Asisten Praktikum Informatika',
            'validation'    => \Config\Services::validation()
        ];
        return view('login/form_login', $data);
    }

    public function masuk()
    {
        if (!$this->validate([
            'username'  => [
                'rules'     => 'required|valid_email',
                'errors'    => [
                    'required'      => '{field} harus diisi',
                    'valid_email'   => 'Email tidak valid'
                ]
            ],
            'password'  => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => '{field} harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $inputData = $this->userModel->loginUser($this->request->getVar('username'), $this->request->getVar('password'));

            if ($inputData) {
                session()->set('nama_user', $inputData['nama_user']);
                echo "<h3>Berhasil Login, Selamat Datang </h3><h1>" . session()->get('nama_user') . "</h1>";
                echo "<a href=''>Masuk Dashboard</a>";
            } else {
                session()->setFlashdata('gagalLogin', true);
                return redirect('/')->withInput();
            }
        }
    }

    public function daftar()
    {
        $data = [
            'title'         => "Form Pendaftaran Akun Calon Asisten Praktikum Informatika",
            'validation'    => \Config\Services::validation()
        ];
        return view('form_daftar', $data);
    }

    public function insert()
    {
        if (!$this->validate([
            'namaLengkap'  => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Nama Lengkap harus diisi'
                ]
            ],
            'email'  => [
                'rules'     => 'required|valid_email',
                'errors'    => [
                    'required'      => 'Email harus diisi',
                    'valid_email'   => 'Email tidak valid'
                ]
            ],
            'password'  => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Password harus diisi'
                ]
            ],
            'angkatan'  => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Angkatan harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
}
