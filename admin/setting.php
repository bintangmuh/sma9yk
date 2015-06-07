<?php require '../config.php'; 
	session_start();
	require 'allowedadmin.php'	;
	$sql1="SELECT * FROM `tb_prestasi`";
	$sql2="SELECT * FROM `tb_profil`";
	$prestasi = $conn->query($sql1);
	$profil = $conn->query($sql2);
	$profil->data_seek(0);
	$kontenprofil= $profil->fetch_array(MYSQLI_ASSOC);
	$jumlahprestasi = $prestasi->num_rows;

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Halaman Pengaturan Profil - <?php echo "$sekolah"; ?></title>

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
			  <li><a href="setting.php"><span class="glyphicon glyphicon-wrench"></span> Pengaturan</a></li>
			</ol>
			<!--Content pengaturan-->
			<h3><span class="glyphicon glyphicon-wrench"></span> Pengaturan Profil <?php echo "$sekolah"; ?></h3>
			<hr>
			<p>Pengaturan konten profil pada website <?php echo "$sekolah"; ?></p>
			<p>ada input data sebagai berikut</p>
			<ul>
				<li>visi misi</li>
				<li>sejarah</li>
				<li>Prestasi</li>
			</ul>
			<!-- alert  -->
			<?php if(isset($_GET['err']) && ($_GET['err'] == 0)) {?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Berhasil</strong> Mengolah data
			</div>
			<?php } ?>
			<div role="tabpanel">

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#visi" aria-controls="visi" role="tab" data-toggle="tab">Visi Misi</a></li>
			    <li role="presentation"><a href="#sejarah" aria-controls="sejarah" role="tab" data-toggle="tab">Sejarah</a></li>
			    <li role="presentation"><a href="#prestasi" aria-controls="prestasi" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-certificate"></span> Prestasi <span class="label label-primary"><?php echo "$jumlahprestasi"; ?></span></a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="visi">
			    <h3>Visi Misi</h3>
			    <div class="fluid"><?php echo $kontenprofil['visimisi']; ?></div>
			    <!-- form edit -->
			    <form action="controller/editprofil.php" method="POST" role="form"> 
			    	<div class="form-group">
			    	<h4>Edit: </h4>
			    		<textarea name="visimisi" class="form-control" rows=10><?php echo $kontenprofil['visimisi']; ?></textarea>
			    	</div>
			    	<button type="submit" name="visitrue" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Simpan</button>
			    </form>
			    </div>

			    <!-- tab sejarah -->
			    <div role="tabpanel" class="tab-pane" id="sejarah">
			    <h3>Sejarah <?php echo "$sekolah"; ?></h3>
			     <div><?php echo $kontenprofil['sejarah']; ?></div>
			    <form action="controller/editprofil.php" method="POST" role="form"> 
			    	<div class="form-group">
			    		<label>Sejarah</label>
			    		<textarea name="sejarah" class="form-control" rows=10><?php echo $kontenprofil['sejarah']; ?></textarea>
			    	</div>
			    	<button type="submit" name="sejarahtrue" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Simpan</button>
			    </form>
			    </div>

			    <!-- tab prestasi -->
			    <div role="tabpanel" class="tab-pane" id="prestasi">
			    <h3>Prestasi</h3>
			    Daftar prestasi yang diraih <?php echo "$sekolah"; ?>
			    <table class="table table-striped table-hover">
			    	<thead>
			    		<tr>
			    			<th>Prestasi</th>
			    			<th>Nama</th>
			    			<th>Tingkat</th>
			    			<th>Tahun</th>
			    			<th>Action</th>
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
			    			<td><a class="btn btn-danger" href="delprestasi.php?id=<?php echo $row['id_prestasi']; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
			    		</tr>
			    	<?php	
			    		}
			    	} 
			    	?>
			    	</tbody>
			    </table>
			    <!-- toogle form -->
				<a class="btn btn-success"  data-toggle="collapse" href="#formprestasi" aria-expanded="false" aria-controls="formprestasi"><span class="glyphicon glyphicon-plus"></span> Tambah Prestasi</a>

				<!-- view form -->
				<div class="collapse" id="formprestasi">
				  <form action="submitprestasi.php" method="POST" role="form">
				  	<legend>Tambah Prestasi</legend>
				  
				  	<div class="form-group">
				  		<label>Prestasi yang diraih</label>
				  		<input type="text" name="prestasi" class="form-control" placeholder="Prestasi" required>
				  	</div>
				  	<div class="form-group">
				  		<label for="">Nama Pemenang</label>
				  		<input type="text" name="nama" class="form-control" id="" placeholder="Peserta" required>
				  	</div>
				  	<div class="form-group">
				  		<label for="">Tingkat</label>
				  		<input type="text" name="tingkat" class="form-control" id="" placeholder="Tingkat" required>
				  	</div>
				  	<div class="form-inline">
				  		<label for="">Tahun: </label>
				  		<select name="tahun" class="form-control">
				  		<option value="">--Pilih Tahun--</option>}
				  		option
				  		<?php for ($year=1945; $year <= date('Y') ; $year++) { 
				  			echo "<option value=".$year.">$year</option>";
				  		} ?>
				  		</select>
				  	</div>  
				  	<br>
				  	<button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Submit</button>
				  </form>
				</div>
			    </div>
			  </div>

			</div>
			
		</div>
	</div>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script type="text/javascript">
			$('#pengaturanmenu').attr({class : 'active'})
		</script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
	<?php 
	$prestasi->close();
	$conn->close(); ?>
</html>