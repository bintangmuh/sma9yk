<?php require '../config.php'; 
//cek session
session_start();
require 'allowedadmin.php';
//querying agenda
$sql = "SELECT user_id FROM tb_user";
$admin = $conn->query($sql);

if (isset($_POST['tambahadmin'])) {
	$userid = $_POST['username'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	if ($pass1 == $pass2) {
		$sqlinput = "INSERT INTO `$mydb`.`tb_user` (`user_id`, `password`, `level`) VALUES ('$userid', '$pass1', '1');";
		$proses = $conn->query($sqlinput);
	}
}

if (isset($_GET['del'])) {
	$userid = $_GET['user'];
	$sqldel = "DELETE FROM `$mydb`.`tb_user` WHERE `tb_user`.`user_id` = '$userid'";
	$proses = $conn->query($sqldel);
	if (!$proses) {
		$message =  "gagal";	
	} else {
		$message = "berhasil menghapus admin";
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tambah Administrator - <?php echo "$sekolah"; ?></title>

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
			<br>
			<ol class="breadcrumb">
			  <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
			  <li><a href="addadmin.php.php"><span class="glyphicon glyphicon-king"></span> Tambah Admin</a></li>
			</ol>
			<div class="panel panel-default">
				<div class="panel-body">
				   <form action="addadmin.php" method="POST" role="form">
				   	<legend>Tambah Admin</legend>
				   
				   	<div class="form-group">
				   		<label for="username">Username</label>
				   		<input type="text" class="form-control" name="username" placeholder="Username">
				   	</div>
				   <hr>
				   <div class="form-group">
				   		<label for="username">Password</label>
				   		<input type="password" class="form-control" name="pass1" placeholder="Password">
				   	</div>

				   	<div class="form-group">
				   		<label for="username">Ulangi Password</label>
				   		<input type="password" class="form-control" name="pass2" placeholder="Ulangi Password">
				   	</div>

				   	<input type="submit" name="tambahadmin" class="btn btn-primary" value="Daftarkan Admin">
				   </form>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
				   <h3><span class="glyphicon glyphicon-king" aria-hidden="true"></span> Daftar Akun Admin</h3>
				   <table class="table table-hover table-striped">
				   	<thead>
				   		<tr>
				   			<th>Username</th>
				   			<th>Action</th>
				   		</tr>
				   	</thead>
				   	<tbody>
				   		
				   		<?php for ($index=0; $index < $admin->num_rows ; $index++) { 
				   				$admin->data_seek($index);
				   				$adminlist = $admin->fetch_array(MYSQLI_ASSOC);

				   		?>
				   		<tr>
				   			<td><?php echo $adminlist['user_id']; ?></td>
				   			<td><a href="addadmin.php?del=true&user=<?php echo $adminlist['user_id'];; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></td>
				   		</tr>
				   		<?php } ?>
				   		
				   	</tbody>
				   </table>
				</div>
			</div>
		</div>
	</div>
	<?php $conn->close(); ?>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<script type="text/javascript">
			$('#addmin').attr({class : 'active'});
		</script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>