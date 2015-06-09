<?php require '../config.php'; 
//cek session
session_start();
require 'allowedadmin.php';
//querying agenda
if(isset($_POST['changepass'])) {
	$newpass = $_POST['newpass'];
	$newpass2 = $_POST['newpass2'];
	$oldpass = $_POST['oldpass'];

	if ($newpass == $newpass2) {
		$sql = "UPDATE `$mydb`.`tb_user` SET `password` = '$newpass' WHERE `user_id` = '".$_SESSION['user']."' AND `password` = '$oldpass';";
		$proses = $conn->query($sql);
		if(!$proses) {
			$message = "Gagal Update";
		} else {
			$message = "Berhasil Mengganti Password";
		}
	}
}
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
		<br>
			<ol class="breadcrumb">
			  <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
			  <li><a href="user.php"><span class="glyphicon glyphicon-asteriks"></span> Ganti Password</a></li>
			</ol>

			<form action="user.php" method="POST" role="form">
				<legend>Ubah Password</legend>
				<div class="panel panel-default">
					<div class="panel-body">
					   User ID : <?php echo $_SESSION['user']; ?>
					</div>
				</div>
				<div class="form-group">
					<label for="oldpass">Password lama: </label>
					<input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="Password Lama">
				</div>

				<div class="form-group">
					<label for="newpass">Password Baru: </label>
					<input type="password" class="form-control" id="newpass" name="newpass" placeholder="Password Baru">
				</div>
				<div class="form-group">
					<label for="newpass2">Ulangi Password Baru: </label>
					<input type="password" class="form-control" id="newpass2" name="newpass2" placeholder="Ulangi Password Baru">
				</div>
			
				<input type="submit" name="changepass" value="Ganti Password" class="btn btn-primary"></input>
			</form>
		</div>
	</div>
	<?php $conn->close(); ?>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<script type="text/javascript">
			$('#useradmin').attr({class : 'active'});
		</script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>