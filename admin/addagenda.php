<?php require '../config.php'; 
session_start();
require 'allowedadmin.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tambah Agenda- <?php echo "$sekolah"; ?></title>

		<!-- Bootstrap CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<!-- jquery UI css -->
		<link href="../css/jquery-ui.min.css" rel="stylesheet">
		<style>
			.ui-datepicker-month, .ui-datepicker-year {
				color: #000;
			}
		</style>
		<link href="style.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<!-- loading navigasi -->
	<?php require 'navbar.php'; ?>
	<div class="fluid">
		
		<?php require 'menu.php'; ?>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 content-admin">
			<!--pagination menu-->
			<ol class="breadcrumb">
			  <li><a href="index.php" ><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
			  <li><a href="agenda.php" ><span class="glyphicon glyphicon-calendar"></span> Agenda</a></li>
			  <li><a href="addagenda.php" > Tambah Agenda</a></li>
			</ol>
			<!--Content Guru-->
			<h3><span class="glyphicon glyphicon-user"></span>Tambah Agenda <?php echo "$sekolah"; ?></h3>
			<hr>
			<form action="controller/submitagenda.php" method="POST" role="form">
				
				<div class="form-group">
					<label for="judul">Nama Agenda : </label>
					<input type="text" class="form-control" name="judul" id="judul" placeholder="Nama Agenda">
				</div>
				<div class="form-group">
					<label for="content">Isi : </label>
					<textarea id="content" class="form-control" rows=10 name="content"></textarea>
				</div>
				<div class="form-inline">
				<div class="form-group">
					<label for="date"><span class="glyphicon glyphicon-calendar"></span> Tanggal Diadakan : </label>
					<input class="form-control" type="date" name="date" id="datepicker" placeholder="Tanggal">
				</div>
				
				<div class="form-group">
					<label for="jam"><span class="glyphicon glyphicon-time"></span> Jam : </label>
					<select name="hour" class="form-control">
					
					<?php 
						for ($j=0; $j < 25 ; $j++) { 
							echo "<option value=".$j.">".$j."</option>";
						}
					 ?>
					 </select> : 

					 <select name="minute" class="form-control">
					
					<?php 
						for ($m=0; $m < 60 ; $m++) { 
							echo "<option value=".$m.">".$m."</option>";
						}
					 ?>
					 </select>
				</div>
				</div>
				<button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Terbitkan</button>
				</form>
			
			</form>
		</div>
	</div>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<!-- jquery UI -->
		<script src="../js/jquery-ui.min.js"></script>
		<script>
		  $(function() {
		    $( "#datepicker" ).datepicker({
			      changeMonth: true,		     
			      changeYear: true		     
			    });
		    $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		
		  });
		</script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
		<?php $conn->close(); ?>
	</body>
</html>