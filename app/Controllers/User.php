<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SiswaModel;
use App\Models\BukuModel;
use App\Models\PinjamModel;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->siswaModel = new SiswaModel();
        $this->bukuModel = new BukuModel();
        $this->pinjamModel = new PinjamModel();
    }

    public function index()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Beranda',
            'header' => 'Beranda',
            'jumlahSiswa' => $this->siswaModel->hitungData(),
            'jumlahBuku' => $this->bukuModel->hitungData(),
            'jumlahPinjam' => $this->pinjamModel->hitungData()
        ];
        return view('user/index', $data);
    }

    public function data()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (session()->get('level') != 'Admin') {
            session()->setFlashdata('alert', 'Akses Ditolak');
            return redirect()->to('/');
        }
        $currentPage = $this->request->getVar('page_tbl_user') ? $this->request->getVar('page_tbl_user') : 1;
        $search = $this->request->getPost('search');
        if ($search) {
            $user = $this->userModel->search($search);
        } else {
            $user = $this->userModel;
        }
        $this->userModel->orderBy('username', 'asc');
        $this->userModel->where('status', 1);
        $data = [
            'title' => 'Data Pengguna',
            'header' => 'Pengguna',
            'users' => $user->paginate(5, 'tbl_user'),
            'pager' => $this->userModel->pager,
            'currentPage' => $currentPage
        ];
        return view('user/data_user', $data);
    }

    public function tambah()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (session()->get('level') != 'Admin') {
            session()->setFlashdata('alert', 'Akses Ditolak');
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Tambah Pengguna',
            'header' => 'Pengguna',
            'validation' => \Config\Services::validation()
        ];
        return view('user/tambah_user', $data);
    }

    public function save()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (session()->get('level') != 'Admin') {
            session()->setFlashdata('alert', 'Akses Ditolak');
            return redirect()->to('/');
        }
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} pengguna harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[tbl_user.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah tersedia'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} harus atau lebih dari 6 digit'
                ]
            ],
            'level' => [
                'rules' => 'in_list[Admin,Petugas]',
                'errors' => [
                    'in_list' => '{field} harus diisi'
                ]
            ],
            'profil' => [
                'rules' => 'max_size[profil,2048]|is_image[profil]|mime_in[profil,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/tambah')->withInput()->with('validation', $validation);
        }

        // ambil gambar
        $fileProfil = $this->request->getFile('profil');
        // apakah tidak ada gambar yang diupload
        if ($fileProfil->getError() == 4) {
            $namaProfil = 'default.jpg';
        } else {
            // generate nama Profil random
            $namaProfil = $fileProfil->getRandomName();
            // pindahkan file ke folder img
            $fileProfil->move('img/profil/', $namaProfil);
        }
        $this->userModel->save([
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
            'no_telp' => $this->request->getPost('no_telp'),
            'level' => $this->request->getPost('level'),
            'status' => 1,
            'profil' => $namaProfil
        ]);

        session()->setFlashdata('pesan', 'Data Pengguna Berhasil Ditambahkan');

        return redirect()->to('/User/data');
    }

    public function nonactive($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (session()->get('level') != 'Admin') {
            session()->setFlashdata('alert', 'Akses Ditolak');
            return redirect()->to('/');
        }
        $this->userModel->set('status', 0);
        $this->userModel->where('id', $id);
        $this->userModel->update();

        session()->setFlashdata('pesan', 'Data Pengguna Berhasil Dinonaktifkan');

        return redirect()->to('/User/data');
    }

    public function detail($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (session()->get('level') != 'Admin') {
            session()->setFlashdata('alert', 'Akses Ditolak');
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Detail Pengguna',
            'header' => 'Pengguna',
            'user' => $this->userModel->getUser($id)
        ];

        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengguna ' . $id . ' tidak dapat ditemukan');
        }

        return view('User/detail_user', $data);
    }

    public function edit($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (session()->get('id') != $id) {
            session()->setFlashdata('alert', 'Akses Ditolak');
            return redirect()->to('/');
        }

        // dd($this->userModel->where('username', $username)->findAll());

        $data = [
            'title' => 'Ubah Profil',
            'header' => 'Profil',
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->where('id', $id)->findAll()
        ];
        return view('user/edit_user', $data);
    }

    public function update($id)
    {
        if ($this->request->getPost('username') == session()->get('username')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[tbl_user.username]';
        }
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} pengguna harus diisi'
                ]
            ],
            'username' => [
                'rules' => $rule,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah tersedia'
                ]
            ],
            'profil' => [
                'rules' => 'max_size[profil,2048]|is_image[profil]|mime_in[profil,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/edit/' . $id)->withInput()->with('validation', $validation);
        }

        // ambil gambar
        $fileProfil = $this->request->getFile('profil');
        // apakah tidak ada gambar yang diupload
        if ($fileProfil->getError() == 4) {
            $namaProfil = $this->request->getVar('oldProfil');
        } else {
            // generate nama Profil random
            $namaProfil = $fileProfil->getRandomName();
            // pindahkan file ke folder img
            $fileProfil->move('img/profil/', $namaProfil);
            if ($this->request->getVar('oldProfil') != 'default.jpg') {
                // hapus file lama
                unlink('img/profil/' . $this->request->getVar('oldProfil'));
            }
        }
        $this->userModel->save([
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'no_telp' => $this->request->getPost('no_telp'),
            'profil' => $namaProfil
        ]);
        session()->setFlashdata('relogin', 'Profil berhasil diubah\nSilahkan login ulang');
        return redirect()->to('/login');
    }

    public function rincian($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (session()->get('id') != $id) {
            session()->setFlashdata('alert', 'Akses Ditolak');
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Detail Profil',
            'header' => 'Profil',
            'user' => $this->userModel->getUser($id)
        ];

        return view('User/detail_user_aktif', $data);
    }

    public function password($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (session()->get('id') != $id) {
            session()->setFlashdata('alert', 'Akses Ditolak');
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Ubah Password',
            'header' => 'Profil',
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->where('id', $id)->findAll()
        ];
        return view('user/edit_password', $data);
    }

    public function update_password($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (session()->get('id') != $id) {
            session()->setFlashdata('alert', 'Akses Ditolak');
            return redirect()->to('/');
        }
        $pb = $this->request->getPost('passwordb');
        $pu = $this->request->getPost('passwordu');
        $pk = $this->request->getPost('passwordk');
        $old = $this->request->getPost('oldPassword');
        if (!$this->validate([
            'passwordb' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'password harus diisi',
                    'min_length' => 'password harus atau lebih dari 6 digit'
                ]
            ],
            'passwordu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ketik ulang password',
                ]
            ],
            'passwordk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'konfirmasi password sebelumnya',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/password/' . $id)->withInput()->with('validation', $validation);
        }
        if ($pb == $pu) {
            if (md5($pk) == $old) {
                $this->userModel->save([
                    'id' => $id,
                    'password' => md5($pb)
                ]);
                session()->setFlashdata('relogin', 'Password berhasil diubah\nSilahkan login ulang');
                return redirect()->to('/login');
            } else {
                session()->setFlashdata('wrong', 'password yang anda masukkan salah');
                return redirect()->to('/user/password/' . $id)->withInput();
            }
        } else {
            session()->setFlashdata('same', 'password yang anda masukkan tidak sesuai');
            return redirect()->to('/user/password/' . $id)->withInput();
        }
    }
}
