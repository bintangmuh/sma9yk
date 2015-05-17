<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Daftar Akun - <?php echo "$sekolah"; ?></title>

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="fluid header">
			<div class="container">
			<h3>Daftar Akun Guru Sekolah</h3>
			<h2><?php echo "$sekolah"; ?></h2>
			<p>Silahkan hubungi administrator jika ada kesulitan dalam melakukan pendaftaran</p>
			</div>
		</div>
		<div class="container">
			<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-lg-6 col-md-offset-3 bayang" style="background: #fff;">
				<form action="inputsignup.php" method="POST" role="form">
					<legend><h3><span class="glyphicon glyphicon-user"></span> Daftar Guru</h3></legend>
					<div class="form-group">
						<label for="user">Username : </label>
						<input type="text" class="form-control" name="user" id="user" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="NIP">NIP : </label>
						<input type="text" class="form-control" id="NIP" placeholder="Nomor Induk Pegawai">
					</div>
					<div class="form-group">
						<label for="nama">Nama Lengkap : </label>
						<input type="text" class="form-control" id="nama" placeholder="Nama Lengkap">
					</div>
					<div class="form-group">
						<label>Alamat : </label>
						<textarea name="alamat" class="form-control" placeholder="Alamat Lengkap"></textarea>
					</div>
					<div class="form-group">
						<label>Mata Pelajaran</label>
						<select name="mapel" class="form-control">
							<option value="">Matematika</option>
							<option value="">Agama</option>
							<option value="">IPA</option>
							<option value="">IPS</option>
						</select>
					</div>
											
					<button type="submit" class="btn btn-primary">Daftar</button>
				</form>
			</div>
			

		</div>
		<div class="fluid">
			<p class="text-center">Copyright &copy; <?php echo "$sekolah"; ?> 2015</p>
		</div>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>