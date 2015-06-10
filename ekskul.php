<?php 
	require 'config.php';

	$sql = "SELECT * FROM tb_ekskul";
	$proses = $conn->query($sql);
	$banyakdata = $proses->num_rows;
	$proses->data_seek(0);
	$visimisi = $proses->fetch_array(MYSQLI_ASSOC);
	$conn->close();
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ekstrakurikuler <?php echo "$sekolah"; ?></title>

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
		<?php include 'menu.php'; ?>

		<div class="fluid header">
			<div class="container ">
				<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
				<h1>Ekstrakurikuler - <?php echo "$sekolah"; ?></h1>
				<p><?php echo $alamat ?></p>
				<a href="virtualtour.php" class="btn btn-success">Virtual Tour</a>
				
			</div>
			</div>
		</div>
		
		<div class="container bayang ">
			<img src="img/logo.png" width="80px" class="img-clip">
			<h3 class="text-center">Ekstrakurikuler Sekolah <?php echo $sekolah ?></h3>
			<hr>
			<p class="text-center">Berikut ini adalah beberapa ekstrakurikuler yang disediakan oleh sekolah:</p>

			<!-- menampilkan Ekstra -->
			<?php 
			for($i=0; $i<$banyakdata; $i++) { 
				$proses->data_seek($i);
				$ekskul = $proses->fetch_array(MYSQLI_ASSOC);
			?>
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
				<div class="thumbnail">
					<img src="img/<?php echo $ekskul['image']; ?>" alt="">
					<div class="caption">
						<h3><?php echo $ekskul['nama_ekskul']; ?></h3>
						<hr>
						<div style="height: 60px; overflow: hidden;">
							<?php echo $ekskul['deskripsi']; ?>
						</div>
						<p>
							<a href="ekskulview.php" class="btn btn-primary">Lihat</a>
						</p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>

		<center><h3><small>Copyright &copy; <?php echo "$sekolah"; ?></small></h3></center>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>