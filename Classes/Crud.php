<?php
include_once 'Database.php';

class Crud extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	function execute($sql) {
			try {
			 $stmt = $this->conn->prepare($sql);
			$result = $stmt->execute();
			if($result){
				$rows = $stmt->fetchAll();
				return $rows;
			}else{
				return [];
			}
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}
	}

	function delete($tbl, $cond='') {
		$sql = "DELETE FROM `$tbl`";
		if ($cond!='') {
			$sql .= " WHERE $cond ";
		}

		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->rowCount(); // 1
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}
	}

	function insert($tbl, $arr) {
		$sql = "INSERT INTO $tbl (`";
		$key = array_keys($arr);
		$val = array_values($arr);
		$sql .= implode("`, `", $key);
		$sql .= "`) VALUES ('";
		$sql .= implode("', '", $val);
		$sql .= "')";

		$sql1="SELECT MAX( id ) FROM  `$tbl`";
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$stmt2 = $this->conn->prepare($sql1);
			$stmt2->execute();
			$rows = $stmt2->fetchAll(); // assuming $result == true
			return $rows[0][0];
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}
	}

	function update($tbl, $arr, $cond) {
		$sql = "UPDATE `$tbl` SET ";
		$fld = array();
		foreach ($arr as $k => $v) {
			$fld[] = "`$k` = '$v'";
		}
		$sql .= implode(", ", $fld);
		$sql .= " WHERE " . $cond;

		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->rowCount(); // 1
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}
	}
}
?>
