<?php

require_once __DIR__.'/../functions/db.php';

class user extends db_config{

	protected $table = 'tb_user';

	public function __construct(){
		parent::__construct();
	}

	//select data berdasarkan $id
	// format id array cth _selec_user(['user_id'=>id])
	//column digunkan untuk filter dengan format _selec_user(['user_id'=>id], '*') untuk menseleksi semua 
	// '*' adalah column yang akan diseleksi
	public function _select_user($id,$column){
		parent::_select($column);
		parent::_from($this->table);
		parent::_where($id);

		// echo db_config::_query();
		$result = mysqli_query($this->connection, db_config::_query());
		$row = mysqli_fetch_assoc($result);
		return $row;
		//free result
		mysqli_free_result($result);


	}

	public function _add_user($data){
		parent::_insert($this->table);
		parent::_values($data);

		// echo parent::_query();
		return mysqli_query($this->connection, parent::_query()) or die(mysqli_error($this->connection));
	}

	public function _update_user($id,$data){ // update user 
		//query update
		parent::_update($this->table);
		parent::_set($data);
		parent::_where($id);

		// echo parent::_query();
		return mysqli_query($this->connection, parent::_query()) or die(mysqli_error($this->connection));
	}

	//format untuk parameter id menggunakan asosiatif array
	//cth: _delete_user(["user_id"=>$id])
	public function _delete_user($id){
		parent::_delete();
		parent::_from($this->table);
		parent::_where($id);

		// echo parent::_query();
		return mysqli_query($this->connection, parent::_query()) or die(mysqli_error($this->connection));
	}

}


?>