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
			<center><div class="entry-title">Data Dua Variabel tak Berpasangan</div><br>
        <table border="1"><tr><td>kelompok 1</td><td>kelompok 2</td></tr>
	    <tr><td>
		<?php
    //file siswa.php
	include "db_connect.php";
    $kelas = $_GET['nama'];
    $query = mysql_query("select * from tabelt1 where nama='".$kelas."'");
    while($siswa = mysql_fetch_array($query)){
    	echo '<table><tr><td>'.$siswa['x'].'</td></tr></table>';
    }?></td><td>
	 <?php
    //file siswa.php
	include "db_connect.php";
    $kelas = $_GET['nama'];
    $query = mysql_query("select * from tabelt2 where nama='".$kelas."'");
    while($siswa = mysql_fetch_array($query)){
    	echo '<table><tr><td>'.$siswa['x'].'</td></tr></table>';
    }?>
	</td></tr></table></center>
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