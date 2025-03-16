<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKelas;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelMember;

class Member extends BaseController
{
    protected $ModelMember;
    protected $ModelKelas;

    public function __construct()
    {
        helper('form');
        $this->ModelMember = new ModelMember;
        $this->ModelKelas = new ModelKelas;
    }

    public function index()
    {
        $data = [
            'menu' => 'Master Member',
            'submenu' => 'Esemka Library | Member',
            'title' => 'Esemka Library | Member',
            'page' => 'Member/v_index',
            'member' => $this->ModelMember->AllData(),
        ];
        return view('member/index', $data);
    }

    public function Verifikasi($id_member)
    {
        $data = [
            'id_member' => $id_member,
            'verifikasi' => '1',
        ];
        $this->ModelMember->EditData($data);
        session()->setFlashdata('pesan', 'Berhasil Verifikasi!');
        return redirect()->to(base_url('Member'));
    }

    public function AddData()
    {
        $data = [
            'menu' => 'Master Member',
            'submenu' => 'Esemka Library | Member',
            'title' => 'Esemka Library | Member',
            'page' => 'Member/v_adddata',
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanData()
    {
        if ($this->validate([
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
            'nis' => [
                'label' => 'NIS',
                'rules' => 'required|is_unique[tbl_member.nis]',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                    'is_unique' => '{field} Sudah terdaftar! ',
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
            'no_hp' => [
                'label' => 'No Handphone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
            'foto' => [
                'label' => 'Foto Member',
                'rules' => 'uploaded[foto]|max_size[foto,1500]|mime_in[foto,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi!',
                    'max_size' => '{field} Max 1500 Kb!',
                    'mime_in' => 'Format {field} Harus jpg,jpeg!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();
            $data = [
                'id_kelas' => $this->request->getPost('id_kelas'),
                'nis' => $this->request->getPost('nis'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'no_hp' => $this->request->getPost('no_hp'),
                'password' => $this->request->getPost('password'),
                'verifikasi' => '1',
                'foto' => $nama_file,
            ];
            $foto->move('foto', $nama_file);
            $this->ModelMember->AddData($data);
            session()->setFlashdata('pesan', 'Data Member Berhasil Disimpan');
            return redirect()->to(base_url('Member/AddData'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Member/AddData'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function EditData($id_member)
    {
        $data = [
            'menu' => 'Master Member',
            'submenu' => 'Esemka Library | Member',
            'title' => 'Esemka Library | Member',
            'page' => 'Member/v_editdata',
            'kelas' => $this->ModelKelas->AllData(),
            'member' => $this->ModelMember->DetailData($id_member),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateData($id_member)
    {
        if ($this->validate([
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
            'nis' => [
                'label' => 'NIS',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                    'is_unique' => '{field} Sudah terdaftar! ',
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
            'no_hp' => [
                'label' => 'No Handphone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
            'foto' => [
                'label' => 'Foto Member',
                'rules' => 'max_size[foto,1500]|mime_in[foto,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Max 1500 Kb!',
                    'mime_in' => 'Format {field} Harus jpg,jpeg!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = [
                    'id_member' => $id_member,
                    'id_kelas' => $this->request->getPost('id_kelas'),
                    'nis' => $this->request->getPost('nis'),
                    'nama_siswa' => $this->request->getPost('nama_siswa'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'password' => $this->request->getPost('password'),
                    'verifikasi' => '1',
                ];
                $this->ModelMember->EditData($data);
            } else {
                $member = $this->ModelMember->DetailData($id_member);
                if ($member['foto'] <> '') {
                    unlink('foto/' . $member['foto']);
                }
                $nama_file = $foto->getRandomName();
                $data = [
                    'id_member' => $id_member,
                    'id_kelas' => $this->request->getPost('id_kelas'),
                    'nis' => $this->request->getPost('nis'),
                    'nama_siswa' => $this->request->getPost('nama_siswa'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'password' => $this->request->getPost('password'),
                    'verifikasi' => '1',
                    'foto' => $nama_file,
                ];
                $foto->move('foto', $nama_file);
                $this->ModelMember->EditData($data);
            }
            session()->setFlashdata('pesan', 'Data Member Berhasil Diubah');
            return redirect()->to(base_url('Member'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Member/EditData/' . $id_member));
        }
    }

    public function DeleteData($id_member)
    {
        //Hapus Foto
        $member = $this->ModelMember->DetailData($id_member);
        if ($member['foto'] <> '') {
            unlink('foto/' . $member['foto']);
        }

        $data = ['id_member' => $id_member];
        $this->ModelMember->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus!');
        return redirect()->to(base_url('Member'));
    }

    public function soal()
    {
        return view('Member/soal/soal'); // Sesuaikan dengan nama file view soal
    }
}
