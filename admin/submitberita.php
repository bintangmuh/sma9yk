<?php 
session_start();

require '../config.php';

$user = $_SESSION['user'];
$judul = $_POST['judul'];
$konten = $_POST['konten'];
$sqlDate = date('Y-m-d H:i:s');
$sql = "INSERT INTO `websekolah`.`tb_berita` (`user_id`, `judul`, `konten`, `waktu`) VALUES ('$user', '$judul', '$konten', '$sqlDate');";
$result = $conn->query($sql);
if (!$result) {
	header("location: ./berita.php?err=1");
}
else {
	header("location: ./berita.php?err=0");
}
echo "coba check db -->$sqlDate";
$conn->close();
 ?>