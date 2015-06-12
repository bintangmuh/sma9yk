<?php 
	require 'config.php';

	$sql1="SELECT * FROM `tb_prestasi` ORDER BY `tb_prestasi`.`tahun` DESC";
	$prestasi = $conn->query($sql1);
	$jumlahprestasi = $prestasi->num_rows;
	$conn->close();
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Prestasi <?php echo "$sekolah"; ?></title>

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
				<h1>Prestasi - <?php echo "$sekolah"; ?></h1>
				<p><?php echo $alamat ?></p>
				<a href="virtualtour.php" class="btn btn-success">Virtual Tour</a>
				
			</div>
			</div>
		</div>
		
		<div class="container bayang ">
			<img src="img/logo.png" width="80px" class="img-clip">
			<h3>Prestasi</h3>
			    Daftar prestasi yang diraih <?php echo "$sekolah"; ?>
			    <table class="table table-striped table-hover">
			    	<thead>
			    		<tr>
			    			<th>Prestasi</th>
			    			<th>Nama</th>
			    			<th>Tingkat</th>
			    			<th>Tahun</th>
			    		</tr>
			    	</thead>
			    	<tbody>
			    	<?php if($jumlahprestasi == 0) { ?>
			    		<tr>
			    			<td colspan="4" class="text-center">Tidak Ada Prestasi</td>
			    		</tr>
			    	<?php } else {
			    		for ($rowprestasi=0; $rowprestasi < $jumlahprestasi; $rowprestasi++) { 
			    				$prestasi->data_seek($rowprestasi);
			    				$row = $prestasi->fetch_array(MYSQLI_ASSOC);
			    	?>
			    		<tr>
			    			<td><?php echo $row['prestasi']; ?></td>
			    			<td><?php echo $row['nama_peserta']; ?></td>
			    			<td><?php echo $row['tingkat']; ?></td>
			    			<td><?php echo $row['tahun']; ?></td>
			    		</tr>
			    	<?php	
			    		}
			    	} 
			    	?>
			    	</tbody>
			    </table>
		</div>

<?php include 'footer.php'; ?>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>