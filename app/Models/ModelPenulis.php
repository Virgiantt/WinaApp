<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenulis extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_Penulis')
            ->orderBy('id_Penulis', 'DESC')
            ->get()->getResultArray();
    }

    public function AddData($data)
    {
        $this->db->table('tbl_Penulis')->insert($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_Penulis')
            ->where('id_Penulis', $data['id_Penulis'])
            ->delete($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_Penulis')
            ->where('id_Penulis', $data['id_Penulis'])
            ->update($data);
    }
}
