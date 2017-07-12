   <!-- ==========================
			         HALAMAN USER
 	      ========================== -->

<?php

#SQL untuk memilih data dari tb user
// $sql = "SELECT * FROM tb_user";
#Query ditampung pada variabel hasil
// $hasil = $koneksi->query($sql);

?>

<div class="main-content">
  <div class="container-default">
    <div class="row">

      <!-- start panel -->
      <div class="col-md-12">
        <div class="panel panel-default">
          <!-- Panel Title -->
            <ol class="breadcrumb">
              <li><h3 class="title">Pengguna</h3></li>
              <li><a href="index.php">Beranda</a></li>
              <li class="active">Pengguna</li>
            </ol>
          </div>
        </div>
    </div>
      <!-- tombol menu dan pencarian -->
      <div class="panel-body table-responsive">
        
        <div class="col-md-6">
          <div class="btn-group">
            <a href="#" type="button" class="btn btn-light" onclick="add_user()"><i class="fa fa-plus"></i> Tambah Pengguna</a>
            <a href="#" type="button" class="btn btn-light" onclick="reload_table()"><i class="fa fa-refresh"></i> Segarkan</a>
          </div>
        </div>

        <div class="col-md-6">
        <div class="col-md-offset-4">
          <!-- <div class="input-group">
            <span class="input-group-addon search-icon"><span class="fa fa-search"></span></span>
            <input type="text" class="form-control search-box" placeholder="Cari Pengguna Berdasarkan Nama" id="cariUser" autocomplete="off" />
          </div> -->
        </div>
        </div>

      </div>

      <hr />

      <div class="row">
      <!-- start table -->
        <div class="col-md-12">
          <table class="table table-striped table-bordered table-hover" id="tabelUser">
            <thead>
              <tr>
                <th>User ID</th>
                <th>Nama Lengkap</th>
                <th>Nama Pengguna</th>
                <th>E-mail</th>
                <th class="no-sort">Tindakan</th>
                <!-- <th colspan="2">Tindakan</th> -->
            </thead>
            <tbody>
            	<?php
            	  #menampilkan database dari tb_user kedalam tabel
            	  /*if ($hasil->num_rows > 0) {
            	  	while ($baris = $hasil->fetch_assoc()) {
            	  		echo "<tr><td>".$baris["user_id"]."</td><td>".$baris["nama_lengkap"]."</td><td>".$baris["username"]."</td><td>".$baris["email"]."</td><td><a href='#' title='Edit'><span class='fa fa-edit'></span></a> | <a href='#' class='deleteUser' title='Delete'><span class='fa fa-trash'></span></a></td></tr>";
            	  	}
            	  }else{
            	  	echo "<tr><td collspan='5'>Data Tidak Ditemukan</td></tr>";
            	  }*/
            	  #clear variabel hasil
            	  // $hasil->free_result();
            	  #memutus koneksi
            	  // $koneksi->close();
            	?>
            </tbody>
            <tfoot>
    		  <tr>
        		<th>User ID</th>
		        <th>Nama Lengkap</th>
		        <th>Nama Pengguna</th>
		        <th>E-mail</th>
		        <th>Tindakan</th>
		        <!-- <th colspan="2">Tindakan</th> -->
    		  </tr>
    		</tfoot>
          </table>
        </div>
      </div>    
  </div>
</div>
<!-- <script type="text/javascript" src="js/trigger-cari-user.js"></script> -->
<!-- <script type="text/javascript" src="assets/datatables/js/dataTables.bootstrap.js"></script> -->
<script type="text/javascript" src="css/plugin/jquery-confirm/dist/jquery-confirm.min.js"></script>
<script type="text/javascript" src="assets/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="css/plugin/jquery.notify/javascripts/jquery.growl.js"></script>
<!-- <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script> -->

