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
            <h3 class="card-title">Selesai</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tlpn</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($daftar_petugas as $key) {?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $key->nama_petugas ?></td>
                <td><?= $key->petugas_username ?></td>
                <td><?= $key->petugas_tlpn ?></td>
              <td>
                <!-- <a href="#" class="btn btn-info"></a> -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-detail<?= $key->id_petugas?>">
                  <i class="fa fa-search"></i>
                </button>
                <?php if($key->id_petugas != '1') :?>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delet<?= $key->id_petugas?>">
                  <i class="fa fa-trash"></i>
                </button>
            <?php endif	 ?>
              </td>
            </tr>


         <!-- modal delet -->
          <div class="modal fade" id="modal-delet<?= $key->id_petugas?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Hapus Data Petugas?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a type="button" class="btn btn-danger" href="<?= site_url('admin/delet_data_petugas/'.$key->id_petugas) ?>">Hapus</a>
                </div>
              </div>
            </div>
          </div>
          <!-- /modal -->

      <?php } ?>
    </tbody>
    <tfoot>
       <tr>
         <th>No</th>
         <th>Nama</th>
         <th>Email</th>
         <th>Tlpn</th>
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

<!-- /.content-wrapper -->
<?php $this->load->view('admin/headfoot/footer') ?>