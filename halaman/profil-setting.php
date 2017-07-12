<!-- ===========================================
			Halaman untuk mengganti password
     =========================================== -->
<?php

require_once 'model/user.php';

$usr = new user();
$row = $usr->_select_user(['user_id'=>$_SESSION['user_id']],'*');


//membuat objek dari class db_config
// $db = new db_config();
//menseleksi data dari username yang login
// $db->_select('*');
// $db->_from(['tb_user']);
// $db->_where(['user_id'=>$_SESSION['user_id']]);

//echo $db->_query();
// $result = mysqli_query($db->get_connection(),$db->_query());
//menambpung hasil kedalam variabel $row
// $row = mysqli_fetch_assoc($result);

?>
<div class="main-content">
  <div class="container-default">
    <div class="row">

      <!-- start panel -->
      <div class="col-md-12">
        <div class="panel panel-default">
          <!-- <div class="panel-title"> -->
            <ol class="breadcrumb">
              <li><h3 class="title">Ganti Kata Sandi</h3></li>
              <li><a href="main.php">Beranda</a></li>
              <li class="active">Pengaturan Profil</li>
            </ol>
        </div>
      </div>

    </div>


      <!-- Start Form-->
    <div class="row">
      <form class="form-horizontal" action="#" id="user-profile">
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>" >
        <div class="form-group">
          <label for="inp_usr" class="control-label col-xs-2">Nama Lengkap</label>
          <div class="col-xs-10 col-md-4">
            <input class="form-control" id="edit_nama_lengkap" type="text" name="nama_lengkap" value="<?php echo $row["nama_lengkap"]; ?>" required="required">
          </div>
        </div>
        <div class="form-group">
          <label for="inp_usr" class="control-label col-xs-2">Username</label>
          <div class="col-xs-10 col-md-4">
            <input class="form-control" id="edit_username" type="text" name="username" value="<?php echo $row["username"]; ?>" required="required">
          </div>
        </div>
        <div class="form-group">
          <label for="inp_pass" class="control-label col-xs-2">Email</label>
          <div class="col-xs-10 col-md-4">
            <input class="form-control" id="edit_email" type="email" name="email" value="<?php echo $row["email"]; ?>" required="required">
          </div>
        </div>
        <div class="form-group">
          <label for="inp_pass" class="control-label col-xs-2"></label>
          <div class="col-xs-10 col-md-4">
            <a href="index.php?halaman=ganti-password">Ganti Password</a>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-offset-2 col-xs-10">
            <button type="submit" name="ganti-password" class="btn btn-success" id="profile-submit"><strong><span class="fa fa-save"></span> &emsp;Simpan&emsp;</strong></button>
            <button type="reset" name="reset" class="btn btn-info" id="profile-reset"><strong><span class="fa fa-reply"></span> &emsp;Batal&emsp;</strong></button>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>
<script type="text/javascript" src="event/user.js"></script>
<script type="text/javascript" src="css/plugin/jquery.notify/javascripts/jquery.growl.js"></script>