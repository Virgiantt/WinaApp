<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelKelas;

class Kelas extends BaseController
{
    protected $Modelkelas;

    public function __construct()
    {
        helper('form');
        $this->Modelkelas = new ModelKelas();
    }

    public function index()
    {
        $data = [
            'menu' => 'Master Member',
            'submenu' => 'Esemka Library | Kelas',
            'title' => 'Esemka Library | Kelas',
            'page' => 'v_kelas',
            'kelas' => $this->Modelkelas->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $data = [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
        ];
        $this->Modelkelas->AddData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambah!');
        return redirect()->to(base_url('Kelas'));
    }

    public function EditData($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
            'nama_kelas' => $this->request->getPost('nama_kelas'),
        ];
        $this->Modelkelas->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to(base_url('Kelas'));
    }

    public function DeleteData($id_kelas)
    {
        $data = ['id_kelas' => $id_kelas];
        $this->Modelkelas->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus!');
        return redirect()->to(base_url('Kelas'));
    }
}
