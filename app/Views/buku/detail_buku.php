<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php session()->set('hal', 'data_book') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-3"></i>Nama : <?= $buku['nama'] ?></strong>
                            <hr>
                            <strong><i class="fas fa-book mr-3"></i>Jenis : <?= $buku['jenis'] ?></strong>
                            <hr>
                            <strong><i class="fas fa-user-edit mr-2"></i> Penulis : <?= $buku['penulis'] ?></strong>
                            <hr>

                            <strong><i class="fas fa-book-open mr-2"></i> Penerbit : <?= $buku['penerbit'] ?></strong>

                            <p class="text-muted">Diterbitkan pada tahun <?= $buku['thn_terbit'] ?></p>

                            <hr>
                            <hr>

                            <center><strong>Total <?= $buku['jumlah'] ?> buah buku</strong></center>
                        </div>
                        <div class="card-footer">
                            <a href="/Buku/data"><button class="btn btn-success float-right">Kembali</button></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<?= $this->endsection() ?>