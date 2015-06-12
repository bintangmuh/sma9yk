<?php 
	require 'config.php';

	//mencari data pada tabel berita
	if (!isset($_GET['newsid'])) {
		header("location: ./news.php");
	}
	$id = $_GET['newsid'];
	$sql="SELECT * FROM `tb_berita` WHERE `id_post` = $id ";
	$result = $conn->query($sql);
	$rows = $result->num_rows;

	$result->data_seek(0);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$conn->close();
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> <?php echo $row['judul']." - "; echo "$sekolah"; ?></title>

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
				<h1>Berita Sekolah - <?php echo "$sekolah"; ?></h1>
				<p><?php echo $alamat ?></p>
				<a href="virtualtour.php" class="btn btn-success">Virtual Tour</a>
				
			</div>
			</div>
		</div>
		
		<div class="container bayang ">
			<img src="img/logo.png" width="80px" class="img-clip">
			<h3><?php echo $row['judul']; ?></h3>
			<hr>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						   <h4><small>Dipublikasikan oleh <?php echo $row['user_id']; ?> pada <?php echo date( 'd M Y H:i', strtotime($row['waktu'])); ?></small></h4><br>
							<?php if (!($row['img_berita'] == "")) { ?>
							   		<img src="img/<?php echo $row['img_berita']; ?>" class="img-thumbnail img-responsive" style="margin-bottom: 10px;"><br>

								 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								 	<?php echo $row['konten']; ?>
								 </div>
							<?php } else {?>
								<div>
							  		<?php echo $row['konten']; ?>
								</div>
							<?php } ?>
							<br>
						<hr>
				</div>
		</div>

<?php include 'footer.php'; ?>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>