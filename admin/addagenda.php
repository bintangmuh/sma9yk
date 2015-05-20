<?php require '../config.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Halaman Daftar Guru - <?php echo "$sekolah"; ?></title>

		<!-- Bootstrap CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="fluid">
		
		<?php require 'menu.php'; ?>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 content-admin">
			<!--pagination menu-->
			<ol class="breadcrumb">
			  <li><a href="index.php" title=""><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
			  <li><a href="agenda.php" title=""><span class="glyphicon glyphicon-calendar"></span> Agenda</a></li>
			  <li><a href="addagenda.php" title=""> Tambah Agenda</a></li>
			</ol>
			<!--Content Guru-->
			<h3><span class="glyphicon glyphicon-user"></span>Tambah Agenda <?php echo "$sekolah"; ?></h3>
			<hr>
			<form action="inputagenda.php" method="POST" role="form">
				
				<div class="form-group">
					<label for="">Nama Agenda : </label>
					<input type="text" class="form-control" id="" placeholder="Judul">
				</div>
				<div class="form-group">
					<label for="">Isi : </label>
					<textarea class="form-control" rows=10 name="content"></textarea>
				</div>
				<div class="form-group">
					<label for="">Tanggal Diadakan : </label>
					<input type="date" name="date" placeholder="">
				</div>
			
				
			
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>