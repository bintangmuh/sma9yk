<?php 
	require '../config.php';
	session_start();
	require 'allowedadmin.php';

	if(!isset($_GET['id'])) {
		echo "iset";
		header("location: ./setting.php?err=1");
	} else {
		$id =  $_GET['id'];
		echo "id";
		$sql = "DELETE FROM `$mydb`.`tb_prestasi` WHERE `tb_prestasi`.`id_prestasi` = $id";
		$delete = $conn->query($sql);
		$conn->close();
		header("location: ./setting.php?err=0");
	}
 ?>