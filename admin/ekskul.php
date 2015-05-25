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
			<h3><span class="glyphicon glyphicon-knight"></span> EKstrakurikuler <?php echo "$sekolah"; ?></h3>
			<hr>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<!--table ekskul-->
			<table class="table table-hover table-striped">
				<thead>
					<tr>
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
					<tr>
						<td><?php echo $row['nama_ekskul'] ?></td>
						<td>
							<div class="btn-group">
								<a href="editekskul.php?id=<?php echo $row['id_ekskul']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a> <a href="delekskul.php?idpost=<?php echo $row['id_ekskul']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
							</div>
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
				  <form action="addekskul.php" method="POST" role="form">
				  	<legend>Tambah Ekstrakurikuler</legend>
				  
				  	<div class="form-group">
				  		<label for="">Nama Ekstrakurikuler</label>
				  		<input type="text" class="form-control" id="" placeholder="Prestasi">
				  	</div>
				  	<div class="form-group">
				  		<label for="">Deskripsi</label>
				  		<textarea type="text" class="form-control" id="" placeholder="Peserta"></textarea>
				  	</div>
				  	<div class="form-group">
				  		<label for="">Tingkat</label>
				  		<input type="text" class="form-control" id="" placeholder="Tingkat">
				  	</div>
				  	 
				  	<br>
				  	<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Submit</button>
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
			$('#ekskul').attr({class : 'active'})
		</script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
	<?php $conn->close(); ?>
</html>