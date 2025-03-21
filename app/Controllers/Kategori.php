<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelKategori;

class Kategori extends BaseController
{
    protected $ModelKategori;

    public function __construct()
    {
        helper('form');
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
        $data = [
            'menu' => 'Master Buku',
            'submenu' => 'Esemka Library | Kategori',
            'title' => 'Esemka Library | Kategori',
            'page' => 'v_kategori',
            'kategori' => $this->ModelKategori->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Add()
    {
        $data = ['nama_kategori' => $this->request->getPost('nama_kategori')];
        $this->ModelKategori->Add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambah!');
        return redirect()->to(base_url('Kategori'));
    }

    public function EditData($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ];
        $this->ModelKategori->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to(base_url('Kategori'));
    }

    public function DeleteData($id_kategori)
    {
        $data = ['id_kategori' => $id_kategori];
        $this->ModelKategori->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus!');
        return redirect()->to(base_url('Kategori'));
    }
}
