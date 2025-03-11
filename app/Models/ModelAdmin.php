<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function TotalBuku()
    {
    }

    public function TotalMember()
    {
        return $this->db->table('tbl_member')->countAll();
    }
}
