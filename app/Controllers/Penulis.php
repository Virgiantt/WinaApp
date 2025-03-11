<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenulis;
use CodeIgniter\HTTP\ResponseInterface;

class Penulis extends BaseController
{
    protected $ModelPenulis;

    public function __construct()
    {
        helper('form');
        $this->ModelPenulis = new ModelPenulis();
    }

    public function index()
    {
        $data = [
            'menu' => 'Master Buku',
            'submenu' => 'Esemka Library | Penulis',
            'title' => 'Esemka Library | Penulis',
            'page' => 'v_Penulis',
            'Penulis' => $this->ModelPenulis->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $data = ['nama_penulis' => $this->request->getPost('nama_penulis')];
        $this->ModelPenulis->AddData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambah!');
        return redirect()->to(base_url('Penulis'));
    }

    public function EditData($id_Penulis)
    {
        $data = [
            'id_Penulis' => $id_Penulis,
            'nama_Penulis' => $this->request->getPost('nama_Penulis')
        ];
        $this->ModelPenulis->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to(base_url('Penulis'));
    }

    public function DeleteData($id_Penulis)
    {
        $data = [
            'id_Penulis' => $id_Penulis,
        ];
        $this->ModelPenulis->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('Penulis'));
    }
}
