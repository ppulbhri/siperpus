<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\CodeIgniter;

class Buku extends BaseController
{

    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function data()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $this->bukuModel->orderBy('nama', 'ASC');
        $currentPage = $this->request->getVar('page_tbl_buku') ? $this->request->getVar() : 1;
        $search = $this->request->getPost('search');
        if ($search) {
            $buku = $this->bukuModel->search($search);
        } else {
            $buku = $this->bukuModel;
        }
        $data = [
            'title' => 'Data Buku',
            'header' => 'Perbukuan',
            'buku' => $buku->paginate(5, 'tbl_buku'),
            'pager' => $this->bukuModel->pager,
            'currentPage' => $currentPage
        ];
        return view('Buku/data_buku', $data);
    }

    public function tambah()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Tambah Buku',
            'header' => 'Perbukuan',
            'validation' => \Config\Services::validation()
        ];
        return view('Buku/tambah_buku', $data);
    }

    public function save()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[tbl_buku.nama]',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    'is_unique' => '{field} buku sudah tersedia'
                ]
            ],
            'jenis' => [
                'rules' => 'in_list[Komik,Novel,Pengetahuan,Lain-lain]',
                'errors' => [
                    'in_list' => '{field} buku harus diisi'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama {field} harus diisi'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama {field} buku harus diisi'
                ]
            ],
            'thn_terbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tahun terbit buku harus diisi'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Buku/tambah')->withInput()->with('validation', $validation);
        }

        $this->bukuModel->save([
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'thn_terbit' => $this->request->getPost('thn_terbit'),
            'jumlah' => $this->request->getPost('jumlah')
        ]);

        session()->setFlashdata('pesan', 'Data Buku Berhasil Ditambahkan');

        return redirect()->to('/Buku/data/');
    }

    public function delete($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $this->bukuModel->delete($id);

        session()->setFlashdata('pesan', 'Data Buku Berhasil Dihapus');

        return redirect()->to('/Buku/data');
    }

    public function detail($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Detail Buku',
            'header' => 'Perbukuan',
            'buku' => $this->bukuModel->getBuku($id)
        ];

        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku ' . $id . ' tidak dapat ditemukan');
        }

        return view('Buku/detail_buku', $data);
    }

    public function edit($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Ubah Buku',
            'header' => 'Perbukuan',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->getBuku($id)
        ];
        return view('Buku/edit_buku', $data);
    }

    public function update($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $bukuLama = $this->bukuModel->getBuku($id);
        if ($bukuLama['nama'] == $this->request->getVar('nama')) {
            $ruleNama = 'required';
        } else {
            $ruleNama = 'required|is_unique[tbl_buku.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $ruleNama,
                'errors' => [
                    'required' => '{field} buku harus diisi <br>*note : inputan telah dikembalikan keawal secara otomatis',
                    'is_unique' => '{field} buku sudah tersedia'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama {field} harus diisi <br>*note : inputan telah dikembalikan keawal secara otomatis'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama {field} buku harus diisi <br>*note : inputan telah dikembalikan keawal secara otomatis'
                ]
            ],
            'thn_terbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tahun terbit buku harus diisi <br>*note : inputan telah dikembalikan keawal secara otomatis'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi <br>*note : inputan telah dikembalikan keawal secara otomatis'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Buku/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $this->bukuModel->save([
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'thn_terbit' => $this->request->getPost('thn_terbit'),
            'jumlah' => $this->request->getPost('jumlah')
        ]);

        session()->setFlashdata('pesan', 'Data Buku Berhasil Diubah');

        return redirect()->to('/Buku/data/');
    }
}
