<?php require '../config.php'; 
	session_start();
	require 'allowedadmin.php'	;
	if (!isset($_GET['id'])) {
		header('location: ./ekskul.php?err=4');
	}
	else {
		$id = $_GET['id'];
		$sql = "SELECT * FROM `tb_ekskul` WHERE id_ekskul=$id";
		$result = $conn->query($sql);

		//jika ada kesalahan
		if(!$result || $result->num_rows == 0) {
			header('location: ./ekskul.php?err=4');
		}

		$rows = $result->num_rows;
		$result->data_seek(0);
		$row = $result->fetch_array(MYSQLI_ASSOC);
	}

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

		<!-- TinyMCE  -->
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
			  <li><a href="editekskul.php?id=<?php echo "$id"; ?>"><span class="glyphicon glyphicon-knight"></span>Edit Ekstrakurikuler</a></li>
			</ol>
			<!--Content Guru-->
			<h3><span class="glyphicon glyphicon-knight"></span> <?php echo $row['nama_ekskul']; ?> - Ekstrakurikuler - <?php echo "$sekolah"; ?></h3>
			<hr>
			
				<!-- view form -->
				  <form action="controller/up-ekskul.php" method="POST" role="form" enctype="multipart/form-data" >
				  	<input type="hidden" name="idekskul" value="<?php echo "$id"; ?>">
				  	<div class="form-group">
				  		<label for="name">Nama Ekstrakurikuler</label>
				  		<input type="text" name="ekskul" class="form-control" id="name" value="<?php echo $row['nama_ekskul']; ?>" placeholder="Nama Ekstrakurikuler">
				  	</div>
				  	<div class="panel panel-default">
				  		<div class="panel-body">
				  			<?php 
				  				if($row['image'] == "") {
				  					echo "Tidak ada gambar";
				  				} else {
				  					echo '<img class="img-responsive" src="../img/'.$row['image'].'">';
				  				}
				  			 ?>
				  		</div>
				  		<div class="panel-footer">
				  		   <div class="form-group">
						  		<label><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> form upload gambar</label>
						  		<input type="file" name="gambar" id="gambar">
				  			</div>
				  		</div>
				  	</div>
				  	<div class="form-group">
				  		<label for="desk">Deskripsi</label>
				  		<textarea type="text" name="desc" class="form-control" id="desk" placeholder="Deskripsi Ekstrakurikuler" rows="15"><?php echo $row['deskripsi']; ?></textarea>
				  	</div>				  	 
				  	<button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Submit</button>
				  </form>
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
	<?php 
		$result->close();
		$conn->close(); 
	?>
</html>