<?php
if(isset($_POST['user']) && $_POST['pass']) {
	$uname = $_POST['user'];
	$upass = $_POST['pass'];	
}
else {
	$uname = "";
	$upass ="";
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

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<h3 class="text-center">Halaman Login</h3>
	<div class="container">
	<?php if(isset($message)) { ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Oops..</strong><?php echo "$message"; ?>
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
						<input type="text" name="user" class="form-control" id="user" placeholder="Input field" value="<?php echo "$uname"; ?>">
					</div>
					<div class="form-group">
						<label for="pass">Username</label>
						<input type="password" name="pass" class="form-control" id="pass" placeholder="Input field" value="<?php echo "$upass"; ?>">
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