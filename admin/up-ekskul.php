<?php 
	require "../config.php";
	session_start();

	//allowed admin
	require 'allowedadmin.php';

	if (isset($_POST['submit'])) {
		$id = $_POST['idekskul'];
		$nama = $_POST['ekskul'];
		$descrip = $_POST['desc'];
	}

	$sql = "UPDATE `$mydb`.`tb_ekskul` SET `nama_ekskul` = '$nama', `deskripsi` = '$descrip' WHERE `tb_ekskul`.`id_ekskul` = $id;";
	$process = $conn->query($sql);

	if(!$process) {
		header("location: ./ekskul.php?err=1");
	} else {
		header("location: ./ekskul.php?err=0");

	}
	$process->close();
	$conn->close();
 ?>