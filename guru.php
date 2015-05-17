<?php
	/**
	* Class Guru
	* 
	*
	*/
	class Guru
	{
		public $nama;
		public $id;
		public $level;
		require 'config.php';
		private $result;
		function __construct($id);
		{
			$query = "SELECT * FROM tb_guru WHERE id=$id";
			$result = $conn->num_rows;
		}
	}
?>