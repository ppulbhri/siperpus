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
                        <form action="/Buku/update/<?= $buku['id'] ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Buku</label>
                                    <input type="text" class="form-control <?= ($validation)->hasError('nama') ? 'is-invalid' : '' ?>" placeholder="Masukkan Nama Buku" name="nama" value="<?= (old('nama')) ? old('nama') : $buku['nama'] ?>" autocomplete="off">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Buku</label>
                                    <select class="form-control custom-select <?= ($validation)->hasError('jenis') ? 'is-invalid' : '' ?>" name="jenis">
                                        <option selected value="<?= (old('jenis')) ? old('jenis') : $buku['jenis'] ?>"><?= (old('jenis')) ? old('jenis') : $buku['jenis'] ?></option>
                                        <option value="Komik">Komik</option>
                                        <option value="Novel">Novel</option>
                                        <option value="Pengetahuan">Pengetahuan</option>
                                        <option value="Lain-lain">Lain-lain</option>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('jenis'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Penulis</label>
                                    <input type="text" class="form-control <?= ($validation)->hasError('penulis') ? 'is-invalid' : '' ?>" placeholder="Masukkan Nama Penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $buku['penulis'] ?>" autocomplete="off">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('penulis'); ?>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label>Penerbit dan Tahun Terbit</label>
                                    <div>
                                        <div class="float-left" style="width: 68%">
                                            <input type="text" class="form-control <?= ($validation)->hasError('penerbit') ? 'is-invalid' : '' ?>" placeholder="Nama Penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $buku['penerbit'] ?>" autocomplete="off">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('penerbit'); ?>
                                            </div>
                                        </div>
                                        <div class="float-right" style="width: 30%">
                                            <input type="number" id="inputEstimatedDuration" class="form-control <?= ($validation)->hasError('thn_terbit') ? 'is-invalid' : '' ?>" step="1" name="thn_terbit" value="<?= (old('thn_terbit')) ? old('thn_terbit') : $buku['thn_terbit'] ?>" placeholder="Tahun Terbit">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('thn_terbit'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Buku</label>
                                    <input type="number" id="inputEstimatedDuration" class="form-control <?= ($validation)->hasError('jumlah') ? 'is-invalid' : '' ?>" value="<?= (old('jumlah')) ? old('jumlah') : $buku['jumlah'] ?>" step="1" name="jumlah" min="1" placeholder="Masukkan Jumlah Buku">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('jumlah'); ?>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-success float-right">Simpan</button>
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