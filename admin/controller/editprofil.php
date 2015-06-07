<?php 
	require '../../config.php';
	session_start();

	require '../allowedadmin.php';

	if (isset($_POST['visitrue'])) {
		$sql = "UPDATE `$mydb`.`tb_profil` SET `visimisi` = '".$_POST['visimisi']."' WHERE `tb_profil`.`id_profil` = 1;";

	} 
	if (isset($_POST['sejarahtrue'])) {
		$sql = "UPDATE `$mydb`.`tb_profil` SET `sejarah` = '".$_POST['sejarah']."' WHERE `tb_profil`.`id_profil` = 1;";
	}
	$process=$conn->query($sql);
	$conn->close();

	if (!$result) {
		header("location: ../setting.php?err=1");
	} else {
		header("location: ../setting.php?err=0");
	}
	
 ?>