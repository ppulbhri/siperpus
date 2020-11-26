<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php session()->set('hal', 'data_pinjam') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h5 class="text-secondary"><?= $title ?></h5>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <form action="" method="post">
                        <div class="input-group mb-3 col-4">
                            <input type="text" class="form-control" placeholder="Masukkan Keyword Pencarian" name="search" autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit" name="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-warning" role="alert">
                            <?= session()->getFlashdata('pesan') ?>
                        </div>
                    <?php endif ?>
                    <a href="/Pinjam/data"><button class="btn btn-outline-secondary text-bold w-25">Kembali</button></a>
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead class="bg-success">
                                    <tr>
                                        <th style="width:5%">No</th>
                                        <th style="width:24%">Nama Siswa</th>
                                        <th style="width:26%">Nama Buku</th>
                                        <th style="width:22%">Status</th>
                                        <th style="width:23%">Waktu dan Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + (5 * ($currentPage - 1)) ?>
                                    <?php foreach ($pinjam as $p) : ?>
                                        <?php
                                        if ($p['status'] == 1) {
                                            $status = 'Dipinjam';
                                            $textColor = 'text-warning';
                                            $tanggal = $p['created_at'];
                                        } else {
                                            $status = 'Dikembalikan';
                                            $textColor = 'text-dark';
                                            $tanggal = $p['updated_at'];
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $p['siswa'] ?></td>
                                            <td><?= $p['buku'] ?></td>
                                            <td class="<?= $textColor ?>"><?= $status ?></td>
                                            <td><?= $tanggal ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="row">
                <div style="margin: auto;">
                    <?= $pager->links('tbl_pinjam', 'allPage') ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<?= $this->endsection() ?>