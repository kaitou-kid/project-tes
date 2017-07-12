<!-- ======================================================
		Halaman Default dari admin
	 ====================================================== -->

<div class="main-content">

 <!-- Judul Halaman -->
  <div class="page-header">
    <h1 class="title">Home</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Beranda</a></li>
      </ol>
  </div>

  <!-- content dari halaman -->

  <div class="container-default">

  <div class="row">
    <div class="col-md-12">
    <h4>Master Data</h4>
    <ul class="panel quick-menu clearfix">
      <li class="col-sm-2">
        <a href="#"><i class="fa fa-user"></i>Menu1<span class="label label-success"></span></a>
      </li>
      <li class="col-sm-2">
        <a href="#"><i class="fa fa-users"></i>Menu2<span class="label label-success"></span></a>
      </li>
      <li class="col-sm-2">
        <a href="#"><i class="fa fa-newspaper-o"></i>Menu3</a>
      </li>
      <li class="col-sm-2">
        <a href="#"><i class="fa fa-puzzle-piece"></i>Menu4</a>
      </li>
    </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
    <h4>Peramalan</h4>
    <ul class="panel quick-menu clearfix">
      <li class="col-sm-2">
        <a href="#"><i class="fa fa-users"></i>Menu1</a>
      </li>
      <li class="col-sm-2">
        <a href="#"><i class="fa fa-user"></i>Menu2</a>
      </li>
      <li class="col-sm-2">
        <a href="#"><i class="fa fa-book"></i>Menu3</a>
      </li>
    </ul>
    </div>
  </div>

</div>

<script type="text/javascript">
  $(document).ready(function(){
    $.growl.notice({location: 'tr', message: "Selamat Datang"});
  });
</script>