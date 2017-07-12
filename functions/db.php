<?php
/*====================================
		file class koneksi
  ====================================*/

define('DB_SERVER', 'localhost');
define('DB_USER','root');
define('DB_PASS', '');
define('DB_NAME', 'project_ta');

class db_config{

	protected $connection;
	protected $sql;
	//koneksi ke database mysql
	public function __construct(){

		$this->connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		//pemberitahuan masalah koneksi
		if($this->connection->connect_error){
			print "Terjadi kesalahan saat menyambungkan database ".mysqli_error();
		}

	}

	public function get_connection(){
		return $this->connection;
	}

	//query builder 

	public function _select($column = []){
		$value = $column;
		if(count($column) > 1){
			$value = implode(",", $column);
		}

		return $this->sql = "SELECT {$value} ";

	}

	public function _from($table = []){
		$value = $table;
		if(count($table) > 1){
			$value = implode(",", $table);
		}
		return $this->sql .= "FROM {$value} ";

	}

	public function _insert($table = []){
		$value = $table;
		if(count($table) > 1){
			$value = implode(",", $table);
		}
		return $this->sql = "INSERT INTO {$table} ";

	}

	public function _update($table = []){
		$value = $table;
		if(count($table) > 1){
			$value = implode(",", $table);
		}
		return $this->sql = "UPDATE $value ";

	}

	public function _set($column = []){
		$values = $column;
		if(count($values) > 0){
			foreach ($values as $key => $value) {
				# code...
				$value = "'$value'";
				$updates[]="$key = $value";
			}
			$implodeArray = implode(', ', $updates);
			return $this->sql .= "SET $implodeArray ";
		}

	}

	public function _delete(){
		return $this->sql = "DELETE ";
	}

	public function _where($column = []){
		$key = implode(',', array_keys($column));
		$value = implode(',', $column);
		return $this->sql .= "WHERE {$key} = '{$value}'";

	}

	public function _values($column = []){
		$value = $column;
		if(count($column) > 1){
			$value = implode("','", $column);
		}
		return $this->sql .= "VALUES('$value')";
	}

	public function _query(){
		return $this->sql;
	}

	

}

?>