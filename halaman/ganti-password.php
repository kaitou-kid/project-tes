<!-- ===========================================
			Halaman untuk mengganti password
     =========================================== -->

<div class="main-content">
  <div class="container-default">
    <div class="row">

      <!-- start panel -->
      <div class="col-md-12">
        <div class="panel panel-default">
          <!-- <div class="panel-title"> -->
            <ol class="breadcrumb">
              <li><h3 class="title">Ganti Kata Sandi</h3></li>
              <li><a href="index.php">Beranda</a></li>
              <li class="active">Ganti Kata Sandi</li>
            </ol>
        </div>
      </div>

    </div>


      <!-- Start Form-->
    <div class="row">
      <form class="form-horizontal" name="ganti-password" id="ganti-password">
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>" >
        <div class="form-group">
          <label for="inp_usr" class="control-label col-xs-2">Username</label>
          <div class="col-xs-10 col-md-4">
            <input class="form-control" id="inp_usr" type="text" value="<?php echo $_SESSION['user'] ?>" disabled="disabled" >
          </div>
        </div>
        <div class="form-group">
          <label for="inp_pass" class="control-label col-xs-2">Kata Sandi Lama</label>
          <div class="col-xs-10 col-md-4">
            <input class="form-control" name="oldPass" id="oldPass" placeholder="Kata Sandi Lama" type="password" required="required">
          </div>
        </div>
        <div class="form-group">
          <label for="inp_pass" class="control-label col-xs-2">Kata Sandi Baru</label>
          <div class="col-xs-10 col-md-4">
            <input class="form-control" name="newPass" id="newPass" placeholder="Kata Sandi Baru" type="password" required="required">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-offset-2 col-xs-10">
            <button type="submit" name="ganti-password" class="btn btn-success" id="form-submit"><strong><span class="fa fa-save"></span> &emsp;Simpan&emsp;</strong></button>
            <button type="reset" name="ganti-password" class="btn btn-info" id="form-submit"><strong><span class="fa fa-reply"></span> &emsp;Batal&emsp;</strong></button>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>
<script type="text/javascript" src="event/user.js"></script>
<script type="text/javascript" src="css/plugin/jquery.notify/javascripts/jquery.growl.js"></script>