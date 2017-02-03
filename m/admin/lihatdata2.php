<?php
session_start();
if(isset($_SESSION['level'])){
if( $_SESSION['level']=="admin"){
include "db_connect.php";
error_reporting(0);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
			<li><a href="acc.php">ACC</a></li>
			<li><a href="lihatdata1.php">1 Variabel</a></li>
			<li><a href="lihatdata2.php"> 2 Variabel</a></li>
			<li><a href="2lihatdata2.php">2 Variabel tak Berpasangan</a></li>
			<li><a href="lihatdata3.php">3 Variabel</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>

	
	
				<div class="entry">
				<br>
			<center><div class="entry-title">Daftar nama tabel yang sudah ada</div><br>
       <table border="1"><tr><td><center>NO</center></td><td><center>Data Dua Variabel</center></td><td><center>Hapus</center></td></tr>
		<?php
    //file kelas.php
	include "db_connect.php";
	$no=1;
    $query = mysql_query("select nama from tabel2 group by nama"); // data digroup jadi yang sama akan tampil satu
    while($kelas = mysql_fetch_array($query)){
    	echo '<tr><td>'.$no.'</td><td><a href="tampil2.php?nama='.$kelas['nama'].'">'.$kelas['nama'].'</a></td><td><a href="delete.php?nama='.$kelas["nama"].'">delete</a></td></tr>';
		$no++;
    }?></table>*Klik nama tabel untuk melihat data</center>
	   
	<div id="footer">
		
	</div>

</div>

</body>
</html>
<?php
}
}else
{
	echo "Belum Login";
}
?>