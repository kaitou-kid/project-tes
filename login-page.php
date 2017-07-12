<?php
//variabel untuk notifikasi error
$error = '';

//redirect ketika sudah login
if( isset($_SESSION['user']) ) header('location: index.php');

?>
<!DOCTYPE html>
<html>
<head>
<?php include 'lib/meta.php'; ?>
<link rel="stylesheet" type="text/css" href="assets/css/login-page.css">
<link rel="stylesheet" type="text/css" href="assets/css/notify_error.css">
	<title>Halaman Login</title>
</head>
<body>
<div class="page-wrap">
  <!-- bagian header -->
  <div class="col-xs-12 login-header">
  </div>
  <!-- akhir dar header -->

  <!-- bagian form login -->
  <form name="login-form" method="post" action="" id="form-login">
    <div class="form-wrap">

      <!-- Notifikasi error -->
      <!-- <div id="error" class="col-xs-12 col-sm-3 col-centered"">
        <a href="#" onclick="close_notify()" id="close"><span class="fa fa-close"></span></a>
        <p><span class="fa fa-exclamation-triangle"></span> <?= $error; ?></p>
      </div> -->
      
      <!-- akhir notifikasi error -->

      <div class="col-xs-12 col-sm-4 col-centered">
        <div class="input-group input-group-costum">
          <span class="input-group-addon bg-icon"><span class="fa fa-user"></span>&emsp;|</span> 
          <input type="text" class="form-control" placeholder="Username" name="textUsername" id="textUsername" />
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-centered">
        <div class="input-group">
          <span class="input-group-addon bg-icon"><span class="fa fa-key"></span>&emsp;|</span>
          <input type="Password" class="form-control" placeholder="Password" name="textPassword" id="textPassword" />
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-centered">
        <button type="submit" name="submit" class="btn btn-login" id="form-submit"> <strong>MASUK &emsp;<span class="fa fa-sign-in"></span></strong></button>
        <!-- <input type="submit" name="submit" class="btn btn-login" value="MASUK" /> -->
      </div>
    </div>
  </form>
  <!-- akhir dari form-login -->
</div>
</body>
</html>

<script type="text/javascript">
    
/*$(document).ready(function(){

});*/

</script>