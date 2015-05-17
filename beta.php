<?php
	require 'config.php';
	$sql = "SELECT * FROM tb_user";
	$result = $conn->query($sql);
    echo "<table border=1><tr><th>ID</th><th>Name</th><th>Level</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["user_id"]."</td><td>".$row["password"]."</td><td>".$row["level"]."</td></tr>";
    }
    echo "</table>";
$conn->close();
?>