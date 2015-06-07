<?php
$servername = "localhost";
$username = "root";
$password = "";
$mydb = "websekolah"; //nama database

//sekolah
$sekolah="SMP Negeri 5 Depok";
$alamat="Sleman, Daerah Istimewa Yogyakarta";
$telepon="+62845663";
// Create connection
$conn = new mysqli($servername, $username, $password, $mydb);
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}
?>