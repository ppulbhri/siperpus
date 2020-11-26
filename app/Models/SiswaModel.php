<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'tbl_siswa';
    protected $allowedFields = ['nama', 'kelas', 'jurusan'];

    public function getSiswa($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function hitungData()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_siswa');
        return $builder->countAllResults();
    }

    public function search($search)
    {
        // $builder = $this->table('tbl_siswa');
        // $builder->like('nama', $search);
        // return $builder;

        return $this->table('tbl_siswa')->like('nama', $search)->orLike('kelas', $search)->orLike('jurusan', $search);
    }
}