<script type="text/javascript">

  var save_method;
  var table;
  $(document).ready(function(){

  	$('#tabelUser').DataTable({
  		"bProcessing": true,
  		"bServerSide": true,
  		"sAjaxSource": "lib/dataTables-user.php",
  		"columnDefs":[{
  			"targets": "no-sort",
  			"orderable": false
  		}]
  	});

    /*$('.deleteUser').on("click", function(){
    	$.confirm({
    	  title: 'Testing coy',
    	  content: 'cek-cek',
    	  buttons: {
    		  confirm: function(){
    			$.alert('confirmed');
    		  },
    		  cancel: function(){
    		  }
    	  }
      	});
    });*/

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

  });

  function reload_table(){
    table = $('#tabelUser').DataTable();
    table.ajax.reload(null,false); //reload datatable ajax 
  }

  function add_user(){
    save_method = 'add';
    $('#form-user')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Pengguna'); // Set Title to Bootstrap modal title
    $('[name="user_id"]').attr('readonly',false);
    $('#btnSave').text('Save');
    $('#btnSave').attr('disabled',false);
  }

  function edit_user(user_id){
    // console.log(user_id)
    save_method = 'update';
    $('#form-user')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show');
    $('.modal-title').text('Koreksi Pengguna');
    

    //load data dari file update_user.php dengan ajax
    $.ajax({
      url: "lib/update_user.php?user_id=" + user_id,
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('[name="user_id"]').val(data.user_id);
        $('[name="nama_lengkap"]').val(data.nama_lengkap);
        $('[name="username"]').val(data.username);
        $('[name="password"]').val(data.password);
        $('[name="email"]').val(data.email);
        $('[name="user_id"]').attr('readonly',true);
        $('#modal_form').modal('show');
        $('.modal_title').text('Edit Pengguna');

      },
      error: function(jqXHR, textStatus, errorThrown){
        alert('Error menangkap data dari ajax');
      }
    });

  }

function save(){

  $('#btnSave').text('Saving...');
  $('#btnSave').attr('disabled',true);

  var url;

  if (save_method == 'add') {
    url = "lib/ajax_add.php";
  }else{
    url = "lib/ajax_update.php";
  }

  //ajax menambahkan data atau update ke dalam database
  $.ajax({
    url: url,
    type: "POST",
    data: $('#form-user').serialize(),
    dataType: "JSON",
    success: function(data){
      if(data.status){ //jika sukses close modal form dan reload table
        $('#modal_form').modal('hide');
        reload_table();
      }
      $.growl.notice({ message: "Data user telah berhasil ditambahkan atau diupdate !" });
      $('#btnSave').text('Save');
      $('#btnSave').attr('disabled',false);
    },
    error: function (jqXHR, textStatus, errorThrown){
      alert('Terjadi kesalahan dalam penyimpanan data');
      $('#btnSave').text('Save');
      $('#btnSave').attr('disabled',false);
    }
  });
} 

function delete_user(id){
  $.confirm({
    icon: "fa fa-warning",
    animation: "RotateXR",
    animationBounce: "noBounce",
    type: "orange",
    title: "Konfirmasi",
    content: "Apakah anda yakin menghapus data "+id+" ini ?",
    buttons:{
      Ya: function(){
        // $.alert(id);
        $.ajax({
          url: "lib/ajax_delete.php?user_id="+id,
          type: "GET",
          dataType: "JSON",
          success: function(data){
            if (data.status) {
              $.growl.notice({ message: "Data user telah berhasil dihapus !" });
              reload_table();
            }
          },
          error: function(jqXHR, textStatus, errorThrown){
            alert('Terjadi kesalahan dalam penghapusan data');
          }
        });
      },
      Tidak: function(){

      }
    }
  });
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form-user" class="form-horizontal">
                    <!-- <input type="hidden" value="" name="id"/>  -->
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">ID Pengguna</label>
                            <div class="col-md-9">
                                <input name="user_id" placeholder="ID Pengguna" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input name="nama_lengkap" placeholder="Nama Lengkap" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pengguna</label>
                            <div class="col-md-9">
                                <input name="username" placeholder="Nama Pengguna" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kata Sandi</label>
                            <div class="col-md-9">
                                <input name="password" placeholder="Kata Sandi" class="form-control" type="password">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat E-mail</label>
                            <div class="col-md-9">
                                <input name="email" placeholder="Alamat E-mail" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <select name="gender" class="form-control">
                                    <option value="">--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea name="address" placeholder="Address" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth</label>
                            <div class="col-md-9">
                                <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div> -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal