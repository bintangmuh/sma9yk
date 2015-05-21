<?php require '../config.php'; 

//mencari data pada tabel berita
$sql="SELECT * FROM `tb_berita` ORDER BY `tb_berita`.`waktu` DESC";
$result = $conn->query($sql);
$rows = $result->num_rows;

//memulai session dan mengecek session
session_start();
require 'allowedadmin.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Administrator Page - <?php echo "$sekolah"; ?></title>

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
			<ol class="breadcrumb">
			  <li><a href="index.php" title=""><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
			  <li><a href="berita.php" title=""><span class="glyphicon glyphicon-comment"></span> Berita</a></li>
			</ol>
			<h3><span class="glyphicon glyphicon-comment"></span> Berita</h3>
			<hr>

			<!--alert warning-->
			<?php if(isset($_GET['err']) &&  ($_GET['err'] == 1)) {?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Gagal Post</strong> Sebaiknya anda melakukan kembali postingan
			</div>
			<?php } ?>

			<?php if(isset($_GET['err']) && ($_GET['err'] == 0)) {?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Post Sudah Berhasil dipublikasi</strong> Silahkan cek postingan!
			</div>

			<?php } ?>
			<!--cek jika tidak ada post-->
			<?php 
				if($rows < 1) { ?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bayang">
					<p>Tak ada post</p>
				</div>
			<?php }
			 ?>

			<!--tampilkann jika ada post-->
			<?php
				for ($j=0; $j < $rows ; $j++) { 
					$result->data_seek($j);
					$row = $result->fetch_array(MYSQLI_ASSOC);
			?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="panel panel-default bayang">
					<div class="panel-body">
					   <h4><?php echo $row['judul']; ?></h4>
					   <p><?php echo $row['konten']; ?></p>
					   <h4 class="pull-left"><small>posted by <?php echo $row['user_id']; ?> pada <?php echo $row['waktu']; ?></small></h4>
					   <div class="btn-group pull-right">
					   	<a href="info.php" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a> 
					   <a href="info.php" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
					   </div>
					</div>
				</div>
			</div>
			<?php
				}
				$result->close();
				$conn->close();
			 ?>

			<a href="addnews.php" class="btn btn-success" title=""><span class="glyphicon glyphicon-plus"></span> Tambah Berita</a>
		</div>
		</div>
	</div>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>