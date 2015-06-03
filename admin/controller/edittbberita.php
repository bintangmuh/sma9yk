<?php 
	require '../../config.php';
	session_start();

// hanya admin yang boleh edit
	require '../allowedadmin.php';

	if(!isset($_POST['submit'])) {
		header("location: ../editnews.php");
	}
	else {
		$id = $_POST['idpost'];
		$judul = $_POST['judul'];
		$konten = $_POST['konten'];
	}

	if (!($_FILES['gambar']['name'] == "")) {
		require 'upload.php';
		$query = "UPDATE `$mydb`.`tb_berita` SET `judul` = '$judul', `konten` = '$konten', `img_berita` = '$img' WHERE `tb_berita`.`id_post` = $id;";
	} else {
		$query = "UPDATE `$mydb`.`tb_berita` SET `judul` = '$judul', `konten` = '$konten' WHERE `tb_berita`.`id_post` = $id;";
	}
	
	echo "$img";
	$prosesedit = $conn->query($query);
	if (!$prosesedit) {
		header("location: ../berita.php?err=2");
	}

	$conn->close();
	// redirect ke berita php dengan pesan 2
	header("location: ../berita.php?err=2");
 ?>