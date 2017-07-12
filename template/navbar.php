<div id="navbar" class="color-bg-1 clearfix">
  <!-- ICON BUTTON SIDEBAAR  -->
    <a href="#" class="main-sidebar-button color-1"><i class="fa fa-windows"></i></a>
  <!-- PROFIL USER DAN SETTING USER-->
    <ul class="top-right">
      <li class="dropdown link">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox">
        	<img src="assets/img/anonym.jpg" alt="img"><b> <?php echo $_SESSION['user']; ?> </b><i class="fa fa-gear"></i><span class="caret"></span>
        	<ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
	          <li role="presentation" class="dropdown-header">PENGGUNA</li>
	          <li><a href="index.php?halaman=ganti-password"><i class="fa falist fa-key"></i> Ganti Kata Sandi</a></li>
	          <li class="divider"></li>
	          <li><a href="logout.php" id="logout2"><i class="fa falist fa-power-off"></i> Keluar</a></li>
        	</ul>
        </a>
      </li>
    </ul>
</div>