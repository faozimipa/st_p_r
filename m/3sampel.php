<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('common/header.php') ?>
</head>
<body>
<div class="container">
	<?php if(isset($_SESSION['login'])){ ?>
	<div class="panel panel-info">
		<div class="panel-heading">
			Input Data Tiga Variabel
		</div>
		<div class="panel-body">
			
		<form method="post" action="/m/data3.php">
		<table>
			<tr><td>
		Masukkan Nama Tabel</td>
			<td><textarea name="nama" id="nama" cols="22" rows="1"></textarea></td></tr> 
		<tr><td>Masukkan Banyaknya n</td> <td><input type="text" name="n" /></td></tr>
			</table><br><input type="submit" name="submit" value="Submit" /> </form>
			<br>
		NB : Nama tabel harus yang belum ada atau yang belum tersimpan di aplikasi ini, untuk melihat daftar nama tabel yang sudah ada klik pilihan "Lihat data" pada menu "Data"


		</div>
	</div>
	<?php }else{ ?>
		<?php include('auth/login.php');?>
	<?php } ?>
</div>
</body>
