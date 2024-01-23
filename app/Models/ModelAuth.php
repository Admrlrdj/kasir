<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function Save_Register($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }
}
