<?php 
session_start();

require '../config.php';
require 'allowedadmin.php';
$user = $_SESSION['user'];
$AgendaName = $_POST['judul'];
$konten = $_POST['content'];
$date = $_POST['date'];
$hour = $_POST['hour'];
$minute = $_POST['minute'];
$sqlDate = date('Y-m-d H:i:s');
$sql = "INSERT INTO `$mydb`.`tb_agenda` (`user_id`, `id_agenda`, `judul`, `agendawkt`, `konten`, `waktu`) VALUES ('$user', NULL, '$AgendaName', '$date $hour:$minute:00', '$konten', '$sqlDate'); ";
$result = $conn->query($sql);
if (!$result) {
	header("location: ./agenda.php?err=1");
}
else {
	header("location: ./agenda.php?err=0");
}
echo "coba check db -->$sqlDate";
$conn->close();
 ?>