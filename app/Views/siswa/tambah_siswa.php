<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php session()->set('hal', 'tambah_siswa') ?>

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
                        <form action="/Siswa/save" method="post">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <input type="text" class="form-control <?= ($validation)->hasError('nama') ? 'is-invalid' : '' ?>" placeholder="Masukkan Nama Siswa" name="nama" value="<?= old('nama') ?>" autocomplete="off">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select class="form-control custom-select <?= ($validation)->hasError('kelas') ? 'is-invalid' : '' ?>" name="kelas">
                                        <option selected disabled value="0">Pilih Kelas</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('kelas'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <select class="form-control custom-select <?= ($validation)->hasError('jurusan') ? 'is-invalid' : '' ?>" name="jurusan">
                                        <option selected disabled value="kosong">Pilih Jurusan</option>
                                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                        <option value="Multimedia">Multimedia</option>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('jurusan'); ?>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success float-right">Tambah Siswa</button>
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