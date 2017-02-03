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
			Tabel Data Pengujian
		</div>
		<div class="panel-body">

			<table class="table">
			<tr><td>Menu Pilihan</td><td><center>Untuk Pengujian</center></td></tr>
			<tr><td><center><a href="/m/1sampel.php">Input data </a></center></td><td rowspan="3"><center>Uji Banding Satu Sampel</center></td></tr>
			<tr><td><center><a href="/m/importdata1.php">Upload data </a></center></td></tr>
			<tr><td><center><a href="/m/lihatdata1.php">Lihat data </a></center></td></tr>
			<tr><td><center><a href="/m/2sampel.php">Input data </a></center></td><td rowspan="3"><center>Uji Korelasi, Uji Regresi Sederhana, Uji Banding 2 Sampel Berpasangan</center></td></tr>
			<tr><td><center><a href="/m/importdata2.php">Upload data </a></center></td></tr>
			<tr><td><center><a href="/m/lihatdata2.php">Lihat data </a></center></td></tr>
			<tr><td><center><a href="/m/2sampel2.php">Input data </a></center></td><td rowspan="3"><center>Uji Banding 2 Sampel Tidak Berpasangan</center></td></tr>
			<tr><td><center><a href="/m/2importdata2.php">Upload data </a></center></td></tr>
			<tr><td><center><a href="/m/2lihatdata2.php">Lihat data </a></center></td></tr>
			<tr><td><center><a href="/m/3sampel.php">Input data </a></center></td><td rowspan="3"><center>Uji Regresi Ganda 2 Variabel Independen</center></td></tr>
			<tr><td><center><a href="/m/importdata3.php">Upload data </a></center></td></tr>
			<tr><td><center><a href="/m/lihatdata3.php">Lihat data </a></center></td></tr>
			</table>

		</div>
		</div>
	<?php }else{ ?>
		<?php include('auth/login.php');?>
	<?php } ?>
</div>
</body>
<?php include('common/footer.php') ?>
</html>