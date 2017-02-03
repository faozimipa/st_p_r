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
			<center><div class="entry-title">Daftar nama tabel yang sudah ada</div><br>
       <table border="1"><tr><td><center>No</center></td><td><center>Data Dua Variabel tak Berpasangan</center></td></tr>
		<?php
    //file kelas.php
	include "db_connect.php";
    $query = mysql_query("select nama from tabelt2 group by nama"); // data digroup jadi yang sama akan tampil satu
    $no=1;
	while($kelas = mysql_fetch_array($query)){
    	echo '<tr><td>'.$no.'</td><td><a href="2tampil2.php?nama='.$kelas['nama'].'">'.$kelas['nama'].'</a></td></tr>';
    $no++;
	}?></table>*Klik nama tabel untuk melihat data</center>
	 <br> NB : Setelah 30 hari data akan dihapus   
	<div id="footer">
		
	</div>

</div>

</body>
</html>
