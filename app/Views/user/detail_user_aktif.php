<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php
if ($user['no_telp'] == '') {
    $notelp = 'Nomor telepon tidak tersedia';
} else {
    $notelp = $user['no_telp'];
}
?>

<style>
    .img-fluid {
        width: 150px;
        height: 150px;
        background-size: cover;
        object-fit: cover;
        object-position: center;
    }
</style>

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
                <div class="col-lg-5 m-auto">
                    <div class="text-center">
                    </div>
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" style="" src="/img/profil/<?= $user['profil'] ?>">
                            </div>
                            <h3 class="profile-username text-center"><?= $user['nama'] ?></h3>

                            <p class="text-muted text-center"><?= $user['level'] ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Username</b> <a class="float-right"><?= $user['username'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Nomor Telepon</b> <a class="float-right"><?= $notelp ?></a>
                                </li>
                                <li class="list-group-item text-center">
                                    Ditambahkan pada <?= $user['created_at'] ?>
                                </li>
                            </ul>
                            <a href="/user/edit/<?= session()->get('id') ?>" class="btn btn-success btn-block"><b>Ubah Profil</b></a>
                            <a href="/user/password/<?= session()->get('id') ?>" class="btn btn-danger btn-block"><b>Ubah Password</b></a>
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