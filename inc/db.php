<?php

mysqli_report(\MYSQLI_REPORT_ERROR | \MYSQLI_REPORT_STRICT);

class EFDB {
	public $error = "";
	public $connect_error = null;
	private $db = null;

	function __construct($dbhost, $dbuser, $dbpwd, $dbname) {
        try {
            $this->db = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
            $this->connect_error = $this->db->connect_error;    
        } catch (mysqli_sql_exception $e) {
            throw new RuntimeException("DB connection error:" . $e->getMessage());
        }

		$this->driver = new mysqli_driver();
		$this->driver->report_mode = (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);	
	}

	/* TODO: handle query errors, log perhaps? */
	function query(string $query, callable $result_handler, string $paramtype = null, $params = null)  {
		$res = NULL;
		if (is_null($paramtype)) {
			$result = $this->db->query($query);
			$res = $result_handler($result);
			$result->close();
		} elseif  ($stmt = $this->db->prepare($query)) {
			if (is_array($params)) {
				$stmt->bind_param($paramtype, ...$params);
			} else {
				$stmt->bind_param($paramtype, $params);
			}
			$stmt->execute();
			$result = $stmt->get_result();

			$res = $result_handler($result);

			$stmt->free_result();
			$stmt->close();
		}
		$this->error = $this->db->error;
		if ($this->error) {
			error_log($this->error);
		}
		return $res;
	}
	
	function __destruct() {
		if ($this->db) {
			$this->db->close();
		}
	}
}
?>
