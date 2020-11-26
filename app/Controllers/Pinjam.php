<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\SiswaModel;
use App\Models\PinjamModel;
use App\Models\RiwayatModel;
use CodeIgniter\I18n\Time;

class Pinjam extends BaseController
{
    protected $bukuModel;
    protected $siswaModel;
    protected $pinjamModel;
    protected $riwayatModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->siswaModel = new SiswaModel();
        $this->pinjamModel = new PinjamModel();
        $this->riwayatModel = new RiwayatModel();
    }

    public function pinjam()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $waktu = new Time('now', 'Asia/Jakarta', 'id_ID');
        $this->siswaModel->orderBy('nama', 'ASC');
        $this->bukuModel->orderBy('nama', 'ASC');
        $data = [
            'title' => 'Pinjam Buku',
            'buku' => $this->bukuModel->findAll(),
            'header' => 'Peminjaman',
            'siswa' => $this->siswaModel->findAll(),
            'waktu' => $waktu,
            'validation' => \Config\Services::validation()
        ];
        return view('pinjam/pinjam', $data);
    }

    public function data()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $this->pinjamModel->orderBy('siswa', 'ASC');
        $this->pinjamModel->where('status', '1');
        $currentPage = $this->request->getVar('page_tbl_pinjam') ? $this->request->getVar('page_tbl_pinjam') : 1;
        $search = $this->request->getPost('search');
        if ($search) {
            $pinjam = $this->pinjamModel->search($search);
        } else {
            $pinjam = $this->pinjamModel;
        }
        $data = [
            'title' => 'Data Pinjam',
            'header' => 'Peminjaman',
            'pinjam' => $pinjam->paginate(5, 'tbl_pinjam'),
            'pager' => $this->pinjamModel->pager,
            'currentPage' => $currentPage
        ];
        return view('pinjam/data_pinjam', $data);
    }

    public function save()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        if (!$this->validate([
            'siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '*nama {field} harus diisi'
                ]
            ],
            'buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '*nama {field} diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '*{field} harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Pinjam/pinjam')->withInput()->with('validation', $validation);
        }

        $this->pinjamModel->save([
            'siswa' => $this->request->getPost('siswa'),
            'buku' => $this->request->getPost('buku'),
            'tanggal' => $this->request->getPost('tanggal'),
            'status' => 1
        ]);
        $this->riwayatModel->save([
            'siswa' => $this->request->getPost('siswa'),
            'buku' => $this->request->getPost('buku'),
            'status' => 1
        ]);

        session()->setFlashdata('pesan', 'Data Pinjam Berhasil Ditambahkan');

        return redirect()->to('/Pinjam/data/');
    }

    public function kembalikan($id)
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        // $tgl = $this->pinjamModel->where('id', $id)->findColumn('created_at');
        // d($tgl);
        // $now = Time::now('Asia/Jakarta', 'id_ID')->toLocalizedString();
        // dd($now);
        // $selisih = $now - $tgl;
        // dd($selisih);
        $this->pinjamModel->set('status', 0);
        $this->pinjamModel->where('id', $id);
        $this->pinjamModel->update();

        $this->riwayatModel->save([
            'siswa' => $this->pinjamModel->where('id', $id)->findColumn('siswa'),
            'buku' => $this->pinjamModel->where('id', $id)->findColumn('buku'),
            'status' => 0
        ]);

        session()->setFlashdata('pesan', 'Peminjaman Berhasil Dikembalikan');

        return redirect()->to('/Pinjam/data');
    }

    public function riwayat()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $this->riwayatModel->orderBy('id', 'DESC');
        $data = [
            'title' => 'Riwayat Peminjaman',
            'header' => 'Peminjaman',
            'jumlahRiwayat' => $this->riwayatModel->hitungData(),
            'riwayat' => $this->riwayatModel->findAll()
        ];
        return view('pinjam/riwayat', $data);
    }

    public function alldata()
    {
        if (session()->get('nama') == '') {
            // session()->setFlashdata('pesan', 'Anda Belum Login');
            return redirect()->to('/login');
        }
        $this->pinjamModel->orderBy('siswa', 'ASC');
        $currentPage = $this->request->getVar('page_tbl_pinjam') ? $this->request->getVar('page_tbl_pinjam') : 1;
        $search = $this->request->getPost('search');
        if ($search) {
            $pinjam = $this->pinjamModel->search($search);
        } else {
            $pinjam = $this->pinjamModel;
        }
        $data = [
            'title' => 'Semua Data Pinjam',
            'header' => 'Peminjaman',
            'pinjam' => $pinjam->paginate(5, 'tbl_pinjam'),
            'pager' => $this->pinjamModel->pager,
            'currentPage' => $currentPage
        ];
        return view('pinjam/semua_data', $data);
    }

    public function reset()
    {
        $this->riwayatModel->truncate();
        return redirect()->to('/Pinjam/riwayat');
    }
}
