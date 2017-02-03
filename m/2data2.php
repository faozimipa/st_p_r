<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
				<div class="entry">
				<br>
				<div class="entry-title">Input 2 Sampel</div><br>
			<form method='post' action='2insert_data2.php'>
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
			<br>
			<br>
			</div>
</html>
