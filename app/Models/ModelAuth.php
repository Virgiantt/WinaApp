<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function LoginUser($email, $password)
    {
        return $this->db->table('tbl_user')
            ->where([
                'email' => $email,
                'password' => $password,
            ])->get()->getRowArray();
    }

    public function Daftar($data)
    {
        $this->db->table('tbl_member')->insert($data);
    }

    public function LoginMember($nis, $password)
    {
        return $this->db->table('tbl_member')
            ->where([
                'nis' => $nis,
                'password' => $password,
            ])->get()->getRowArray();
    }
}
