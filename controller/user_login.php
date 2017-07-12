<?php
// membuat objek dari class user_login
$cek_login = new user_login();

if( isset($_POST['submit']) ){
  $user = $_POST["textUsername"];
  $pass = $_POST["textPassword"];

  if(!empty(trim($user)) && !empty(trim($pass)) ){
    if( $cek_login->cek_username($user) !== 0 ){   // cek apakah terdapat user yang diinputkan
      if( $cek_login->validasi_login($user, $pass) ){ // validasi login
        $cek_login->redirect_login($user);//redirect halaman
      }else{
        $error = 'Password anda salah';
        echo "<script>$.growl.warning({location:'bc', message: '$error'});</script>";
      }
    }else{
      $error = 'Usernmae tidak ditemukan';
      echo "<script>$.growl.warning({location:'bc', message: '$error'});</script>";
    }
  }else{
    $error = 'Username dan Password tidak boleh kosong';
    echo "<script>$.growl.warning({location:'bc', message: '$error'});</script>";
  }
}

?>