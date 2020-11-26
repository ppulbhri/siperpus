<style>
    .img-profil {
        width: 40px !important;
        height: 40px !important;
        background-size: cover !important;
        object-fit: cover !important;
        object-position: center !important;
    }
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <h5 class="nav-link"><?= $header ?></h5>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-2 pb-1 mb-3 d-flex">
            <div class="image mt-1">
                <a href="/user/rincian/<?= session()->get('id') ?>"><img src="/img/profil/<?= session()->get('profil') ?>" class="img-circle img-profil elevation-2"></a>
            </div>
            <div class=" info">
                <a href="/user/rincian/<?= session()->get('id') ?>" class="d-block"><?= session()->get('nama') ?><br><sup class="text-info"><?= session()->get('level') ?></sup></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/" class="nav-link <?= (session()->get('hal') == 'index') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= (session()->get('hal') == 'riwayat') ? 'menu-open' : '' ?><?= (session()->get('hal') == 'pinjam') ? 'menu-open' : '' ?> <?= (session()->get('hal') == 'data_pinjam') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= (session()->get('hal') == 'pinjam') ? 'active' : '' ?> <?= (session()->get('hal') == 'data_pinjam') ? 'active' : '' ?><?= (session()->get('hal') == 'riwayat') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Peminjaman
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/Pinjam/pinjam" class="nav-link <?= (session()->get('hal') == 'pinjam') ? 'active' : '' ?>">
                                <i class="fas fa-plus mr-2"></i>
                                <p>Pinjam Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Pinjam/data" class="nav-link <?= (session()->get('hal') == 'data_pinjam') ? 'active' : '' ?>">
                                <i class="fas fa-wave-square mr-1"></i>
                                <p>Data Pinjam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Pinjam/riwayat" class="nav-link <?= (session()->get('hal') == 'riwayat') ? 'active' : '' ?>">
                                <i class="fas fa-history mr-2"></i>
                                <p>Riwayat Peminjaman</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= (session()->get('hal') == 'add_book') ? 'menu-open' : '' ?> <?= (session()->get('hal') == 'data_book') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= (session()->get('hal') == 'add_book') ? 'active' : '' ?> <?= (session()->get('hal') == 'data_book') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Perbukuan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/Buku/tambah" class="nav-link <?= (session()->get('hal') == 'add_book') ? 'active' : '' ?>">
                                <i class="fas fa-plus mr-2"></i>
                                <p>Tambah Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Buku/data" class="nav-link <?= (session()->get('hal') == 'data_book') ? 'active' : '' ?>">
                                <i class="fas fa-wave-square mr-1"></i>
                                <p>Data Buku</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview <?= (session()->get('hal') == 'tambah_siswa') ? 'menu-open' : '' ?> <?= (session()->get('hal') == 'data_siswa') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= (session()->get('hal') == 'tambah_siswa') ? 'active' : '' ?> <?= (session()->get('hal') == 'data_siswa') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Siswa
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/Siswa/tambah" class="nav-link <?= (session()->get('hal') == 'tambah_siswa') ? 'active' : '' ?>">
                                <i class="fas fa-plus mr-2"></i>
                                <p>Tambah Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Siswa/data" class="nav-link <?= (session()->get('hal') == 'data_siswa') ? 'active' : '' ?>">
                                <i class="fas fa-wave-square mr-1"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if (session()->get('level') == 'Admin') : ?>
                    <li class="nav-item has-treeview <?= (session()->get('hal') == 'data_user') ? 'menu-open' : '' ?> <?= (session()->get('hal') == 'tambah_user') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= (session()->get('hal') == 'data_user') ? 'active' : '' ?> <?= (session()->get('hal') == 'tambah_user') ? 'active' : '' ?>">
                            <i class="fas fa-users-cog mr-2"></i>
                            <p>
                                Pengguna
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/User/tambah" class="nav-link <?= (session()->get('hal') == 'tambah_user') ? 'active' : '' ?>">
                                    <i class="fas fa-plus mr-2"></i>
                                    <p>Tambah Pengguna</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/User/data" class="nav-link <?= (session()->get('hal') == 'data_user') ? 'active' : '' ?>">
                                    <i class="fas fa-wave-square mr-1"></i>
                                    <p>Data Pengguna</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif ?>

                <li class="nav-item">
                    <a href="/Login/logout" class="nav-link" onclick="return confirm('Apakah anda ingin keluar?')">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>