<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php session()->set('hal', 'tambah_user') ?>

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
                        <form action="/User/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control <?= ($validation)->hasError('nama') ? 'is-invalid' : '' ?>" placeholder="Masukkan Nama Lengkap" name="nama" value="<?= old('nama') ?>" autocomplete="off">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control <?= ($validation)->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Masukkan Username" name="username" value="<?= old('username') ?>" autocomplete="off">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control <?= ($validation)->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Masukkan Password" name="password" value="<?= old('password') ?>" autocomplete="off">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <select class="form-control custom-select <?= ($validation)->hasError('level') ? 'is-invalid' : '' ?>" name="level">
                                        <option selected disabled value="kosong">Level</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Petugas">Petugas</option>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('level'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon <span style="font-weight: normal;">(opsional)</span></label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nomor Telepon" name="no_telp" value="<?= old('no_telp') ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="profil" class="form-label">Foto Profil <span style="font-weight: normal;">(opsional)</span></label>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img src="/img/profil/default.jpg" class="img-thumbnail img-preview">
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input <?= ($validation->hasError('profil')) ? 'is-invalid' : '' ?>" id="profil" name="profil" onchange="previewImg()">
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= $validation->getError('profil') ?>
                                                </div>
                                                <label for="profil" class="custom-file-label text-secondary">Pilih Gambar</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success float-right">Tambah Pengguna</button>
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