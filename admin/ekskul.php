<?php require '../config.php'; 
	session_start();
	require 'allowedadmin.php'	;
	$sql = "SELECT * FROM `tb_ekskul`";
	$result = $conn->query($sql);
	$rows = $result->num_rows;

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Halaman Ekstrakurikuler - <?php echo "$sekolah"; ?></title>

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
	<!-- load navbar -->
	<?php require 'navbar.php'; ?>
	<div class="fluid">
		
		<?php require 'menu.php'; ?>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 content-admin">
			<!--pagination menu-->
			<ol class="breadcrumb">
			  <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
			  <li><a href="ekskul.php"><span class="glyphicon glyphicon-knight"></span> Ekstrakurikuler</a></li>
			</ol>
			<!--Content Guru-->
			<h3><span class="glyphicon glyphicon-knight"></span> Ekstrakurikuler - <?php echo "$sekolah"; ?></h3>
			<hr>
			<p>Ekstrakurikuler yang disediakan oleh sekolah:</p>
			<!-- alert -->
			<!--alert warning-->
			<?php if(isset($_GET['err']) &&  ($_GET['err'] == 1)) {?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Gagal</strong> Ada sebuah kesalahan
			</div>
			<?php } ?>

			<!-- alert sukses posting -->
			<?php if(isset($_GET['err']) && ($_GET['err'] == 0)) {?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Ekstrakurikuler Sudah Berhasil dipublikasi</strong> Silahkan cek postingan!
			</div>
			<?php } ?>

			<!-- end of alert -->

			<!--table ekskul-->
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Ekstrakurikuler</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<!-- Perulangan list ekstra kurikuler -->
				<?php 
					if ($rows == 0) {
						echo '<tr><td colspan="3" class="text-center"> Tidak ada data sama sekali</td></tr>';
					} 
				?>
				<!-- Tampilkan data -->
				<?php 
					for ($i=0; $i < $rows; $i++) { 
						$result->data_seek($i);
						$row = $result->fetch_array(MYSQLI_ASSOC);
				 ?>
					<tr class="info">
						<td><?php echo ($i+1) ?></td>
						<td><?php echo $row['nama_ekskul'] ?></td>
						<td>
							<div class="btn-group">
								<a href="editekskul.php?id=<?php echo $row['id_ekskul']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="controller/delekskul.php?id=<?php echo $row['id_ekskul']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="3">
						<b>Deskripsi</b><br>
						<?php 
						if(!($row['image'] == "")) {
							 echo '<img src="../img/'.$row['image'].'" alt="'.$row['nama_ekskul'].'" class="img-thumbnail" height=200px width=200px style="float: left; margin-right: 5px;">';
						} 
						 echo $row['deskripsi']; ?>
						</td>
					</tr>
				<?php } ?>
				<!-- akhir perulangan -->
				</tbody>
			<!-- akhir tb_ekskul -->
			</table>
			<!-- toogle form -->
				<a class="btn btn-success"  data-toggle="collapse" href="#tambahekskul" aria-expanded="false" aria-controls="tambahekskul"><span class="glyphicon glyphicon-plus"></span> Tambah Ekstrakurikuler</a>

				<!-- view form -->
				<div class="collapse" id="tambahekskul">
				  <form action="controller/addekskul.php" method="POST" role="form" enctype="multipart/form-data">
				  	<legend>Tambah Ekstrakurikuler</legend>
				  
				  	<div class="form-group">
				  		<label for="name">Nama Ekstrakurikuler</label>
				  		<input type="text" name="ekskul" class="form-control" id="name" placeholder="Nama Ekstrakurikuler">
				  	</div>
				  	<div class="form-group">
				  		<input type="file" name="gambar" id="gambar">
				  	</div>
				  	<div class="form-group">
				  		<label for="desk">Deskripsi</label>
				  		<textarea type="text" name="desc" class="form-control" id="desk" placeholder="Deskripsi Ekstrakurikuler" rows="15"></textarea>
				  	</div>
				  	<button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Submit</button>
				  </form>
				</div>
			    </div>
			  </div>
		</div>
	</div>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>

		<!-- Bootstrap JavaScript -->
		<script type="text/javascript">
			$('#ekskulmenu').attr({class : 'active'})
		</script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
	<?php $conn->close(); ?>
</html>