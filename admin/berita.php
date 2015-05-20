<?php require '../config.php'; 
$sql="SELECT * FROM `tb_berita` ";
$result = $conn->query($sql);
$rows = $result->num_rows;

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
			<p>There is no news updated</p>
			<?php
				for ($j=0; $j < $rows ; $j++) { 
					$result->data_seek($j);
					$row = $result->fetch_array(MYSQLI_ASSOC);
					echo "<h3>".$row['judul']."</h3>";
					echo "<p>".$row['konten']."</p>";
					echo '<a href="info.php" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a> <a href="info.php" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>';
					echo "<hr>";

				}
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