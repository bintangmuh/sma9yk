<?php 
	require '../config.php';
	session_start();

	// allowed admin only
	require 'allowedadmin.php';
	if (isset($_POST['submit'])) {
		$nama = $_POST['ekskul'];
		$descrip = $_POST['desc'];
	}

	$sql = "INSERT INTO `$mydb`.`tb_ekskul` (`id_ekskul`, `nama_ekskul`, `deskripsi`, `image`) VALUES (NULL, '$nama', '$descrip', '');";
	$process = $conn->query($sql);

	if(!$process) {
		header("location: ./ekskul.php?err=1");
	} else {
		header("location: ./ekskul.php?err=0");

	}
	$process->close();
	$conn->close();
 ?>