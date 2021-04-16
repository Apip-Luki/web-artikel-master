<?php $this->load->view('admin/headfoot/header') ?>

<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Generate Laporan</h1>
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
						<h3 class="card-title">Filter Laporan</h3>
					</div>
					<form method="post" action="<?= site_url('Admin/filter_laporan') ?>">
						<div class="card-body">

							<div class="form-row align-items-center">
								<div class="col-auto">
									<div class="form-check mb-2">
										<label class="form-check-label" for="autoSizingCheck">
											Dari
										</label>
									</div>
								</div>
								<div class="col-auto">
									<input type="date" class="form-control mb-2" id="inlineFormInput" name="tgl_awal">
								</div>
								<div class="col-auto">
									<div class="form-check mb-2">
										<label class="form-check-label" for="autoSizingCheck">
											Sampai
										</label>
									</div>
								</div>
								<div class="col-auto">
									<div class="input-group mb-2">
										<input type="date" class="form-control" id="inlineFormInputGroup" name="tgl_akhir">
									</div>
								</div>
								<div class="col-auto">
									<button type="submit" class="btn btn-primary mb-2">Tampilkan</button>
								</div>
							</div>

						</div>
					</form>
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
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">


				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Laporan Pengaduan Masyarakat</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th scope="row">
										Dari Tanggal
									</th>
									<td>
										: wkwk
									</td>
								</tr>
								<tr>
									<th scope="row">
										Sampai Tanggal
									</th>
									<td>
										: gg
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<section class="content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">


									<!-- <div class="card"> -->
										<!-- /.card-header -->
										<div class="card-body">
											<table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr>
														<th rowspan="1" style="text-align: center;">NO</th>
														<th colspan="4" style="text-align: center;">Pengaduan</th>
														<th colspan="3"  style="text-align: center;">Tanggapan</th>
													</tr>
													<tr>
														<th></th>
														<th style="text-align: center;">Tgl Pengaduan</th>
														<th style="text-align: center;">Pelapor</th>
														<th style="text-align: center;">Isi</th>
														<th style="text-align: center;">Foto</th>
														<th style="text-align: center;">Tgl Tanggapan</th>
														<th style="text-align: center;">Isi</th>
														<th style="text-align: center;">Petugas</th>
													</tr>
												</thead>
												<tbody>
													
													<?php if($filter != null) :?>

														<?php 
														$no = 1;
														foreach ($filter as $key) {?>
														<tr>
															<td><?= $no++ ?></td>
															<td><?= $key->tgl_pengaduan ?></td>
															<td><?= $key->masyarakat_nama ?></td>
															<td><?= substr($key->isi_laporan_pengaduan, 0, 15)?>...</td>
															<td>
																<?php if($key->foto_pengaduan == null) : ?>
																	<img style="width: 80px" src="/assets/img/no foto.png" >
																<?php else : ?>
																	<img style="width: 80px" src="<?php echo base_url('/assets/upload/'.$key->foto_pengaduan); ?>" >
																<?php endif;
																?>
															</td>
															<td><?= $key->tgl_tanggapan ?></td>
															<td><?= $key->tanggapan_isi ?></td>
															<td><?= $key->nama_petugas ?></td>
														</tr>
														<?php } ?>

													<?php endif; ?>
												</tbody>
												<tfoot>
													<tr>
														<th style="text-align: center;">NO</th>
														<th style="text-align: center;">Tgl Pengaduan</th>
														<th style="text-align: center;">Pelapor</th>
														<th style="text-align: center;">Isi</th>
														<th style="text-align: center;">Foto</th>
														<th style="text-align: center;">Tgl Tanggapan</th>
														<th style="text-align: center;">Isi</th>
														<th style="text-align: center;">Petugas</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<!-- /.card-body -->
									<!-- </div> -->
									<!-- /.card -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div>
						<!-- /.container-fluid -->
					</section>
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