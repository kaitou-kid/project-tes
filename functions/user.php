<?php 
/*	================================
		class untuk user login 
	================================*/

include_once 'functions/db.php';

class user_login {

	private $username;
	private $password;
	private $db;
	private $table = 'tb_user';

	public function __construct(){
		$this->db = new db_config();
		$this->db = $this->db->get_connection();
	}

	public function cek_username($name){
		$this->username = mysqli_real_escape_string($this->db,$name);
		$query = "SELECT * FROM tb_user WHERE username = '$this->username' ";

		//cek ada tidaknya username
		if( $result = mysqli_query($this->db, $query) ) return mysqli_num_rows($result);

		//membersihkan hasil operasi diatas
		mysqli_free_result($result);
	}

	public function validasi_login($name,$pass){

		$this->username = mysqli_real_escape_string($this->db,$name);
		$this->password = mysqli_real_escape_string($this->db,$pass);

		$query = "SELECT password FROM tb_user WHERE username = '$this->username'";
		$result = mysqli_query($this->db,$query);
		$row = mysqli_fetch_assoc($result);

		if( $row["password"] == $this->password ){ //pencocokan password login dengan database
			return TRUE;
			// echo $this->password.$row["password"];
		}else{
			return FALSE;
		}
	}

	public function redirect_login($name){ //digunakan untuk redirect ketika login berhasil
		$query = "SELECT user_id FROM tb_user WHERE username = '$name'";
		$result = mysqli_query($this->db,$query);
		$row = mysqli_fetch_assoc($result);

		$_SESSION['user'] = $name;
		$_SESSION['user_id'] = $row["user_id"];
		header('location:index.php');

	}

	public function user_type($user){ //menentukan user level
		$this->username = $user;

		$query = "SELECT user_type FROM tb_user WHERE username = '$this->username'";
		$result = mysqli_query($this->db,$query);
		$row = mysqli_fetch_assoc($result);

		if($row["user_type"] == 'adm'){
			return 'adm';
		}else{
			return 'usr';
		}
	}

	
}

?>