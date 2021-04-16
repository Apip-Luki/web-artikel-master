<?php $this->load->view('admin/headfoot/header') ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Registrasi</h1>
			</div>

		</div>
	</div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Registrasi Petugas</h3>
				</div>
				<br>
				<div class="text-center col-12">
              <?= $this->session->flashdata('msg');
              ?>
          </div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form" method="post" action="<?php echo site_url('Admin/proses_register_petugas') ?>">
					<div class="card-body">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="nama" placeholder="Nama">
						</div>
						<div class="form-group">
							<label>Email address</label>
							<input type="email" class="form-control" name="username" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<div class="form-group">
							<label>Telp</label>
							<input type="text" class="form-control" name="tlp" placeholder="Telephon">
						</div>
						<div class="form-group">
							<label>Level</label><br>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" value="admin" name="level">
							<label class="form-check-label">Admin</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" value="petugas" name="level">
							<label class="form-check-label">Petugas</label>
						</div>
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('admin/headfoot/footer') ?>