<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Statistika Parametrik</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>

<body>

<div id="wrapper">

	<div id="header">
	<h1>Parametrik Jitu</h1>
	<h2>Memecahkan Masalah Data Statistik Anda...</h2>	
	</div>
<div id="jalan2">
<marquee>Selamat datang di Aplikasi Parametrik Jitu, silahkan untuk menginput, memproses dan menganalisis data Anda, Terima Kasih</marquee>
</div>
	<div id="menu">
		<ul>
			<li><a href="index.php"><span>Home</span></a></li>
			<li><a href="konsep.php"><span>Konsep Dasar</span></a></li>
			<li><a href="data.php"><span>Data</span></a></li>
			<li><a href="hubungan.php"><span>Uji Hubungan</span></a></li>
			<li><a href="banding.php"><span>Uji Banding</span></a></li>
			<li><a href="taufiq.php">My Profil</a></li>
			<li><a href="bantuan.php">Bantuan</a></li>
		</ul>
		</ul>
	</div>


	
	
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


	<div id="footer">
		
	</div>

</div>

</body>
</html>