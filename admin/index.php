<?php
session_start();
if(isset($_SESSION['level'])){
if( $_SESSION['level']=="admin"){
include "db_connect.php";
error_reporting(0);
?>
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
<marquee>Selamat datang di Web Parametrik Online, silahkan untuk menginput, memproses dan menganalisis data Anda, Terima Kasih</marquee>
</div>
	<div id="menu">
		<ul>
			<li><a href="lihatdata1.php">Data 1 Variabel</a></li>
			<li><a href="lihatdata2.php">Data 2 Variabel</a></li>
			<li><a href="2lihatdata2.php">Data 2 Variabel tak Berpasangan</a></li>
			<li><a href="lihatdata3.php">Data 3 Variabel</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		</ul>
	</div>

	
	
				<div class="entry">
				<br>
			<center><div class="entry-title">Halaman Admin</div>
			<p>_________________________________________________________
			
			<br>Selamat Datang Sebagai Admin
		</div></center>


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