<?php
//Mengirimkan Token Keamanan Ajax Request (Csrf Token)
session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Csrf Token -->
	<meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">

	<title></title>
</head>
<body>
<nav class="navbar navbar-dark bg-danger fixed-top">
  <a class="navbar-brand" href="index.php" style="color: #fff;">
    percobaan
  </a>
</nav>
 
<div class="container mb-3">
	<h2 align="center" style="margin: 60px 10px 10px 10px;">TEST KOMENTAR</h2><hr>
	
	<form method="POST" id="form_komen" name="Contact-Form">
		<div class="form-group">
			<input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control" placeholder="Masukkan Nama" />
		</div>
		<div class="form-group">
			<input type="text" name="user_id" id="user_id" class="form-control" placeholder="Masukkan" />
		</div>
		<div class="form-group">
			<textarea name="komen" id="komen" class="form-control" placeholder="Tulis Komentar" rows="5"></textarea>
		</div>
		<div class="form-group">
			<input type="hidden" name="komentar_id" id="komentar_id" value="0" />
			<!-- <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
		</div>
		<button type="submit" class="btn btn-primary btn-kirim" id="submit">Submit</button>
    
	</form>
	<hr>
	<h4 class="mb-3">Komentar :</h4>
	<span id="message"></span>
   
   	<div id="display_comment"></div>
</div>
<footer>
<div class="navbar bg-dark justify-content-center">
	<div style="color: #fff; ">© <?php echo date('Y'); ?> Copyright:
	    <a href="#"> Percobaan </a>
	</div>
</div>
</footer>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>

		$(document).ready(function(){
			//Mengirimkan Token Keamanan
			$.ajaxSetup({
	            headers : {
	                'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
	            }
	        });
        
			$('#form_komen').on('submit', function(event){
				event.preventDefault();
				let nama_pengirim = $('#nama_pengirim').val();
				let komen = $('#komen').val();
				
				if(nama_pengirim==''){
				    alert("Nama Pengirim Harus disii");
				} else if(komen==''){
				    alert("Komentar Harus disii");
				} else {
    				var form_data = $(this).serialize();
    				$.ajax({
    					url:"tambah_komentar.php",
    					method:"POST",
    					data:form_data,
    					success:function(data){
    						Swal.fire(
									  'Sukses!',
									  'Komentar anda berhasil ditambahkan!',
									  'success'
									);
    						$('#form_komen')[0].reset();
    						$('#komentar_id').val('0');
    						load_comment();
    					}, error: function(data) {
    		            	console.log(data.responseText)
    		            }
    				})
				}
			});
 
			load_comment();
 
			function load_comment(){
				$.ajax({
					url:"ambil_komentar.php",
					method:"POST",
					success:function(data){
						$('#display_comment').html(data);
					}, error: function(data) {
		            	console.log(data.responseText)
		            }
				})
			}
 
			$(document).on('click', '.reply', function(){
				var komentar_id = $(this).attr("id");
				$('#komentar_id').val(komentar_id);
				$('#nama_pengirim').focus();
			});
		});
	</script>
</body>
</html>
