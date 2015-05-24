<?php 
	require '../config.php';
	session_start();

// hanya admin yang boleh edit
	require 'allowedadmin.php';

	if(!isset($_GET['idpost'])) {
		header("location: ./agenda.php");
	}
	else {
		$id = $_GET['idpost'];
	}
	$query = "DELETE FROM `$mydb`.`tb_agenda` WHERE `tb_agenda`.`id_agenda` = $id";
	$proseshapus = $conn->query($query);
	if (!$proseshapus) {
		echo "there is problem";
	}

	$conn->close();
	// redirect ke berita php dengan pesan 2
	header("location: ./agenda.php?err=3");
 ?>