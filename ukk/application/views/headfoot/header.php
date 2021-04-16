<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Lapor.SMEA</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/img/logo-white.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="<?php echo base_url('assets/offline/') ?>fontawesome-5.15.2/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="<?php echo base_url('assets/offline/') ?>font/montserrat.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/offline/') ?>font/italic.css" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?php echo base_url() ?>assets/img/logo-white.png"></a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#page-top">Home</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#home">Prosedur</a></li>
                    <?php if ($this->session->userdata('nik')) : ?>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#form">Lapor!</a></li>
                    <?php else: ?>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#login">Login</a></li>
                    <?php endif; ?>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#history">History</a></li>
                    <?php if ($this->session->userdata('nik')) : ?>
                        <li>
                            <div class="btn-group">
                              <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                               <!--  <?php foreach ($tele as $tlp) {?>
                                <?php if($tlp->masyarakat_tlpn == null) :?>
                                    <a class="dropdown-item" href="#insert-telephone">Input Tlpn</a>
                                 <?php else : ?>
                                    <a class="dropdown-item" data-terget="#telephone">Edit Tlpn</a>
                                <?php endif; ?>
                                <?php } ?> 
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="<?php echo site_url('Login/logout') ?>">LOGOUT</a>
                            </div>
                        </div>
                        <!-- Example split danger button -->
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead  text-white text-center"  style="background-image: url(<?= base_url() ?>/assets/img/home-cover.jpg);">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" style="width: 350px" src="<?php echo base_url() ?>assets/img/logo-white.png" alt="" />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Layanan Aspirasi dan Pengaduan Online Rakyat</h1>
        <!-- Icon Divider-->
        <br>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</p>
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>

        </div>
    </div>
</header>
<!-- insert telephone -->
<div class="modal fade" id="insert-telephone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Telephone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- edit telephone -->
<div class="modal fade" id="edit-telephone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Telephone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-gruop">
            <form method="post" action="<?= site_url('/Welcome/insert_tlpn') ?>" entype="multipart/form-data">
            <label>Tlpn :</label>
            <input type="text" name="tlp" value="">
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>