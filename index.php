<!DOCTYPE html>
<html>
<head>
	<?php include 'lib/meta.php'; ?>
  <link rel="stylesheet" type="text/css" href="assets/css/main-page.css">
	<title>Halaman Admin</title>
</head>
<body>
<div class="page-wrap" id="content">
  <?php
  	require_once 'core/init.php';

    if(!isset($_SESSION['user'])){
      header('location: main-page.php');

    }
    $userLogin = new user_login();
    if($userLogin->user_type($_SESSION['user']) == 'adm' ){
    	include_once 'template/navbar.php';
    	include_once 'template/sidebar.php';
    	include_once 'template/content.php';
    }else{
      include_once 'template/navbar.php';
      include_once 'template/sidebar-user.php';
      include_once 'template/content.php';
    }
  ?>
</div>
</body>
</html>