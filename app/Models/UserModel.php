<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    protected $allowedFields = ['nama', 'username', 'password', 'level', 'no_telp', 'status', 'profil'];
    protected $useTimestamps = true;

    // public function hitungJumlahAsset()
    // {
    //     $query = $this->db->get('tbl_user');
    //     if ($query->num_rows() > 0) {
    //         return $query->num_rows();
    //     } else {
    //         return 0;
    //     }
    // }
    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function search($search)
    {
        return $this->table('tbl_pinjam')->where('status', 1)->like('nama', $search)->orLike('level', $search);
    }
}
