<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php session()->set('hal', 'pinjam') ?>

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
                            <h3 class="card-title">Pinjam Buku</h3>
                        </div>
                        <form action="/Pinjam/save" method="post">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="siswa">
                                        <option selected disabled>Pilih Nama Siswa</option>
                                        <?php foreach ($siswa as $s) : ?>
                                            <option value="<?= $s['nama'] ?>"><?= $s['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <p class="text-danger text-sm"><?= $validation->getError('siswa'); ?></p>
                                </div>
                                <div class="form-group">
                                    <label>Nama Buku</label>
                                    <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="buku">
                                        <option selected disabled>Pilih Nama Buku</option>
                                        <?php foreach ($buku as $b) : ?>
                                            <option value="<?= $b['nama'] ?>"><?= $b['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <p class="text-danger text-sm"><?= $validation->getError('buku'); ?></p>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pinjam</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="datetime-local" class="form-control" name="tanggal">
                                    </div>
                                    <p class="text-danger text-sm"><?= $validation->getError('tanggal'); ?></p>
                                </div>
                                <button type="submit" class="btn btn-success float-right">Pinjam Sekarang</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<?= $this->endsection() ?>