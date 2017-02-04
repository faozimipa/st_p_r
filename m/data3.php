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
			Input 2 Sampel
		</div>
		<div class="panel-body">
			<form method='post' action='/m/insert_data3.php'>
		<?php
	$nama = $_POST['nama'];		
	$n = $_POST['n'];	
	echo "<table>";
	echo "<tr> <td>Masukkan x1</td><td>Masukkan x2</td><td>Masukkan y</td></tr>";	
	for ($i = 1; $i <= $n; $i++) 
	{echo "<tr><td><input type='text' name='data1x".$i."' /></td><td><input type='text' name='data2x".$i."' /></td><td><input type='text' name='datay".$i."' /></td></tr>";}			
	echo "<tr> <td><input type='hidden' name='n' value='".$n."' /></td></tr>";
	echo "<tr> <td><input type='hidden' name='nama' value='".$nama."' /></td></tr>";
	echo "</table>";
	echo "<tr> <td><input type='submit' name='submit' value='Simpan data' /></td></tr>";	?></form>

		</div>
	</div>
	<?php }else{ ?>
		<?php include('auth/login.php');?>
	<?php } ?>
</div>
</body>
