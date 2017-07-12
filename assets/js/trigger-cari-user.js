$(document).ready(function(){

  loadData();

  function loadData(query){
  	$.ajax({
  		url: "lib/cari-user.php",
  		method: "POST",
  		data: {query:query},
  		success: function(data){
  			$('#hasil').html(data);
  		}

  	});
  }

  $('#cariUser').on("keyup",function(){
  	var cari = $(this).val();
  	if(cari != ''){
  	  loadData(cari);
  	}else{
  	  loadData();
  	}
  });

  $('#refresh').on("click",function(){
    	loadData();
    	$('#cariUser').val("");
    });

});





/*$(document).ready(function(){

  function search(){
  	var query_value = $('input#cariUser').val();
  	if (query_value !== '') {
  		$.ajax({
  			type: "POST",
  			url: "lib/cari-user.php",
  			data: {query: query_value},
  			cache: false,
  			success: function(html){
				$("table#tabelUser tbody").html(html);
				// alert("success");
			}
  		});
  	}return false;
  }

  $("input#cariUser").on("keyup",function(e){

  	clearTimeout($.data(this, 'timer'));

  	var kata_kunci = $(this).val();

  	lakukan pencarian
  	if (kata_kunci !== '') {
  		$(this).data('timer', setTimeout(search, 100));
  	};

  });

});*/

