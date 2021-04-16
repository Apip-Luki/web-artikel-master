<?php $this->load->view('headfoot/header') ?>
<!-- Portfolio Section-->
<section class="page-section service" id="home">
    <div class="container">
        <!-- Services Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary">Service</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="row">
            <!-- Service Section Content 1-->
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fa fa-edit fa-w-18 fa-3x text-secondary mb-4"></i>
                    <h3 class="h4 mb-2">Tulis Laporan</h3>
                    <hr>
                    <p class="text-muted mb-0 lead">Tulis keluh kesah anda</p>
                </div>
            </div>
            <!-- Service Section Content 2-->
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fa fa-share fa-w-16 fa-3x text-secondary mb-4"></i>
                    <h3 class="h4 mb-2">Proses Verifikasi</h3>
                    <hr>
                    <p class="text-muted mb-0 lead">Dalam 3 hari keluh kesah anda akan di tanggapi</p>
                </div>
            </div>
            <!-- Service Section Content 3-->
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fa fa-comments fa-w-18 fa-3x text-secondary mb-4"></i>
                    <h3 class="h4 mb-2">Tindak Lanjut</h3>
                    <hr>
                    <p class="text-muted mb-0 lead">Dalam 5 hari keluh kesah anda akan di tindak lanjuti</p>
                </div>
            </div>
            <!-- Service Section Content 4-->
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fa fa-check fa-w-16 fa-3x text-secondary mb-4"></i>
                    <h3 class="h4 mb-2">Selesai</h3>
                    <hr>
                    <p class="text-muted mb-0 lead">Keluh kesah Anda akan terus ditindaklanjuti hingga terselesaikan</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- About Section-->
<!-- pengkodisian untuk form laporan-->
<?php if ($this->session->userdata('nik')) : ?>
    <!-- Login Section-->
    <section class="page-section bg-red  mb-0" id="form">

        <!-- Login Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">Form Pengaduan</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="far fa-list-alt"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="container">
            <div class="text-center col-12">
              <?= $this->session->flashdata('msg');
              ?>
          </div>
          <div class="row">
            <div class="col-lg-8 mx-auto bg-white">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                <form method="post" action="<?php echo site_url('Welcome/insert_laproan') ?>" enctype="multipart/form-data">
                   <div class="form-control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Tanggal</label>
                        <input class="form-control" name="tgl" type="date" required="required" />
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="form-control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Judul Laporan</label>
                        <input class="form-control" name="judul" type="text" placeholder="Ketik Judul Laporan Anda" required="required" data-validation-required-message="Please enter your name." />
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Isi Laporan</label>
                        <textarea class="form-control" name="isi" rows="5" placeholder="Ketik Isi Laporan Anda" required="required" data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
               <!--  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div> -->
                 <div class="mt-3">
                                <small class="text-danger">*silahkan masukan berkas pendukung, jika ada.</small>
                                <div class="form-group">
                                    <input type="file" class="form-control-file" name="foto">
                                </div>
                            </div>
            <div class="form-group">
                <input type="hidden" class="form-control-file" name="proses" value="0">
            </div>
            <br />
            <div id="success"></div>
            <div class="form-group"><button type="submit" class="btn btn-danger">Submit</button></div>
        </form>
    </div>
</div>
</div>
</section>
<?php else : ?>

    <section class="page-section bg-red text-white mb-0" id="login">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">Login First</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-4 ml-auto"><p class="lead">Sebelum membuat laporan, Login terlebih dahulu!</p>
                    <div class="text-center">
                     <a href="<?php echo base_url('Login/login_first') ?>" class="btn btn-xl btn-outline-light" >

                        Login!  
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mr-auto"><p class="lead">Jika belum memiliki akun, Daftar terlebih dahulu!</p>
                <div class="text-center">
                 <a class="btn btn-xl btn-outline-light" href="<?php echo base_url('Login/register') ?>"">

                    Register!  
                </a>
            </div>
        </div>
    </div>

</div>
</section>
<?php endif; ?>
<!-- Contact Section-->
<section class="page-section" id="history">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">History</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->

                <!-- <div class="card-deck "> -->
                    <div class="row justify-content-center">
                        <!--  -->
                        <?php foreach ($histori as $row ) { ?>
                        <div class="col-4">
                          <div class="card" style="height: 450px!important">
                        <?php if($row->foto_pengaduan == null) : ?>
                         <img class="card-img-top" src="assets/img/no foto.png" >
                        <?php else : ?>
                        <img class="card-img-top" src="<?php echo base_url('/assets/upload/'.$row->foto_pengaduan); ?>" >
                        <?php endif;
                         ?>
                    <div class="card-body">
                      <h4 class="card-title"><?php  echo $row->pengaduan_judul ?></h4>
                      <!-- <h5 class="card-title"><?php  echo $row->masyarakat_nama ?></h5> -->
                      <h6 class="card-title">ISI:</h6>
                      <p class="card-text"><?php  echo substr($row->isi_laporan_pengaduan, 0, 15) ?>...</p>
                      <h6 class="card-title">Tanggapan:</h6>
                      <p class="card-text"><?php  echo substr($row->tanggapan_isi, 0, 15) ?>...</p>
                      
                      <?php if($row->status_pengaduan == '0') : ?>
                      <p class="card-text text-center badge badge-warning">Menunggu</p>
                  <?php elseif ($row->status_pengaduan == 'proses') : ?>
                      <p class="card-text text-center badge badge-info">Proses</p>
                  <?php else : ?>
                        <p class="card-text text-center badge badge-success">Selesai</p>
                  <?php endif; ?>
                  </div>
                  <div class="card-footer">
                      <small class="text-muted"><?= date_format(date_create($row->tgl_pengaduan),"l,d-m-Y") ?></small>
                  </div>
              </div>
          </div>
          <?php  } ?>
          <!--  -->
      </div>
      <!-- </div> -->
  </div>
</div>
</div>
</section>
<!-- Footer-->



<?php $this->load->view('headfoot/footer') ?>