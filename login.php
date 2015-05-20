<?php
require 'config.php';
session_start();
//cek session, jika sudah login akan diarahkan kemari
if(isset($_SESSION['user']) && isset($_SESSION['level'])) {
	if ($_SESSION['level'] == 1) {
			header("location: ./admin/");		
	}
	else {
			header("location: ./home.php");		
	}
}
//cek ada tidaknya 
if(isset($_POST['user']) && $_POST['pass']) {
	$uname = $_POST['user'];
	$upass = $_POST['pass'];

	$loginquery = "SELECT * FROM `tb_user` WHERE `user_id` = '$uname' AND `password`='$upass'";
	$hasillogin = $conn->query($loginquery);
	$ketemu = $hasillogin->num_rows;

	//jika data ditemukan
	if ($ketemu == 1) {
		$hasillogin->data_seek(0);
		$row = $hasillogin->fetch_array(MYSQLI_ASSOC);
		$_SESSION['user'] = $row['user_id'];
		$_SESSION['level'] = $row['level'];

		var_dump($_SESSION);

		if ($row['level'] == 1) {
			header("location: ./admin/");	
		}
		else if ($row['level'] == 1) {
			header("home.php");		
		}
	}
	//jika tidak
	else {
		$message = "Kesalahan Login! data tidak ada";
	}
}
//jika tidak ada data yang masuk melalui method post
else {
	$uname = "";
	$upass = "";
	$message = "Anda belum memasukan username dan password";
}
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login Page</title>

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
	<div class="fluid header">
	<h3 class="text-center">Halaman Login</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<div class="container">
	<?php if(isset($message)) { ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong><span class="glyphicon glyphicon-alert"></span> Oops.. </strong><?php echo "$message"; ?>
	</div>
	<?php } ?>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				Login
			</div>
			<div class="panel-body">
				<form action="login.php" method="POST" role="form">
				
					<div class="form-group">
						<label for="user">Username</label>
						<input type="text" name="user" class="form-control" id="user" placeholder="NIM atau username" value="<?php echo "$uname"; ?>">
					</div>
					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" name="pass" class="form-control" id="pass" placeholder="password" value="<?php echo "$upass"; ?>">
					</div>
				
					
				
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>		
	</div>

	</div>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
<?php
	$conn->close();
?>