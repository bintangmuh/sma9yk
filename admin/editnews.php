<?php require '../config.php'; 
session_start();
require 'allowedadmin.php';

if (!isset($_GET['idpost'])) {
	header("location: ./berita.php");
}
$idpost = $_GET['idpost'];
$sql = "SELECT * FROM `tb_berita` WHERE `id_post` = $idpost ORDER BY `waktu` DESC ";
$resedit = $conn->query($sql);
$rows = $resedit->num_rows;

//if data gak ketemu redirect
if($rows == 0) {
	header("location: ./berita.php");
}

$resedit->data_seek(0);
$row = $resedit->fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edit - <?php echo $row['judul']; ?> - Administrator Page - <?php echo "$sekolah"; ?></title>

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
			  <li>Edit Berita</li>
			  <li><?php echo $row['judul']; ?></li>
			</ol>
			<h3><span class="glyphicon glyphicon-pencil"></span><small>Edit Berita</small> | <?php echo $row['judul']; ?></h3>
			<hr>
			<form action="submitberita.php" method="POST" role="form">
					<input type="hidden" name="" value="<?php echo $row['id_post'] ?>">						
					<div class="form-group">
						<label for="title">Judul Berita</label>
						<input type="text" name="judul" class="form-control" id="judul" name="judul" placeholder="Judul" value="<?php echo $row['judul'] ?>">
					</div>
					<div class="form-group">
						<label for="">Konten Berita</label>
						<textarea name="konten" rows="10" class="form-control" placeholder="Konten Berita"><?php echo $row['konten'] ?></textarea>
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
</html>
<?php 
	$resedit->close();
	$conn->close();
 ?>