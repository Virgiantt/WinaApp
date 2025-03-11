<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use App\Models\ModelKelas;

class Auth extends BaseController
{
    protected $ModelAuth;
    protected $ModelKelas;

    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth;
        $this->ModelKelas = new ModelKelas;
    }

    public function index()
    {
        $data = [
            'title' => 'Esemka Library | Login',
            'page' => 'v_login'
        ];
        return view('v_template_login', $data);
    }

    public function LoginUser()
    {
        $data = [
            'title' => 'Esemka Library | Login User',
            'page' => 'v_login_user'
        ];
        return view('v_template_login', $data);
    }

    public function CekLoginUser()
    {
        if ($this->validate([
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                    'valid_email' => '{field} Format nis! ',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ]
        ])) {
            $nis = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->LoginUser($nis, $password);
            if ($cek_login) {
                session()->set('id_user', $cek_login['id_user']);
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('email', $cek_login['email']);
                session()->set('level', $cek_login['level']);
                return redirect()->to(base_url('Admin'));
            } else {
                session()->setFlashdata('pesan', 'E-Mail atau Password Salah!');
                return redirect()->to(base_url('Auth/LoginUser'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/LoginUser'));
        }
    }

    public function LoginMember()
    {
        $data = [
            'title' => 'Esemka Library | Login Member',
            'page' => 'v_login_member'
        ];
        return view('v_template_login', $data);
    }

    public function LogOut()
    {
        session()->remove('id_user');
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Logout Sukses');
        return redirect()->to(base_url('Auth/LoginUser'));
    }

    public function LogOutMember()
    {
        session()->remove('id_member');
        session()->remove('nama_siswa');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Logout Sukses');
        return redirect()->to(base_url('Auth/LoginMember'));
    }

    public function Register()
    {
        $data = [
            'title' => 'Esemka Library | Daftar Member',
            'page' => 'v_daftar_member',
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_login', $data);
    }

    public function Daftar()
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
                'nis' => 'NIS',
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
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
            'ulangi_password' => [
                'label' => 'Ulangi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Masing Kosong!',
                    'matches' => '{field} Tidak sama dengan password sebelumnya! ',
                ]
            ],
        ])) {
            $data = [
                'id_kelas' => $this->request->getPost('id_kelas'),
                'nis' => $this->request->getPost('nis'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'no_hp' => $this->request->getPost('no_hp'),
                'password' => $this->request->getPost('password'),
                'verifikasi' => '0',
            ];
            $this->ModelAuth->Daftar($data);
            session()->setFlashdata('pesan', 'Berhasil daftar! Silahkan Login');
            return redirect()->to(base_url('Auth/Register'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/Register'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function CekLoginMember()
    {
        if ($this->validate([
            'nis' => [
                'label' => 'NIS',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi! ',
                ]
            ]
        ])) {
            $nis = $this->request->getPost('nis');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->LoginMember($nis, $password);
            if ($cek_login) {
                session()->set('id_member', $cek_login['id_member']);
                session()->set('nama_siswa', $cek_login['nama_siswa']);
                session()->set('level', 'Member');
                return redirect()->to(base_url('DashboardMember'));
            } else {
                session()->setFlashdata('pesan', 'NIS atau Password Salah!');
                return redirect()->to(base_url('Auth/LoginMember'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/LoginMember'));
        }
    }
}
