<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'tbl_buku';
    protected $allowedFields = ['nama', 'jenis', 'penulis', 'penerbit', 'thn_terbit', 'jumlah'];
    public function getBuku($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function hitungData()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_buku');
        return $builder->countAllResults();
    }

    public function search($search)
    {
        return $this->table('tbl_buku')->like('nama', $search);
    }
}
