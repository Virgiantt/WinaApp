<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMember extends Model
{
    public function ProfileMember($id_member)
    {
        return $this->db->table('tbl_member')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_member.id_kelas', 'left')
            ->where('id_member', $id_member)
            ->get()->getRowArray();
    }

    public function AllData()
    {
        return $this->db->table('tbl_member')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_member.id_kelas', 'left')
            ->orderBy('id_member', 'DESC')
            ->get()->getResultArray();
    }

    public function EditData($data)
    {
        $this->db->table('tbl_member')
            ->where('id_member', $data['id_member'])
            ->update($data);
    }

    public function AddData($data)
    {
        $this->db->table('tbl_member')->insert($data);
    }

    public function DetailData($id_member)
    {
        return $this->db->table('tbl_member')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_member.id_kelas', 'left')
            ->where('id_member', $id_member)
            ->get()->getRowArray();
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_member')
            ->where('id_member', $data['id_member'])
            ->delete($data);
    }
}
