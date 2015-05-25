<?php require '../config.php'; 
//cek session
session_start();
require 'allowedadmin.php';
//querying agenda
$query="SELECT * FROM `tb_agenda`";
$agenda = $conn->query($query);
$rows = $agenda->num_rows;
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
	<?php require 'navbar.php'; ?>
	<div class="fluid">
		<?php require 'menu.php'; ?>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h3><span class="glyphicon glyphicon-home"></span> Beranda - Datang di Admin Page</h3>
			<hr>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<div class="bg-primary kotak">
				<h4>Waktu Hari Ini</h4>
				<span class="glyphicon glyphicon-calendar"></span> <strong>Tanggal : </strong><?php echo date('d M Y'); ?><br>
				<span class="glyphicon glyphicon-time"></span> <strong>Jam : </strong><?php echo date('h:i'); ?>
			</div>

			<!-- tabel agenda hari ini -->
			<h3>Agenda Hari Ini <span class="label label-primary"><?php echo "$rows"; ?></span></h3>
			<table class="table table-hover table-stripped">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Agenda</th>
						<th>Isi</th>
					</tr>
				</thead>
				<tbody>
				<!-- tampilkan jika tidak ada data -->
				<?php 
					if ($rows == 0) {
						echo '<tr><td colspan="5" class="text-center"> Tidak ada data sama sekali</td></tr>';
					} 
				?>
				<!-- Tampilkan data -->
				<?php 
					for ($i=0; $i < $rows; $i++) { 
						$agenda->data_seek($i);
						$row = $agenda->fetch_array(MYSQLI_ASSOC);
				 ?>
					<tr class="danger">
						<td><?php echo date("d M Y",strtotime($row['agendawkt'])); ?></td>
						<td><?php echo date("H:i",strtotime($row['agendawkt'])); ?></td>
						<td><?php echo $row['judul']; ?> </td>
						<td><?php echo $row['konten']; ?></td>
					</tr>
				<?php } 
				$agenda->close()
				?>
				</tbody>
			</table>
			<h3 class="text-center">Statistik</h3>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bayang">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3>Guru</h3>
					<hr>
					<p>Jumlah Staff Pengajar di <?php echo "$sekolah"; ?> yang terdaftar</p>
					<h1><span class="glyphicon glyphicon-stats"></span>  65 Pengajar</h1>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3>Siswa</h3>
					<hr>
					<p>Jumlah Siswa di <?php echo "$sekolah"; ?> yang terdaftar</p>
					<ul>
						<li>Kelas 10: <?php echo "100"; ?></li>
						<li>Kelas 11: <?php echo "200"; ?></li>
						<li>Kelas 12: <?php echo "160"; ?></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3>Sarana Prasarana</h3>
					<hr>
				</div>
			</div>
		</div>
	</div>
	<?php $conn->close(); ?>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<script type="text/javascript">
			$('#berandamenu').attr({class : 'active'})
		</script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>