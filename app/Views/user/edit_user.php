<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

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
                        <form action="/User/update/<?= session()->get('id') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="oldProfil" value="<?= $user[0]['profil'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control <?= ($validation)->hasError('nama') ? 'is-invalid' : '' ?>" placeholder="Masukkan Nama Lengkap" name="nama" value="<?= (old('nama')) ? old('nama') : $user[0]['nama'] ?>" autocomplete="off">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control <?= ($validation)->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Masukkan Username" name="username" value="<?= (old('username')) ? old('username') : $user[0]['username'] ?>" autocomplete="off">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon <span style="font-weight: normal;">(opsional)</span></label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nomor Telepon" name="no_telp" value="<?= (old('no_telp')) ? old('no_telp') : $user[0]['no_telp'] ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="profil" class="form-label">Foto Profil <span style="font-weight: normal;">(opsional)</span></label>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img src="/img/profil/<?= (old('profil')) ? old('profil') : $user[0]['profil'] ?>" class="img-thumbnail img-preview">
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input <?= ($validation->hasError('profil')) ? 'is-invalid' : '' ?>" id="profil" name="profil" onchange="previewImg()">
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= $validation->getError('profil') ?>
                                                </div>
                                                <label for="profil" class="custom-file-label text-secondary"><?= (old('profil')) ? old('profil') : $user[0]['profil'] ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <a href="/user/rincian/<?= session()->get('id') ?>"><button type="button" class="btn btn-secondary mr-2">Batal</button></a>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
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