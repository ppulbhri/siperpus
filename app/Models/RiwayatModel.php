<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model
{
    protected $table = 'tbl_riwayat';
    protected $useTimestamps = true;
    protected $allowedFields = ['siswa', 'buku', 'status'];

    public function hitungData()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_riwayat');
        return $builder->countAllResults();
    }
}
