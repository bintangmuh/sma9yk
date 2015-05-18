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
			  <li><a href="guru.php" title=""><span class="glyphicon glyphicon-user"></span> Guru</a></li>
			</ol>
			<!--Content Guru-->
			<h3><span class="glyphicon glyphicon-user"></span> Guru <?php echo "$sekolah"; ?></h3>
			<hr>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<!--table guru-->
			<table class="table table-hover">
				<thead>
					<tr>
						<th>NIP</th>
						<th>Nama</th>
						<th>Mata Pelajaran</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>111 22 3 4 2323 23</td>
						<td>Bintang Muhammad</td>
						<td>Kehidupan</td>
						<td><a href="info.php" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a> <a href="info.php" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
				</tbody>
			</table>
			<a href="addguru.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Guru</a> 
			<a href="addmapel.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Mata Pelajaran</a></a>
		</div>
	</div>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>