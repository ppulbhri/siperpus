<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends Model
{
    protected $table = 'tbl_pinjam';
    protected $allowedFields = ['siswa', 'buku', 'tanggal', 'status'];
    protected $useTimestamps = true;

    public function hitungData()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_pinjam');
        $builder->where('status', 1);
        return $builder->countAllResults();
    }

    public function search($search)
    {
        return $this->table('tbl_pinjam')->where('status', 1)->like('siswa', $search)->orLike('buku', $search)->orLike('tanggal', $search);
    }
}
