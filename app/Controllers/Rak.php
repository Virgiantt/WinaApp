<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelRak;

class Rak extends BaseController
{
    protected $ModelRak;

    public function __construct()
    {
        helper('form');
        $this->ModelRak = new ModelRak();
    }

    public function index()
    {
        $data = [
            'menu' => 'Master Buku',
            'submenu' => 'Esemka Library | Rak',
            'title' => 'Esemka Library | Rak',
            'page' => 'v_rak',
            'rak' => $this->ModelRak->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $data = [
            'rak_buku' => $this->request->getPost('rak_buku'),
            'no_rak' => $this->request->getPost('no_rak')
        ];
        $this->ModelRak->AddData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambah!');
        return redirect()->to(base_url('Rak'));
    }

    public function EditData($id_rak_buku)
    {
        $data = [
            'id_rak_buku' => $id_rak_buku,
            'rak_buku' => $this->request->getPost('rak_buku'),
            'no_rak' => $this->request->getPost('no_rak')
        ];
        $this->ModelRak->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to(base_url('Rak'));
    }

    public function DeleteData($id_rak_buku)
    {
        $data = ['id_rak_buku' => $id_rak_buku];
        $this->ModelRak->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus!');
        return redirect()->to(base_url('Rak'));
    }
}
