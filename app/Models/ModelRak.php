<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRak extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_rak')
            ->orderBy('id_rak_buku', 'DESC')
            ->get()->getResultArray();
    }

    public function AddData($data)
    {
        $this->db->table('tbl_rak')->insert($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_rak')
            ->where('id_rak_buku', $data['id_rak_buku'])
            ->delete($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_rak')
            ->where('id_rak_buku', $data['id_rak_buku'])
            ->update($data);
    }
}
