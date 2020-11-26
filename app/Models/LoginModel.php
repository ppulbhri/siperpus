<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    public function check($username, $password)
    {
        // $enkripsi = \Config\Services::encrypter();
        // $password = $enkripsi->encrypt($password);

        return $this->db->table('tbl_user')
            ->where(array('username' => $username, 'password' => $password))
            ->get()->getRowArray();
    }
}
