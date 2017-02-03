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
			Input Satu Sampel
		</div>
		<div class="panel-body">
			<form method='post' action='/m/insert_data1.php'>
				<input type="hidden" name="user_id" value="<?= $_SESSION['id']; ?>">
		<?php
	$nama = $_POST['nama'];		
	$n = $_POST['n'];	
	echo "<table>";
	echo "<tr><td>No.</td> <td>Masukkan x</td></tr>";	
	for ($i = 1; $i <= $n; $i++) 
	{
		echo "<tr><td width='40'>$i</td><td><input type='text' name='datax".$i."' /></td></tr>";
	}
	echo "<tr> <td><input type='hidden' name='n' value='".$n."' /></td></tr>";
	echo "<tr> <td><input type='hidden' name='nama' value='".$nama."' /></td></tr>";
	echo "</table>";
	echo "<tr> <td><input type='submit' name='submit' value='Simpan data' /></td></tr>";	?></form>
			<br>
			<br>

		</div>
	</div>
	<?php }else{ ?>
		<?php include('auth/login.php');?>
	<?php } ?>
</div>
</body>
