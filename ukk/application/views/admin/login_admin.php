<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="<?php echo base_url('assets/admin/') ?>img/logo/logo.png" rel="icon">
	<title>RuangAdmin - Login</title>
	<link href="<?php echo base_url('assets/admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin/') ?>css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
	<!-- Login Content -->
	<div class="container-login">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card shadow-sm my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-12">
								<div class="login-form">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Login</h1>
									</div>
									<form class="user" method="post" action="<?php echo site_url('login/login_admin_p') ?>">
										<div class="form-group">
											<input type="text" class="form-control" name="username" aria-describedby="emailHelp"
											placeholder="Enter Email Address">
										</div>
										<div class="form-group">
											<input type="password" class="form-control" name="pass" placeholder="Password">
										</div>
										
										<div class="form-group">
											<button class="btn btn-primary btn-block" type="submit">Login</button>
										</div>
										<hr>
										<div class="text-center col-12">
											<?= $this->session->flashdata('msg');
											?>
										</div>
										<div class="text-center">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Login Content -->
		<script src="<?php echo base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url('assets/admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url('assets/admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="<?php echo base_url('assets/admin/') ?>js/ruang-admin.min.js"></script>
	</body>

	</html>