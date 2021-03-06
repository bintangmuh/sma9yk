<?php require '../config.php'; 
	session_start();
	require 'allowedadmin.php';
	$query="SELECT * FROM `tb_agenda` ORDER BY `tb_agenda`.`agendawkt` ASC ";
	$agenda = $conn->query($query);

	$rows = $agenda->num_rows;

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Agenda - <?php echo "$sekolah"; ?></title>

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
			<!--pagination menu-->
			<ol class="breadcrumb">
			  <li><a href="index.php" ><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
			  <li><a href="agenda.php" ><span class="glyphicon glyphicon-calendar"></span> Agenda</a></li>
			</ol>
			<!--Content Guru-->
			<h3><span class="glyphicon glyphicon-user"></span> Agenda <?php echo "$sekolah"; ?></h3>
			<hr>
			<p>Agenda yang akan diadakan oleh <?php echo "$sekolah"; ?></p>

			<!-- alert Delete berhasil -->
			<?php if (isset($_GET['err']) && ($_GET['err'] == 3)) {
				?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Agenda Sudah Berhasil di hapus</strong> Agenda yang telah dihapus tidak akan kembali
			</div>
			<?php
			} ?>
			<!-- akhir alert delete -->

			<!--table Agenda-->
			<table class="table table-hover table-stripped">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Agenda</th>
						<th>Isi</th>
						<th>Action</th>
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
					<tr>
						<td><?php echo date("d M Y",strtotime($row['agendawkt'])); ?></td>
						<td><?php echo date("H:i",strtotime($row['agendawkt'])); ?></td>
						<td><?php echo $row['judul']; ?> </td>
						<td><?php echo $row['konten']; ?></td>
						<td><a href="controller/delagenda.php?idpost=<?php echo $row['id_agenda']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<a href="addagenda.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Agenda</a> 
		</div>
	</div>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<!-- ative menu -->
		<script type="text/javascript">
			$('#agendamenubar').attr({class : 'active'})
		</script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
	<?php $conn->close(); ?>
</html>	