<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelUser;

class User extends BaseController
{
    protected $ModelUser;

    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'menu' => 'Pengaturan',
            'submenu' => 'Esemka Library | User',
            'title' => 'Esemka Library | User',
            'page' => 'user/v_index',
            'user' => $this->ModelUser->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $data = [
            'menu' => 'Pengaturan',
            'submenu' => 'Esemka Library | User',
            'title' => 'Esemka Library | User',
            'page' => 'user/v_adddata',
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanData()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                    'is_unique' => '{field} Sudah Digunakan, Gunakan E-Mail Lain!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'no_hp' => [
                'label' => 'No HandPhone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'foto' => [
                'label' => 'Foto User',
                'rules' => 'uploaded[foto]|max_size[foto,1500]|mime_in[foto,image/png,image/jpg,image/gif/,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi!',
                    'max_size' => '{field} Max 1024 Kb!',
                    'mime_in' => 'Format {field} Harus jpg,png,gif,jpeg!',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();
            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'no_hp' => $this->request->getPost('no_hp'),
                'level' => $this->request->getPost('level'),
                'foto' => $nama_file,
            ];
            $foto->move('foto', $nama_file);
            $this->ModelUser->AddData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambah!');
            return redirect()->to(base_url('User'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('User/AddData'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function EditData($id_user)
    {
        $data = [
            'menu' => 'Pengaturan',
            'submenu' => 'Esemka Library | Edit',
            'title' => 'Esemka Library | Edit',
            'page' => 'User/v_editdata',
            'user' => $this->ModelUser->DetailData($id_user),
        ];
        return view('v_template_admin', $data);
    }

    public  function UpdateData($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'no_hp' => [
                'label' => 'No HandPhone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!',
                ]
            ],
            'foto' => [
                'label' => 'Foto User',
                'rules' => 'max_size[foto,1500]|mime_in[foto,image/png,image/jpg,image/gif/,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Max 1500 Kb!',
                    'mime_in' => 'Format {field} Harus jpg,png,gif,jpeg!',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4) {
                $nama_file = $foto->getRandomName();
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'level' => $this->request->getPost('level'),
                ];
                $this->ModelUser->EditData($data);
            } else {
                //Hapus Foto Lama
                $user = $this->ModelUser->DetailData($id_user);
                if ($user['foto'] <> '') {
                    unlink('foto/' . $user['foto']);
                }

                $nama_file = $foto->getRandomName();
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'level' => $this->request->getPost('level'),
                    'foto' => $nama_file,
                ];
                $foto->move('foto', $nama_file);
                $this->ModelUser->EditData($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
            return redirect()->to(base_url('User'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('User/EditData/' . $id_user));
        }
    }

    public function DeleteData($id_user)
    {
        //Hapus Foto
        $user = $this->ModelUser->DetailData($id_user);
        if ($user['foto'] <> '') {
            unlink('foto/' . $user['foto']);
        }

        $data = ['id_user' => $id_user];
        $this->ModelUser->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus!');
        return redirect()->to(base_url('User'));
    }
}
