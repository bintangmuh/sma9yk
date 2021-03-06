<?php require '../config.php'; 

//mencari data pada tabel berita
$sql="SELECT * FROM `tb_berita` ORDER BY `tb_berita`.`waktu` DESC";
$result = $conn->query($sql);
$rows = $result->num_rows;

//memulai session dan mengecek session
session_start();
require 'allowedadmin.php';

if (!isset($_GET['postcount'])) {
	$count = 5;		
}
else {
	$count = $_GET['postcount'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Berita - Administrator Page - <?php echo "$sekolah"; ?></title>

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

	<?php require 'navbar.php'; ?>
	<div class="fluid">
		<?php require 'menu.php'; ?>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 content-admin">
			<ol class="breadcrumb">
			  <li><a href="index.php" ><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
			  <li><a href="berita.php" ><span class="glyphicon glyphicon-comment"></span> Berita</a></li>
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

			<!-- alert sukses posting -->
			<?php if(isset($_GET['err']) && ($_GET['err'] == 0)) {?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Post Sudah Berhasil dipublikasi</strong> Silahkan cek postingan!
			</div>
			<?php } ?>

			<!-- alert sukses edit -->
			<?php if(isset($_GET['err']) && ($_GET['err'] == 2)) {?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Post Sudah Berhasil di edit</strong> Silahkan cek postingan!
			</div>
			<?php } ?>


			<!-- alert sukses delete -->
			<?php if(isset($_GET['err']) && ($_GET['err'] == 3)) {?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Post Sudah Berhasil di hapus</strong> Post yang telah dihapus tidak akan kembali
			</div>
			<?php } ?>

			<center>
			<div class="btn-group">
				<a href="addnews.php" class="btn btn-success"  style="margin-bottom: 10px"><span class="glyphicon glyphicon-plus"></span> Tambah Berita</a>
				<?php 
					if ($count < $rows) {
					// lihat selebihnya
					echo '<a class="btn btn-primary" href="berita.php?postcount='.($count+5).'"><span class="glyphicon glyphicon-chevron-down"></span> Lihat Selebihnya</a>';
				}
				?>
			</div>
			</center>
			
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
				for ($j=0; ($j < $rows) && ($j < $count) ; $j++) { 
					$result->data_seek($j);
					$row = $result->fetch_array(MYSQLI_ASSOC);
				?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default bayang">
						<div class="panel-body">
						   <h3><?php echo $row['judul']; ?></h3>
							<?php if (!($row['img_berita'] == "")) { ?>
						   <img src="../img/<?php echo $row['img_berita']; ?>" class="img-thumbnail img-responsive" style="margin-bottom: 10px;"><br>
							<?php } ?>
							<div>
						   <?php echo $row['konten']; ?>
							</div><br>
						   <h4 class="pull-left"><small>posted by <?php echo $row['user_id']; ?> pada <?php echo date( 'd M Y H:i', strtotime($row['waktu'])); ?></small></h4>
						   <div class="btn-group pull-right">
						   	<a href="../newsview.php?newsid=<?php echo $row['id_post']; ?>" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span> Lihat</a> 
						   	<a href="editnews.php?idpost=<?php echo $row['id_post']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a> 
						   <a href="controller/delberita.php?idpost=<?php echo $row['id_post']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
						   </div>
						</div>
					</div>
				</div>
				<?php
				}
				$result->close();
				$conn->close();
			 ?>

			 <!-- akhir tampilkan post -->
		</div>
		</div>
	</div>

		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<script type="text/javascript">
			$('#beritamenu').attr({class : 'active'})
		</script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>