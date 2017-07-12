<?php

require_once __DIR__.'/../model/user.php';

$usr = new user();
$data = $_POST;
$id = $data['user_id'];
// print_r($data);

switch ($data["type"]) {
	case 'update':
		# code update profile user
		array_shift($data);
		array_pop($data);
		$usr->_update_user(['user_id'=>$id], $data);

		echo json_encode(array("status"=>TRUE));
		break;

	case 'add':
		# code untuk menambahkan user
		array_pop($data);
		$usr->_add_user($data);
		echo json_encode(array('status' => TRUE));
		break;	

	case 'delete':
		# code menghapus user
		$usr->_delete_user(["user_id" => $id]);
		echo json_encode(array('status' => TRUE ));
		break;

	case 'ganti-password':
		# code ganti password
		$old_pass = $data['oldPass'];
		$new_pass = $data['newPass'];
		$row = $usr->_select_user(['user_id'=>$id],'password');//mengambil column password database untuk dicocokkan

		//mencocokkan password lama
		if ($old_pass == $row['password']) {
			# code...
			$usr->_update_user(['user_id'=>$id],['password'=>$new_pass]);
			echo json_encode(array('status' => TRUE ));
		}else{
			echo json_encode(array('status' => FALSE));
		}
		break;

	case 'select-user':
		# code select user
		$row = $usr->_select_user(["user_id"=>$id],'*');
		echo json_encode($row);
		break;
	
	// default:
		# code...
		// break;
}


//update user
/*if($data["type"] == "update"){
	array_shift($data);
	array_pop($data);
	$usr->_update_user(['user_id'=>$id], $data);

	echo json_encode(array("status"=>TRUE));
}*/

//ganti password
// if($data["type"] == "ganti-password"){
	// print_r($data);
	// $old_pass = $data['oldPass'];
	// $new_pass = $data['newPass'];
	// $row = $usr->_select_user(['user_id'=>$id],'password');//mengambil column password database untuk dicocokkan

	//mencocokkan password lama
	// if ($old_pass == $row['password']) {
		# code...
		// $usr->_update_user(['user_id'=>$id],['password'=>$new_pass]);
		// echo json_encode(array('status' => TRUE ));
	// }else{
		// echo json_encode(array('status' => FALSE));
	// }
	
// }

?>