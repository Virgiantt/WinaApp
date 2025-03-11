<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelBuku;
use App\Models\ModelKategori;
use App\Models\ModelRak;
use App\Models\ModelPenerbit;
use App\Models\ModelPenulis;

class Buku extends BaseController
{
    protected $ModelBuku;
    protected $ModelKategori;
    protected $ModelRak;
    protected $ModelPenerbit;
    protected $ModelPenulis;

    public function __construct()
    {
        helper('form');
        $this->ModelBuku = new ModelBuku;
        $this->ModelKategori = new ModelKategori();
        $this->ModelRak = new ModelRak();
        $this->ModelPenerbit = new ModelPenerbit();
        $this->ModelPenulis = new ModelPenulis();
    }

    public function index()
    {
        $data = [
            'menu' => 'Master Buku',
            'submenu' => 'Esemka Library | Buku',
            'title' => 'Esemka Library | Buku',
            'page' => 'Buku/v_index',
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $data = [
            'menu' => 'Master Buku',
            'submenu' => 'Esemka Library | Buku',
            'title' => 'Esemka Library | Buku',
            'page' => 'buku/v_adddata',
            'kategori' => $this->ModelKategori->AllData(),
            'penulis' => $this->ModelPenulis->AllData(),
            'penerbit' => $this->ModelPenerbit->AllData(),
            'rak' => $this->ModelRak->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanData()
    {
        if ($this->validate([
            'kode_buku' => [
                'label' => 'Kode Buku',
                'rules' => 'required|is_unique[tbl_buku.kode_buku]',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                    'is_unique' => '{field} Sudah Digunakan, Gunakan Kode Lain!',
                ]
            ],
            'isbn' => [
                'label' => 'ISBN',
                'rules' => 'required|is_unique[tbl_buku.isbn]',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                    'is_unique' => '{field} Kode ISBN Sudah Digunakan!',
                ]
            ],
            'judul_buku' => [
                'label' => 'Judul Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'id_penulis' => [
                'label' => 'Penulis',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'id_rak_buku' => [
                'label' => 'Lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'id_penerbit' => [
                'label' => 'Penerbit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'tahun' => [
                'label' => 'Tahun',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'bahasa' => [
                'label' => 'Bahasa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'halaman' => [
                'label' => 'Halaman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'jumlah_buku' => [
                'label' => 'Jumlah Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'cover' => [
                'label' => 'Cover Buku',
                'rules' => 'uploaded[cover]|max_size[cover,2048]|mime_in[cover,image/png,image/jpg,image/gif/,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi!',
                    'max_size' => '{field} Max 2048 Kb!',
                    'mime_in' => 'Format {field} Harus jpg,png,gif,jpeg!',
                ]
            ],
        ])) {
            $cover = $this->request->getFile('cover');
            $nama_file = $cover->getRandomName();
            $data = [
                'kode_buku' => $this->request->getPost('kode_buku'),
                'judul_buku' => $this->request->getPost('judul_buku'),
                'isbn' => $this->request->getPost('isbn'),
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'id_penulis' => $this->request->getPost('id_penulis'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_rak_buku' => $this->request->getPost('id_rak'),
                'tahun' => $this->request->getPost('tahun'),
                'bahasa' => $this->request->getPost('bahasa'),
                'halaman' => $this->request->getPost('halaman'),
                'jumlah_buku' => $this->request->getPost('jumlah_buku'),
                'cover' => $nama_file,
            ];
            $cover->move('cover', $nama_file);
            $this->ModelBuku->AddData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambah!');
            return redirect()->to(base_url('Buku/AddData'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Buku/AddData'))->withInput('validation', \Config\Services::validation());
        }
    }
}
