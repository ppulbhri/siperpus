<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php session()->set('hal', 'riwayat') ?>

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
                    <?php if ($jumlahRiwayat >= 1) : ?>
                        <a href="/Pinjam/reset"><button class="btn btn-outline-danger w-25 mb-2">Reset Riwayat Peminjaman</button></a>
                    <?php endif ?>
                    <?php foreach ($riwayat as $r) : ?>
                        <!-- <?php
                                if ($r['status'] == 1) {
                                    $perihal = 'Peminjaman';
                                    $hal = 'meminjam';
                                    $bg = 'bg-success';
                                    $quote = 'quote-secondary';
                                } else {
                                    $perihal = 'Pengembalian';
                                    $hal = 'mengembalikan';
                                    $bg = 'bg-secondary';
                                    $quote = 'quote-dark';
                                }
                                ?> -->
                        <div class="card w-100">
                            <div class="card-header <?= $bg ?>">
                                <?= $perihal ?>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote <?= $quote ?> mb-0">
                                    <p><?= $r['siswa'] ?> telah <?= $hal ?> buku "<?= $r['buku'] ?>"</p>
                                    <footer class="blockquote-footer">Pada <?= $r['created_at'] ?></footer>
                                </blockquote>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- /.card -->
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<?= $this->endsection() ?>