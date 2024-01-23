<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function Register()
    {
        $data = array(
            'title' => 'Register'
        );
        return view('v_register', $data);
    }

    public function Save_Register()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi!!'
                ]
            ],
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi!!'
                ]
            ],
            'repassword' => [
                'label' => 'Retype Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Wajid Diisi!!',
                    'matches' => '{field} Tidak Sama dengan Password!!'
                ]
            ]

        ])) {
            //Valid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => sha1($this->request->getPost('password')),
                'role' => 2
            );
            $this->ModelAuth->Save_Register($data);
            session()->setFlashdata('pesan', 'Registrasi Berhasil');
            return redirect()->to(base_url('Home'));
        } else {
            //Not Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/Register'));
        }
    }

    public function RegisterAdmin()
    {
        $data = array(
            'title' => 'Register'
        );
        return view('v_register_admin', $data);
    }

    public function Save_Register_Admin()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi!!'
                ]
            ],
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi!!'
                ]
            ],
            'repassword' => [
                'label' => 'Retype Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Wajid Diisi!!',
                    'matches' => '{field} Tidak Sama dengan Password!!'
                ]
            ]

        ])) {
            //Valid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => sha1($this->request->getPost('password')),
                'role' => 1
            );
            $this->ModelAuth->Save_Register($data);
            session()->setFlashdata('pesan', 'Registrasi Berhasil');
            return redirect()->to(base_url('Home'));
        } else {
            //Not Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/Register'));
        }
    }
}
