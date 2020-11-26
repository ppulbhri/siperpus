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
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <form action="/User/update_password/<?= session()->get('id') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="oldPassword" value="<?= $user[0]['password'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control <?= ($validation)->hasError('passwordb') ? 'is-invalid' : '' ?>" placeholder="Masukkan password baru" name="passwordb" autocomplete="off" autofocus value="<?= old('passwordb') ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('passwordb'); ?>
                                    </div>
                                    <input type="password" class="mt-1 form-control <?= ($validation)->hasError('passwordu') ? 'is-invalid' : '' ?>" placeholder="Masukkan ulang password baru" name="passwordu" autocomplete="off" value="<?= old('passwordu') ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('passwordu'); ?>
                                    </div>
                                    <?php if (!empty(session()->getFlashdata('same'))) : ?>
                                        <span class="text-danger" style="font-size: 12px;"><?= session()->getFlashdata('same') ?></span>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control <?= ($validation)->hasError('passwordk') ? 'is-invalid' : '' ?>" placeholder="Masukkan password sebelumnya" name="passwordk" autocomplete="off" value="<?= old('passwordk') ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('passwordk'); ?>
                                    </div>

                                    <?php if (!empty(session()->getFlashdata('wrong'))) : ?>
                                        <span class="text-danger" style="font-size: 12px;"><?= session()->getFlashdata('wrong') ?></span>
                                    <?php endif ?>
                                </div>
                                <div class="float-right">
                                    <a href="/user/rincian/<?= session()->get('id') ?>"><button type="button" class="btn btn-secondary mr-2">Batal</button></a>
                                    <button type="submit" class="btn btn-danger">Simpan</button>
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