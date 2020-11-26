<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php session()->set('hal', 'index') ?>

<style>
    @keyframes powered {
        to {
            transform: scale(1);
        }

        from {
            transform: scale(1.1);
        }
    }

    .crsl {
        height: 300px;
        object-fit: cover;
        object-position: center;
        filter: saturate(70%);
    }

    .carousel-inner {
        border-top: 8px solid green;
        border-bottom: 3px solid green;
        margin-bottom: 20px;
        width: 100% !important;
    }

    h2 {
        display: block;
        width: 100%;
        padding: 10px;
        text-align: center;
        margin: 0;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        text-transform: uppercase;
        font-family: 'Rubik', sans-serif;
    }

    .img-powered {
        animation: powered .5s infinite alternate;
    }

    .marbot {
        height: 20px;
    }

    .btn-block {
        font-family: 'Comfortaa', cursive;
        letter-spacing: 3px;
    }
</style>

<div class="content-wrapper">
    <div class="marbot">
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="bg-success">Selamat Datang <?= session()->get('nama') ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/img/perpus.jpg" class="d-block w-100 crsl" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/perpus2.jpg" class="d-block w-100 crsl" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row mb-3">
                <div class="col-12">
                    <button class="btn btn-success bg-gradient-success btn-block text-uppercase">pinjam sekarang</button>
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jumlahBuku ?></h3>

                            <p>Total Buku</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <a href="/Buku/data" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $jumlahSiswa ?></h3>

                            <p>Siswa Terdaftar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="/Siswa/data" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlahPinjam ?></h3>

                            <p>Buku Sedang Dipinjam</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <a href="/Pinjam/data" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <hr width="80%">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-success">Powered by</h2>
                </div>
                <div class="col-3 m-auto text-center">
                    <img class="img-powered" src="/img/bukopin.png" width="200px">
                </div>
                <div class="col-3 m-auto text-center">
                    <img class="img-powered" src="/img/smk.png" width="200px">
                </div>
                <div class="col-3 m-auto text-center">
                    <img class="img-powered" src="/img/pondok.png" width="200px">
                </div>
                <div class="col-3 m-auto text-center">
                    <img class="img-powered" src="/img/kb.png" width="200px">
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>