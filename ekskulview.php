<?php 
	require 'config.php';

	//mencari data pada tabel berita
	$id = $_GET['id'];

	$sql ="SELECT * FROM `tb_ekskul` WHERE `id_ekskul` = $id ";
	$ekstrakurikuler = $conn->query($sql);
	$ekstrakurikuler->data_seek(0);
	$ekskulview = $ekstrakurikuler->fetch_array(MYSQLI_ASSOC);
	$conn->close();
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> <?php echo "$sekolah"; ?></title>

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
				<h1><?php echo $ekskulview['nama_ekskul']; ?></h1>					
			</div>
			</div>
		</div>
		
		<div class="container bayang ">
			<img src="img/logo.png" width="80px" class="img-clip">
			<img src="img/<?php echo $ekskulview['image']; ?>" width="100%" class="img-responsive">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h3><?php echo $ekskulview['nama_ekskul']; ?></h3>					
				<?php echo $ekskulview['deskripsi']; ?>
			</div>
		</div>

<?php include 'footer.php'; ?>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>