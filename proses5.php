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
			<li><a href="taufiq.php">My Profile</a></li>
			<li><a href="bantuan.php">Bantuan</a></li>
		</ul>
		</ul>
	</div>


	
	
				<div class="entry">
				<br>
				<div class="entry-title">Uji T Tidak Berpasangan</div><br>
		=======================================================================================<br><b><u>Uji Asumsi Homogenitas</u></b><br>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT COUNT(*) FROM tabelt1 where nama='$nama'");
$n1 = mysql_fetch_row($sql);
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT COUNT(*) FROM tabelt2 where nama='$nama'");
$n2 = mysql_fetch_row($sql);
?>
		<?php
include "db_connect.php";
$v1= $n1[0]-1;
$v2= $n2[0]-1;
$sql = mysql_query ("SELECT * FROM tabelf where v1='$v1' and v2='$v2'");
$cek = mysql_num_rows($sql);
if($cek>0) {
$dataf  = mysql_fetch_array($sql);
}
?>	
<?php
include "db_connect.php";
$t= $n1[0]+$n2[0]-2;
$sql = mysql_query ("SELECT * FROM tabelt where n='$t'");
$cek = mysql_num_rows($sql);
if($cek>0) {
$tabel  = mysql_fetch_array($sql);
}
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabelt1 where nama='$nama'");
$jumlahx = 0;
while ($datax = mysql_fetch_array($sql)) { $jumlahx += $datax['x'];}
$ratax=$jumlahx/$n1[0];
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabelt1 where nama='$nama'");
$jumlahselisihx2 = 0;
while ($datax = mysql_fetch_array($sql)) {
$selisihx = $datax['x']-$ratax; $selisihx2=$selisihx*$selisihx ;$jumlahselisihx2 += $selisihx2;}
$s1 = sqrt($jumlahselisihx2/($n1[0]-1));
$v1 = $s1*$s1;
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabelt2 where nama='$nama'");
$jumlahy = 0;
while ($datay = mysql_fetch_array($sql)) { $jumlahy += $datay['x'];}
$ratay=$jumlahy/$n2[0];
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabelt2 where nama='$nama'");
$jumlahselisihy2 = 0;
while ($datay = mysql_fetch_array($sql)) {
$selisihy = $datay['x']-$ratay; $selisihy2=$selisihy*$selisihy ;$jumlahselisihy2 += $selisihy2;}
$s2 = sqrt($jumlahselisihy2/($n2[0]-1));
$v2 = $s2*$s2;
?>
		
			
			<?php
		$x = $_POST['x'];
		$y = $_POST['y'];
		if ($s1>$s2)
		{$f = $s1/$s2;}
		else
		{$f = $s2/$s1;}
		echo "<b>A. Hipotesis</b><br>";
		echo "   H0 = Kedua kelompok homogen atau varian sama<br>";
		echo "   H1 = Kedua kelompok tidak homogen atau varian tidak sama<br>";
		echo "<b>B. Taraf signifikan</b> = 0.05 = 5%<br>";
		echo "<b>C. Kriteria Pengujian</b><br>";
		echo "   Terima H0 jika nilai F hitung kurang dari F tabel<br>";
		echo "<b>D. Perhitungan</b><br>";
		echo "Diperoleh nilai standard deviasi kelompok 1 = ".number_format($s1,3,'.','')."<br>";
		echo "Diperoleh nilai standard deviasi kelompok 2 = ".number_format($s2,3,'.','')."<br>";
		echo "Diperoleh nilai F hitung = std besar / std kecil = ".number_format($f,3,'.','')."<br>";
		echo "nilai tabel F dengan taraf signifikan 0.05, dk pembilang n1-1 dan dk penyebut n2-1 = ".$dataf['f']." >>>>><a href='tabelf.php' target='_blank'> Lihat tabel F</a><br>";
		echo "<b>E. Kesimpulan</b><br>";
		if ($f<$dataf['f'])
		echo "Karena nilai F hitung lebih kecil dari nilai tabel F maka Ho diterima, Jadi Kedua kelompok homogen atau varian sama<br>";
		else
		echo "Karena nilai F hitung lebih besar dari nilai tabel F maka Ho ditolak, Jadi Kedua kelompok tidak homogen atau varian tidak sama<br>";
		
		?>
		=======================================================================================<br><b><u>Uji Banding</u></b><br>
			<?php
			$s12 = sqrt((($v1*($n1[0]-1))+($v2*($n2[0]-1)))/($n1[0]+$n2[0]-2));
			
			?>
			<?php
		if ($f<$dataf['f'])
		{$t = ($ratax-$ratay)/($s12*sqrt((1/$n1[0])+(1/$n2[0])));}
		else
		{$t = ($ratax-$ratay)/sqrt(($v1/$n1[0])+($v2/$n2[0]));}
		?>
		<?php
		$x = $_POST['x'];
		$y = $_POST['y'];	
		echo "<b>A. Hipotesis</b><br>";
		echo "   H0 = rataan antara variabel ".$x." dan variabel ".$y." sama<br>";
		echo "   H1 = rataan antara variabel ".$x." dan variabel ".$y." beda<br>";
		echo "<b>B. Taraf signifikan</b> 5% = 0.05<br>";
		echo "<b>C. Kriteria Pengujian</b><br>";
		echo "   Tolak H0 jika nilai mutlak t hitung lebih besar dari t tabel, dan sebaliknya<br>";
		echo "<b>D. Perhitungan</b><br>";
		echo "   Rataan variabel ".$x." = ".$ratax."<br>";
		echo "   Rataan variabel ".$y." = ".$ratay."<br>";
		if ($f<$dataf['f'])
		{echo "Karena kedua kelompok homogen maka digunakan rumus :<br><img src='t2.png'></img><br>";}
		else
		{echo "Karena kedua kelompok tidak homogen maka digunakan rumus :<br><img src='t1.png'></img><br>";}
		echo "   t hitung = ".number_format($t,3,'.','');
		echo "<br>";
		echo "   nilai tabel t uji 2 pihak dengan taraf signifikan 0.05 dan dk n1+n2-2 = ".$tabel['t']." >>>>><a href='tabelt.php' target='_blank'> Lihat tabel t</a><br>";
		if (abs($t)>$tabel['t'])
		echo "<b>E. Kesimpulan</b> : Karena nilai mutlak t hitung lebih besar dari t tabel maka Ho ditolak, Jadi rataan antara variabel ".$x." dan variabel ".$y." beda<br>";
		else
		echo "<b>E. Kesimpulan</b> : Karena nilai mutlak t hitung lebih kecil dari t tabel maka Ho diterima, Jadi rataan antara variabel ".$x." dan variabel ".$y." sama<br>";
		?>
			<br>
		
		</div>


	<div id="footer">
		
	</div>

</div>

</body>
</html>
