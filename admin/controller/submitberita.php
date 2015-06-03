<?php 
session_start();

require '../../config.php';
require '../allowedadmin.php';
$user = $_SESSION['user'];
$judul = $_POST['judul'];
$konten = $_POST['konten'];
$sqlDate = date('Y-m-d H:i:s');

if (!($_FILES['gambar']['name'] == "")) {
		require 'upload.php';
	} else {
		$img = "";
	}
$sql = "INSERT INTO `$mydb`.`tb_berita` (`user_id`, `judul`, `konten`, `waktu`, `img_berita`) VALUES ('$user', '$judul', '$konten', '$sqlDate', '$img');";
$result = $conn->query($sql);
if (!$result) {
	$conn->close();
	header("location: ../berita.php?err=1");
}
else {
	$conn->close();
	header("location: ../berita.php?err=0");
}
echo "coba check db -->$sqlDate";
 ?>