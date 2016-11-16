<?php

namespace App\Library\Database;

class MySQLi {
	private $link;

	public function __construct() {	   
<<<<<<< HEAD
		$this->link = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
=======
		$this->link = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729

		if (mysqli_connect_error()) {
			throw new ErrorException('Error: Could not make a database link');
		}

		$this->link->set_charset("utf8");
		$this->link->query("SET SQL_MODE = ''");
	}

	public function query($sql) {
		$query = $this->link->query($sql);

		if (!$this->link->errno){
			if (isset($query->num_rows)) {
				$data = array();

				while ($row = $query->fetch_assoc()) {
					$data[] = $row;
				}

<<<<<<< HEAD
				$result = new \stdClass();
=======
				$result = new stdClass();
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
				$result->num_rows = $query->num_rows;
				$result->row = isset($data[0]) ? $data[0] : array();
				$result->rows = $data;

				unset($data);

				$query->close();

				return $result;
			} else{
				return true;
			}
		} else {
			throw new ErrorException('Error: ' . $this->link->error . '<br />Error No: ' . $this->link->errno . '<br />' . $sql);
			exit();
		}
	}

	public function escape($value) {
		return $this->link->real_escape_string($value);
	}

	public function countAffected() {
		return $this->link->affected_rows;
	}

	public function getLastId() {
		return $this->link->insert_id;
	}

	public function __destruct() {
		$this->link->close();
	}
}