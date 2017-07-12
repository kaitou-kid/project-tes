//variable untuk save dan edit
var save_method;
var type;
var table;


// event update user profile
$('#user-profile').submit(function(event){
	event.preventDefault();
	$.ajax({
		url: "controller/user.php",
		type: "POST",
		dataType: "JSON",
		data: $('#user-profile').serialize()+ "&type=" + "update",
		success: function(data){
			if(data.status){
				$.growl.notice({message: "Data berhasil di perbaharui"});
			}

		},
		error: function(jqXHR, textStatus, errorThrown){
			alert("Terjadi kesalahan saat menyimpan data");
		}
	});
});

//event ganti password
$('#ganti-password').submit(function(event){
	event.preventDefault();
	$.ajax({
		url: "controller/user.php",
		type: "POST",
		dataType: "JSON",
		data: $('#ganti-password').serialize()+ "&type=" + "ganti-password",
		success: function(data){
			if (data.status) {
				$.growl.notice({message: "Password telah berhasil dirubah"});
			}else{
				$.growl.warning({message: "Password lama anda salah"});
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert("Terjadi kesalahan saat mengganti password");
		}
	});
});

// modal form insert user
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

//event untuk melakukan edit user
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
      url: "controller/user.php",
      type: "POST",
      dataType: "JSON",
      data: {
      	"user_id": user_id,
      	"type": "select-user"
      },
      success: function(data){
        $('[name="user_id"]').val(data.user_id);
        $('[name="nama_lengkap"]').val(data.nama_lengkap);
        $('[name="username"]').val(data.username);
        $('[name="password"]').val(data.password);
        $('[name="email"]').val(data.email);
        $('[name="user_type"]').val(data.user_type);
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

	//$('#btnSave').text('Saving...');	
	//$('#btnSave').attr('disabled',true);
	var user_id = $('[name="user_id"]').val();
    var nama_lengkap = $('[name="nama_lengkap"]').val();
    var username = $('[name="username"]').val();
    var password = $('[name="password"]').val();
    var email = $('[name="email"]').val();
    var user_type = $('[name="user_type"]').val();


	if(save_method == 'add'){
		type = "&type=" + "add";
	}else{
		type = "&type=" + "update";
	}
	if(user_id == "" || nama_lengkap == "" || username == "" || password == "" || email == "" || user_type == ""){
		$.growl.warning({location: 'tr',message: "Silahkan isi semua keterangan untuk user"});
	}else{
		$.ajax({
			url: "controller/user.php",
			type: "POST",
			dataType: "JSON",
			data: $('#form-user').serialize() + type,
			success: function(data){
				if(data.status){ //jika sukses close modal form dan reload table
	        		$('#modal_form').modal('hide');
	        		reload_table();
	      		}
	      		$.growl.notice({ message: "Data user telah berhasil ditambahkan atau diupdate !" });
	      		$('#btnSave').text('Save');
	      		$('#btnSave').attr('disabled',false);
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert("Terjadi kesalahan saat penyimpanan data");
			}
		});
	}
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
          url: "controller/user.php",
          type: "POST",
          data: {
          	"user_id": id,
          	"type": "delete"
          },
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

function reload_table(){
    table = $('#tabelUser').DataTable();
    table.ajax.reload(null,false); //reload datatable ajax 
}