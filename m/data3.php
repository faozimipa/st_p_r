<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

				<div class="entry">
				<br>
				<div class="entry-title">Input 2 Sampel</div><br>
			<form method='post' action='insert_data3.php'>
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
			<br>
			<br>
			</div>
</html>
