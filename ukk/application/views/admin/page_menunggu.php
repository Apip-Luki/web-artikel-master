<?php $this->load->view('admin/headfoot/header') ?>

<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Laporan</h1>
      </div>

    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Verifikasi</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pelapor</th>
                  <th>Judul</th>
                  <th>Isi</th>
                  <th>Tanggal</th>
                  <th>Foto</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($menunggu as $key) {?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?= $key->masyarakat_nama ; ?></td>
                  <td><?= $key->pengaduan_judul?></td>
                  <td><?= substr($key->isi_laporan_pengaduan, 0, 15)?>...</td>
                  <td><?= $key->tgl_pengaduan?></td>
                  <td>
                    <?php if($key->foto_pengaduan == null) : ?>
                     <img style="width: 80px" src="/assets/img/no foto.png" >
                   <?php else : ?>
                    <img style="width: 80px" src="<?php echo base_url('/assets/upload/'.$key->foto_pengaduan); ?>" >
                  <?php endif;
                  ?>
                </td>
                <td>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-verifikasi<?= $key->id_pengaduan?>"> 
                    Verifikasi
                  </button>
                </td>
                <td>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-detail<?= $key->id_pengaduan?>">
                    <i class="fa fa-search"></i>
                  </button>
                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delet<?= $key->id_pengaduan?>">
                    <i class="fa fa-trash"></i>
                  </button> 
                  <!-- <a type="button" class="btn btn-danger" href="#delet-modal<?= $key->id_pengaduan?>"><i class="fa fa-trash"></i></a> -->
                </td>
              </tr>
              <!-- modal detail -->
              <div class="modal fade" id="modal-detail<?= $key->id_pengaduan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama :</label>
                        <?= $key->masyarakat_nama?>
                      </div>
                      <div class="form-group">
                        <label>NIK :</label>
                        <?= $key->masyarakat_nik?>
                      </div>
                      <div class="form-group">
                        <label>Tlpn :</label>
                        <?= $key->masyarakat_tlpn ?>
                      </div>
                      <div class="form-group">
                        <label>Tgl Lapor :</label>
                        <?= $key->tgl_pengaduan?>
                      </div>
                      <div class="form-group">
                        <label>Foto :</label><br>
                        <?php if($key->foto_pengaduan == null) : ?>
                         <img style="width: 400px" src="/assets/img/no foto.png" >
                       <?php else : ?>
                        <img style="width: 400px" src="<?php echo base_url('/assets/upload/'.$key->foto_pengaduan); ?>" >
                      <?php endif;
                      ?>
                    </div>
                    <div class="form-group">
                      <label>Judul :</label>
                      <?= $key->pengaduan_judul?>
                    </div>
                    <div class="form-group">
                      <label>Isi :</label><br>
                      <?= $key->isi_laporan_pengaduan?>
                    </div>

                    <div class="form-group">
                      <label>Status :</label><?php if($key->status_pengaduan == '0') : ?>
                      <p class="card-text text-center badge badge-warning">Menunggu Verifikasi</p>
                    <?php elseif ($key->status_pengaduan == 'proses') : ?>
                      <p class="card-text text-center badge badge-info">Proses</p>
                    <?php else : ?>
                      <p class="card-text text-center badge badge-success">Selesai</p>
                    <?php endif; ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /modal -->
          <!-- modal delet -->
          <div class="modal fade" id="modal-delet<?= $key->id_pengaduan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Hapus Laporan Pengaduan?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a type="button" class="btn btn-danger" href="<?= site_url('admin/delet_pengaduan/'.$key->id_pengaduan) ?>">Hapus</a>
                </div>
              </div>
            </div>
          </div>
          <!-- /modal -->
          <!-- Modal verifikasi -->
          <div class="modal fade" id="modal-verifikasi<?= $key->id_pengaduan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Verifikasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Verifikasi data Pengaduan?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a type="button" class="btn btn-primary" href="<?= site_url('/admin/update_verif/'.$key->id_pengaduan) ?>">verifikasi</a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama Masyarakat</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Tanggal</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- Button trigger modal -->


<!-- Modal -->

<!-- /.content-wrapper -->
<?php $this->load->view('admin/headfoot/footer') ?>