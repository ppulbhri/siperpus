<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?= $title ?> | SIPERPUS</title>
    <link rel="shortcut icon" href="/img/logo.png">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&family=Rubik&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <style>
        .content-wrapper {
            padding-bottom: 20px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <?= $this->include('layout/navbar') ?>

        <?= $this->renderSection('content'); ?>

        <footer class="main-footer">
            <strong>Copyright &copy; 2020 SIPERPUS</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>SMK</b> Darussa'adah
            </div>
        </footer>

    </div>

    <!-- REQUIRED SCRIPTS -->


    <?php if (!empty(session()->getFlashdata('alert'))) : ?>
        <script>
            alert("<?= session()->getFlashdata('alert') ?>")
        </script>
    <?php endif ?>

    <!-- jQuery -->
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/dist/js/adminlte.min.js"></script>
    <!-- Select2 -->
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="/adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script>
        $(function() {
            $('.carousel').carousel({
                interval: 2000
            })
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
            $('#switch-change').on('switchChange', function() {
                alert('halo');
            });
        })

        function previewImg() {
            const profil = document.querySelector('#profil');
            const profilLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            profilLabel.textContent = profil.files[0].name;

            const fileProfil = new FileReader();
            fileProfil.readAsDataURL(profil.files[0]);

            fileProfil.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>