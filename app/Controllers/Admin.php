<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;
use App\Models\ModelUser;


class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => '',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'v_admin',
            'produktotal' => $this->ModelProduk->AllData(),
            'kategoritotal' => $this->ModelKategori->AllData(),
            'satuantotal' => $this->ModelSatuan->AllData(),
            'usertotal' => $this->ModelUser->AllData(),
        ];
        return view('v_template', $data);
    }

    public function getCounts()
    {
        $userCount = count($this->ModelUser->AllData());
        $kategoriCount = count($this->ModelKategori->AllData());
        $produkCount = count($this->ModelProduk->AllData());
        $satuanCount = count($this->ModelSatuan->AllData());
        return $this->response->setJSON([
            'userCount' => $userCount,
            'kategoriCount' => $kategoriCount,
            'produkCount' => $produkCount,
            'satuanCount' => $satuanCount
        ]);
    }

    public function Settings()
    {
        $data = [
            'judul' => 'Settings',
            'subjudul' => '',
            'menu' => 'settings',
            'submenu' => '',
            'page' => 'v_settings',
        ];
        return view('v_template', $data);
    }
}
