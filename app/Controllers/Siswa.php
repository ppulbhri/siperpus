<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function tambah()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Tambah Siswa',
            'header' => 'Siswa',
            'validation' => \Config\Services::validation()
        ];
        return view('siswa/tambah_siswa', $data);
    }

    public function data()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $currentPage = $this->request->getVar('page_tbl_siswa') ? $this->request->getVar('page_tbl_siswa') : 1;
        $this->siswaModel->orderBy('kelas', 'ASC');
        $this->siswaModel->orderBy('nama', 'ASC');
        $search = $this->request->getPost('search');
        if ($search) {
            $siswa = $this->siswaModel->search($search);
        } else {
            $siswa = $this->siswaModel;
        }
        $data = [
            'title' => 'Data Siswa',
            'header' => 'Siswa',
            'siswa' => $siswa->paginate(5, 'tbl_siswa'),
            'pager' => $this->siswaModel->pager,
            'currentPage' => $currentPage
        ];
        return view('siswa/data_siswa', $data);
    }

    public function save()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} siswa harus diisi'
                ]
            ],
            'kelas' => [
                'rules' => 'in_list[10,11,12]',
                'errors' => [
                    'in_list' => '{field} harus diisi'
                ]
            ],
            'jurusan' => [
                'rules' => 'in_list[Rekayasa Perangkat Lunak, Multimedia]',
                'errors' => [
                    'in_list' => '{field} harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Siswa/tambah')->withInput()->with('validation', $validation);
        }

        $this->siswaModel->save([
            'nama' => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan')
        ]);

        session()->setFlashdata('pesan', 'Data Siswa Berhasil Ditambahkan');

        return redirect()->to('/Siswa/data');
    }

    public function delete($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $this->siswaModel->delete($id);

        session()->setFlashdata('pesan', 'Data Siswa Berhasil Dihapus');

        return redirect()->to('/Siswa/data');
    }

    public function edit($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Ubah Siswa',
            'header' => 'Siswa',
            'validation' => \Config\Services::validation(),
            'siswa' => $this->siswaModel->getSiswa($id)
        ];
        return view('siswa/edit_siswa', $data);
    }

    public function update($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} siswa harus diisi <br>*note : inputan telah dikembalikan keawal secara otomatis'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Siswa/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $this->siswaModel->save([
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan')
        ]);

        session()->setFlashdata('pesan', 'Data Siswa Berhasil Diubah');

        return redirect()->to('/Siswa/data/');
    }
}
