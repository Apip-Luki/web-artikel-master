<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | <?php echo ($this->session->userdata('nama_petugas')) ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-fw fa-sign-out-alt"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('Login/logout_admin') ?>" class="dropdown-item dropdown-footer text-danger">Logout</a>
          </div>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?php echo base_url('assets/') ?>dist/img/AdminLTELogo.png"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <!-- <img src="<?php echo base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo ($this->session->userdata('nama_petugas')) ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           <li class="nav-header">FEATURES</li>
           <li class="nav-item">
            <a href="<?php echo site_url('admin/page_menunggu') ?>" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Menunggu Verifikasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/page_proses') ?>" class="nav-link">
              <i class="nav-icon far fa-circle text-primary"></i>
              <p>Tanggapan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/page_selesai') ?>" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Selesai</p>
            </a>
          </li>

        </ul>
        <?php if ($this->session->userdata('level') == 'admin' ) : ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-header">ADMIN</li>
           <li class="nav-item">
            <a href="<?php echo site_url('admin/registrasi_petugas') ?>" class="nav-link">
             <i class="nav-icon far fa fa-user-plus"></i>
              <p class="text">Registrasi Petugas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('admin/page_laporan') ?>" class="nav-link">
              <i class="nav-icon far fa fa-file-pdf"></i>
              <p class="text">Generate Laporan</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo site_url('admin/daftar_petugas') ?>" class="nav-link">
              <i class="nav-icon far fa fa-users"></i>
              <p class="text">Petugas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/data_masyarakat') ?>" class="nav-link">
              <i class="nav-icon far fa fa-users"></i>
              <p class="text">Masyarakat</p>
            </a>
          </li>
        </ul>
      <?php endif; ?>
      </nav>
      <!-- /.sidebar-menu -->
      <hr>
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">