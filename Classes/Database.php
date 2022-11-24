<?php
class Database {

	private $hostname, $dbname, $username, $password;
	protected $conn;

	function __construct() {
		if (!isset($this->connection)) {
			$this->host_name = "localhost";
			$this->dbname = "localhost";
			$this->username = "admin";
			$this->password = "password";
			try {

				$this->conn = new PDO("mysql:host=$this->host_name;dbname=$this->dbname", $this->username, $this->password);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				throw 'Error: ' . $e->getMessage();
			}
		}
		return $this->conn;
	}

}
?>
