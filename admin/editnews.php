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
			  <li><a href="index.php" ><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
			  <li><a href="berita.php" ><span class="glyphicon glyphicon-comment"></span> Berita</a></li>
			  <li>Edit Berita</li>
			  <li><?php echo $row['judul']; ?></li>
			</ol>
			
			<h3><span class="glyphicon glyphicon-pencil"></span> <?php echo $row['judul']; ?> <small><code>Edit Berita</code></small></h3>
			<hr>
			<form action="controller/edittbberita.php" method="POST" role="form" enctype="multipart/form-data">
					<input type="hidden" name="idpost" value="<?php echo $row['id_post'] ?>">						
					<div class="form-group">
						<label for="title">Judul Berita</label>
						<input type="text" name="judul" class="form-control" id="judul" name="judul" placeholder="Judul" value="<?php echo $row['judul'] ?>">
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
						<!-- image preview -->
							<?php if (!($row['img_berita'] == "")) { ?>
						   <img src="../img/<?php echo $row['img_berita']; ?>" class="img-thumbnail img-responsive" width="200px">
							<?php } ?>

						   
						</div>
						<div class="panel-footer">
							<div class="form-group">
								<label><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Edit Foto: </label>
				  				<input type="file" name="gambar" id="gambar">
				  			</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Konten Berita</label>
						<textarea name="konten" rows="10" class="form-control" placeholder="Konten Berita"><?php echo $row['konten'] ?></textarea>
					</div>

					<button type="submit" name="submit" class="btn btn-primary">Terbitkan</button>
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