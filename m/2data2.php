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
			<form method='post' action='/m/2insert_data2.php'>
		<?php
	$nama = $_POST['nama'];		
	$n1 = $_POST['n1']; 
	$n2 = $_POST['n2'];	
	echo "<table>";
	echo "<tr><td>";
	echo "<table>";
	echo "<tr> <td>Masukkan X</td></tr>";	
	for ($i = 1; $i <= $n1; $i++) 
	{echo "<tr><td><input type='text' name='datax".$i."' /></td></tr>";}
	echo "</table>";echo "</td><td>";
	echo "<table>";
	echo "<tr> <td>Masukkan Y</td></tr>";
	for ($i = 1; $i <= $n2; $i++)
	{echo "<tr><td><input type='text' name='datay".$i."' /></td></tr>";}			
	echo "</table>";echo "</td></tr></table>";
	echo "<input type='hidden' name='n1' value='".$n1."' />";
	echo "<input type='hidden' name='n2' value='".$n2."' />";
	echo "<input type='hidden' name='nama' value='".$nama."' />";
	echo "<input type='submit' name='submit' value='Simpan data' />";	?></form>
		</div>
	</div>
	<?php }else{ ?>
		<?php include('auth/login.php');?>
	<?php } ?>
</div>
</body>