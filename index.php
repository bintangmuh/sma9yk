<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SMA Negeri 9 Yogyakarta</title>

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<div class="fluid header">
			<div class="col-md-push-6 col-lg-push-6 col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<h1><?php echo "$sekolah" ?></h1>
				<?php echo "$alamat "; ?><span class="glyphicon glyphicon-phone-alt"> </span> <?php echo "$telepon"; ?> <br>
				 <br>
				<a href="#" class="btn btn-primary" title="">Ikuti Tour</a>
			</div>	
		</div>
		<div class="container">
		<!--Agenda Sekolah panel-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><span class="glyphicon glyphicon-Calendar"></span> Agenda</h3>
				</div>
				<div class="panel-body">
				  PHP goes Here.. <br>
				  	<div class="media">
					  <div class="media-left">
					    <a href="#">
					      <img class="media-object" src="">
					    </a>
					  </div>
					 
					</div>
					<hr>
				  <a href="#" title="">Lihat Post ></a>
				</div>
			</div>
		</div>
		<!--News panel-->
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><span class="glyphicon glyphicon-blackboard"></span> Berita Terbaru</h3>
				</div>
				<div class="panel-body">
				  PHP goes Here.. <br>
				  	<div class="media">
					  <div class="media-left">
					    <a href="#">
					      <img class="media-object" src="">
					    </a>
					  </div>
					  <div class="media-body">
					    <h4 class="media-heading">Media heading</h4>
					    <small>Senin, 17 April 2015</small>
					    <small>| Dipost oleh: <a href="" title="">admin</a></small>
					    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					  </div>
					</div>
					<hr>
				  <a href="#" title="">Lihat Post ></a>
				</div>
			</div>
		</div>
		<!--login panel-->
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-user"></span> Login
				</div>
				<div class="panel-body">
				   <form action="login.php" method="POST" role="form">		   
				   	<div class="form-group">
				   		<label for="user">Username</label>
				   		<input type="text" name="user" class="form-control" id="user" placeholder="NIM atau NIP">
				   	</div>
				   	<div class="form-group">
				   		<label for="pass">Password</label>
				   		<input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
				   	</div>
				   	<button type="submit" class="btn btn-primary">Submit</button>
				   </form>
				</div>
				<div class="panel-footer">
					Belum punya akun <a href="signup.php" title="">Silahkan Daftar!</a>
				</div>
			</div>
		</div>		
		</div>
		<div class="fluid">
			<p class="text-center">Copyright SMA Negeri 9 yogyakarta 2015</p>
		</div>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>