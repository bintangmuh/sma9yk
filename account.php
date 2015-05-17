<?php 
/**
* Handle login
*login account
*/
class account
{
	public $nama;
	public $pass;
	public $stat = false;
	function account($nama, $pass)
	{
		$this->nama = $nama;
		$this->pass = $pass;	
	}
	public function ceklogin(){
		if ($this->nama == $this->pass) {
			$this->stat = true;
		}
		return $this->stat;
	}
	public function getNama(){
		return $this->nama;
	}
}
 ?>