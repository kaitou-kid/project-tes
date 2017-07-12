<?php  

  if ($_GET) {
  	switch ($_GET['halaman']) {
  		case '':
  			# code...
  			if(!file_exists("halaman/dashboard.php")) die ("Maaf, Halaman tidak ditemukan!");
  			include 'halaman/dashboard.php';
  			break;

  		case 'user':
  			# code...
  			if(!file_exists("view/user.php")) die ("Maaf, Halaman tidak ditemukan!");
  			include 'view/user.php';
  			break;

  		case 'ganti-password':
  			# code...
  			if(!file_exists("halaman/ganti-password.php")) die ("Maaf, Halaman tidak ditemukan!");
  			include 'halaman/ganti-password.php';
  			break;
  		
      case 'profil-setting':
        #code...
        if (!file_exists("halaman/profil-setting.php")) die ("Maaf, Halaman tidak ditemukan!");
        include 'halaman/profil-setting.php';
        break;

  		default:
  			# code...
  			if(!file_exists("halaman/dashboard.php")) die ("Maaf, Halaman tidak ditemukan!");
  			include'halaman/dashboard.php';
  			break;
  	}

  }else{
  	include 'halaman/dashboard.php';
  }

?>