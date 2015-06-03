<?php 
	require '../config.php';
	session_start();
	require "allowedadmin.php";

	if (isset($_POST['submit'])) {
		$nama = $_POST['nama'];
		$tingkat = $_POST['tingkat'];
		$tahun = $_POST['tahun'];
		$prestasitext = $_POST['prestasi'];
		// queryimg  add prestasi
		$sql = "INSERT INTO `$mydb`.`tb_prestasi` (`id_prestasi`, `nama_peserta`, `tingkat`, `tahun`, `prestasi`) VALUES (NULL, '$nama', '$tingkat', '$tahun', '$prestasitext');";
		$add = $conn->query($sql);
		if (!$add) {
			$err = 1;
		}
		else {
			$err = 0;
		}
	} else {
		$err = 1;
	}

	$conn->close();

	// redirect
	header("location: ./setting.php?err=$err");
 ?>