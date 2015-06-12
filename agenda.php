<?php 
	require 'config.php';

	$query="SELECT * FROM `tb_agenda` ORDER BY `tb_agenda`.`agendawkt` DESC ";
	$agenda = $conn->query($query);
	$rows = $agenda->num_rows;
	$conn->close();
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Agenda <?php echo "$sekolah"; ?></title>

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
				<h1>Agenda - <?php echo "$sekolah"; ?></h1>
				<p><?php echo $alamat ?></p>
				<a href="virtualtour.php" class="btn btn-success">Virtual Tour</a>
				
			</div>
			</div>
		</div>
		
		<div class="container bayang ">
			<img src="img/logo.png" width="80px" class="img-clip">
			<h3 class="text-center">Agenda</h3>
			<p class="text-center">Daftar agenda <?php echo "$sekolah"; ?></p>
			<hr>
			<?php 
					for ($i=0; $i < $rows; $i++) { 
						$agenda->data_seek($i);
						$row = $agenda->fetch_array(MYSQLI_ASSOC);
				 ?>
			<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 box">
				<h3><?php echo $row['judul']; ?></h3>
				<h4><?php echo date("d M Y",strtotime($row['agendawkt'])); ?></h4>
				<hr>
				<p><?php echo date("H:i",strtotime($row['agendawkt'])); ?></p>
				<p><?php echo $row['konten']; ?></p>
			</div>
			<?php } ?>
		</div>
		
		<?php include 'footer.php'; ?>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>