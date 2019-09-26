<?php
error_reporting(E_ALL ^ E_NOTICE);
class Database{
	private $host = "brns.com";
	private $user = "brns_boom";
	private $pass = "Boom2710";
	private $database = "brns_boom";
	public $conn;
	
	public function getConnection(){
		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database);
		if($this->conn){
			$this->conn->set_charset("utf8");
		}
		return $this->conn;
	}
}

