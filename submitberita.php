<?php 
require 'config.php';
$user = $_POST['user'];
$judul = $_POST['judul'];
$konten = $_POST['konten'];
$sqlDate = date('Y-m-d H:i:s');
$sql = "INSERT INTO `websekolah`.`tb_berita` (`user_id`, `judul`, `konten`, `waktu`) VALUES ('$user', '$judul', '$konten', '$sqlDate');";
$result = $conn->query($sql);
echo "coba check db -->$sqlDate";
$conn->close();
 ?>