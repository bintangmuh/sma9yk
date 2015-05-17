<?php 
/**
* 
*/
require 'config.php';

class Database
{
	public $conn;
	function __construct()
	{
		$conn = new mysqli($servername, $username, $password, $mydb);
		if ($conn->connect_errno) {
		    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
		}
	}
	public function closeDB()
	{
		$conn->close();
	}
}
 ?>