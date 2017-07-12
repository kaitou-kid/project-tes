<?php 
	/*===================================
				Halaman Logout
	  ===================================*/

require_once 'core/init.php';

session_destroy();
header('location: main-page.php');

?>