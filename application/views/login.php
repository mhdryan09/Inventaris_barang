<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Informasi Inventarisasi Barang SMK Muhammadiyah 3 Yogyakarta</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url() ?>plugin/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>plugin/fontawesome/css/all.css">

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<style>
		.container {
			margin-top: 120px;
			width: 50%;
			padding: 30px;
			box-shadow: 0 3px 20px rgba(0, 0, 0, 0.9);
			border-radius: 20px;
		}

		body {
			background-image: url(../assets/img/1.jpg);
			background-size: cover;
		}
	</style>
</head>

<body>
	<div class="container bg-white">
		<h1 style="font-size: 24px" class="text-center">
			Sistem Informasi Inventarisasi Barang Sekolah <br>
			<span style="padding-left: 50px"> SMK Muhammadiyah 3 Yogyakarta </span>
		</h1><br>

		<div class="row">
			<div class="col-md-6">
				<img src="../assets/img/smk.png">
			</div>
			<div class="col-md-6">
				<form action="<?= site_url('auth/proses'); ?>" method="post">
					<div class="form-group">
						<label> Username </label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"> <i class="fa fa-user"></i></div>
							</div>
							<input type="text" name="username" class="form-control" required placeholder="Masukkan Username">
						</div>
					</div>

					<div class="form-group">
						<label> Password </label>

						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"> <i class="fa fa-key"></i> </div>
							</div>
							<input type="password" name="password" class="form-control" required placeholder="Masukkan Password">
						</div>

					</div>
					<button type="submit" name="login" class="btn btn-primary">Masuk</button>
					<button type="reset" class="btn btn-success">Reset</button>
				</form>
			</div>
		</div>

	</div>


</body>

</html>
<!-- jQuery 3 -->
<script src="<?= base_url() ?>plugin/bootstrap/js/jquery.slim.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>plugin/bootstrap/js/bootstrap.min.js"></script>