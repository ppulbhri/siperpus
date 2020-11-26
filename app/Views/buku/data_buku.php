<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php session()->set('hal', 'data_book') ?>

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
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead class="bg-success">
                                    <tr>
                                        <th style="width:5%">No</th>
                                        <th style="width:40%">Nama Buku</th>
                                        <th style="width:25%">Jenis Buku</th>
                                        <th style="width:30%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1 + (5 * ($currentPage - 1)) ?>
                                    <?php foreach ($buku as $b) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $b['nama'] ?></td>
                                            <td><?= $b['jenis'] ?></td>
                                            <td>
                                                <a href="/Buku/detail/<?= $b['id'] ?>"><button class="btn btn-success mr-2">Detail</button></a>
                                                <a href="/Buku/edit/<?= $b['id'] ?>"><button class="btn btn-warning mr-2">Edit</button></a>
                                                <form action="/Buku/delete/<?= $b['id'] ?>" method="post" class="d-inline">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah ada yakin?')">Hapus</button>
                                                </form>
                                            </td>
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
                    <?= $pager->links('tbl_buku', 'allPage') ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<?= $this->endsection() ?>