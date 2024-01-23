<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Produk',
            'menu' => 'masterdata',
            'submenu' => 'produk',
            'page' => 'v_produk',
            'produk' => $this->ModelProduk->AllData(),
            'kategori' => $this->ModelKategori->AllData(),
            'satuan' => $this->ModelSatuan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'kode_produk' => [
                'label' => 'Kode Produk / Barcode',
                'rules' => 'is_unique[tbl_produk.kode_produk]',
                'errors' => [
                    'is_unique' => '{field} Sudah Ada, Masukkan Kode Lain !!',
                ]
            ],
            'satuan' => [
                'label' => 'Jenis Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih !!',
                ]
            ],
            'kategori' => [
                'label' => 'Jenis Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih !!',
                ]
            ],
        ])) {
            $harga_beli = str_replace(",", "", $this->request->getPost('harga_beli'));
            $harga_jual = str_replace(",", "", $this->request->getPost('harga_jual'));
            $data = [
                'kode_produk' => $this->request->getPost('kode_produk'),
                'nama_produk' => $this->request->getPost('nama_produk'),
                'id_kategori' => $this->request->getPost('kategori'),
                'id_satuan' => $this->request->getPost('satuan'),
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'stok' => $this->request->getPost('stok'),
            ];
            $this->ModelProduk->InsertData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('Produk'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Produk'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function UpdateData($id_produk)
    {
        $harga_beli = str_replace(",", "", $this->request->getPost('harga_beli'));
        $harga_jual = str_replace(",", "", $this->request->getPost('harga_jual'));
        $data = [
            'id_produk' => $id_produk,
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('kategori'),
            'id_satuan' => $this->request->getPost('satuan'),
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
            'stok' => $this->request->getPost('stok'),
        ];
        $this->ModelProduk->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
        return redirect()->to(base_url('Produk'));
    }

    public function DeleteData($id_produk)
    {
        $data = [
            'id_produk' => $id_produk,
        ];

        $this->ModelProduk->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to('Produk');
    }
}
