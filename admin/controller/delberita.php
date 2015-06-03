<?php 
	require '../../config.php';
	session_start();

// hanya admin yang boleh edit
	require '../allowedadmin.php';

	if(!isset($_GET['idpost'])) {
		header("location: ../berita.php");
	}
	else {
		$id = $_GET['idpost'];
	}
	$query = "DELETE FROM `$mydb`.`tb_berita` WHERE `tb_berita`.`id_post` = $id";
	$proseshapus = $conn->query($query);
	if (!$proseshapus) {
		echo "there is problem";
	}

	$conn->close();
	// redirect ke berita php dengan pesan 2
	header("location: ../berita.php?err=3");
 ?>