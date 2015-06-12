<?php 
	require 'config.php';
	$sql="SELECT * FROM `tb_berita` ORDER BY `tb_berita`.`waktu` DESC";
	$sql2="SELECT * FROM `tb_profil`";

	$today = date('Y-m-d');
	$sqlagenda = "SELECT * FROM `tb_agenda` WHERE `agendawkt` >= '$today 00:00:00' ORDER BY `agendawkt` ASC";

	// querying berita
	$result = $conn->query($sql);

	// visimisi dan sejarah
	$result2= $conn->query($sql2);
	$result2->data_seek(0);
	$profil = $result2->fetch_array(MYSQLI_ASSOC);

	// berita
	$rows = $result->num_rows;

	// agenda
	$agenda = $conn->query($sqlagenda);

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo "$sekolah"; ?></title>

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
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 hidden-xs">
				<img src="img/logo.png" class="img-responsive">
			</div>
			<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
				<h1><?php echo "$sekolah"; ?></h1>
				<p><?php echo $alamat ?></p>
				<a href="virtualtour.php" class="btn btn-success">Virtual Tour</a>
				
			</div>
			</div>
		</div>
		<div class="fluid">
			<div id="gallery" class="carousel slide" data-ride="carousel">
			    <ol class="carousel-indicators">
			        <li data-target="#gallery" data-slide-to="0" class=""></li>
			        <li data-target="#gallery" data-slide-to="1" class=""></li>
			        <li data-target="#gallery" data-slide-to="2" class="active"></li>
			    </ol>
			    <div class="carousel-inner">
			        <div class="item active">
			            <div class="slider-image" style="background-image: url(img/slider1.jpg); ">
			            	
			            </div>
			        </div>
			        <div class="item">
			            <div class="slider-image" style="background-image: url(img/slider2.jpg); ">
			            	
			            </div>
			        </div>
			        <div class="item">
			            <div class="slider-image" style="background-image: url(img/slider3.jpg); ">
			            	
			            </div>
			        </div>

			        
			    </div>
			    <a class="left carousel-control" href="#gallery" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			    <a class="right carousel-control" href="#gallery" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
		<div class="fluid header" style="margin-top: -10px;">
			<div class="container">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h3>Visi Misi</h3>
					<div class="profil"><?php echo $profil['visimisi'] ?></div>
					<a href="visimisi.php" class="btn btn-success" style="margin-top: 10px;"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Visi Misi ></a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h3>Sejarah</h3>
					<div class="profil"><?php echo $profil['sejarah'] ?></div>
					<a href="sejarah.php" class="btn btn-success" style="margin-top: 10px;"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Sejarah Sekolah ></a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			 <div class="panel panel-default">
				 <div class="panel-heading">
				 	<h3><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Berita Terbaru</h3>
				 </div>
			 	<div class="panel-body">
					<?php for ($inbrita=0; $inbrita < 3 ; $inbrita++) { 
						$result->data_seek($inbrita);
						$row = $result->fetch_array(MYSQLI_ASSOC);
					?>
					<div class="media">
					  <div class="media-left">
					    <a href="#">
					      <img class="media-object" src="img/<?php echo $row['img_berita']; ?>" width="100px">
					    </a>
					  </div>
					  <div class="media-body">
					    <h4 class="media-heading"><?php echo $row['judul'] ?></h4>
					    <h4><small>Dipublikasikan oleh <?php echo $row['user_id']; ?> pada <?php echo date( 'd M Y H:i', strtotime($row['waktu'])); ?></small></h4><br>
					    <div style="max-height: 100px; overflow:hidden; margin-bottom: 2px;">
					    	<?php echo $row['konten']; ?>
					    </div>
					    <a href="newsview.php?newsid=<?php echo $row['id_post']; ?>" class="btn btn-primary">Lihat Selengkapnya ></a><br>
					  </div>
					</div>
					<hr>			
					<?php } ?>
				</div>
			 	<div class="panel-footer">
			 		<a href="news.php">Berita Lainnya</a>
			 	</div>
			 </div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Agenda Hari Ini</strong>				
					</div>
					<div class="panel-body">
						<?php if ($agenda->num_rows == 0) {
							echo "Tidak ada agenda mendatang";
						} ?>
					   <?php for ($i=0; $i < $agenda->num_rows; $i++) { 
					   		$agenda->data_seek($i);
					   		$agendasatuan = $agenda->fetch_array(MYSQLI_ASSOC);
					   	?>
					   	<div class="fluid agenda-index">
					   	<h3><?php echo $agendasatuan['judul']; ?></h3>
						<h4><?php echo date("d M Y",strtotime($agendasatuan['agendawkt'])); ?></h4>
						<p><?php echo date("H:i",strtotime($agendasatuan['agendawkt'])); ?></p>
						<p><?php echo $agendasatuan['konten']; ?></p>
					   	</div>
					   <?php } ?>
					</div>
					<div class="panel-footer">
						<a href="agenda.php">Agenda lainnya</a>
					</div>
				</div>
			</div>
		</div>

<?php include 'footer.php'; ?>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>