<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title><?= $title; ?></title>

     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome Icons -->
     <link rel="stylesheet" href="<?= base_url(); ?>/asset/adminlte/plugins/fontawesome-free/css/all.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="<?= base_url(); ?>/asset/adminlte/dist/css/adminlte.css">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Tempusdominus Bootstrap 4 -->
     <link rel="stylesheet"
          href="<?= base_url(); ?>/asset/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <!-- iCheck -->
     <link rel="stylesheet" href="<?= base_url(); ?>/asset/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
     <!-- JQVMap -->
     <link rel="stylesheet" href="<?= base_url(); ?>/asset/adminlte/plugins/jqvmap/jqvmap.min.css">
     <!-- overlayScrollbars -->
     <link rel="stylesheet"
          href="<?= base_url(); ?>/asset/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
     <!-- Daterange picker -->
     <link rel="stylesheet" href="<?= base_url(); ?>/asset/adminlte/plugins/daterangepicker/daterangepicker.css">
     <!-- summernote -->
     <link rel="stylesheet" href="<?= base_url(); ?>/asset/adminlte/plugins/summernote/summernote-bs4.min.css">


</head>

<body class="hold-transition sidebar-mini">
     <div class="wrapper">
          <?= $this->include('layout/navbar'); ?>
          <?= $this->include('layout/sidebar'); ?>


          <?= $this->renderSection('content') ?>
          <?= $this->include('layout/footer'); ?>

     </div>
     <!-- ./wrapper -->
     <?= $this->include('layout/javascript'); ?>
</body>

</html>