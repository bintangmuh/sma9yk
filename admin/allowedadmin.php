<?php 
	if(!(isset($_SESSION['user']) && isset($_SESSION['level']))) {
		header("location: ../login.php");
	}
	else {
		if ($_SESSION['level'] != 1) {
			header("location: ../home.php");
		}
	}

 ?>