<?php require '../config.php'; 
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

		<!-- tinyMCE -->
		<script type="text/javascript" src="../js/tinymce.min.js"></script>
		<script type="text/javascript">
		tinymce.init({
		    selector: "textarea"
		 });
		</script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php require 'navbar.php'; ?>
	<div class="fluid">
		<?php require 'menu.php'; ?>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 content-admin">
			<ol class="breadcrumb">
			  <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
			  <li><a href="berita.php"><span class="glyphicon glyphicon-comment"></span> Berita</a></li>
			  <li>Tambah Berita</li>
			</ol>
			<h3><span class="glyphicon glyphicon-plus"></span> Tambah Berita</h3>
			<hr>
			<form action="controller/submitberita.php" method="POST" role="form" enctype="multipart/form-data">						
					<div class="form-group">
						<label for="title">Judul Berita</label>
						<input type="text" name="judul" class="form-control" id="title" name="judul" placeholder="Judul">
					</div>
					<div class="form-group">
						<label>Tambah Foto: </label>
				  		<input type="file" name="gambar" id="gambar">
				  	</div>
					<div class="form-group">
						<label for="">Konten Berita</label>
						<textarea name="konten" rows="10" class="form-control" placeholder="Konten Berita"></textarea>
					</div>

					<button type="submit" class="btn btn-primary">Terbitkan</button>
			</form>			
		</div>
		</div>
	</div>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
	<?php 
		$conn->close();
	 ?>
</html>