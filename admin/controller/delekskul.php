<?php 
	require "../../config.php";
	session_start();

	//allowed admin
	require '../allowedadmin.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM `$mydb`.`tb_ekskul` WHERE `tb_ekskul`.`id_ekskul` = $id;";
		$process = $conn->query($sql);

		if(!$process) {
			$conn->close();
			header("location: ../ekskul.php?err=1");
		} else {
			$conn->close();
			header("location: ../ekskul.php?err=0");
		}
	}
	else {
		$conn->close();
		header("location: ../ekskul.php?err=1");	
	}

 ?>