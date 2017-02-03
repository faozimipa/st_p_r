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
			<li><a href="anggota.php">My Profile</a></li>
			<li><a href="bantuan.php">Bantuan</a></li>
		</ul>
		</ul>
	</div>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT COUNT(*) FROM tabel2 where nama='$nama'");
$n = mysql_fetch_row($sql);
?>
<?php
include "db_connect.php";
$d= $n[0];
$sql = mysql_query ("SELECT * FROM tabelr where n='$d'");
$cek = mysql_num_rows($sql);
if($cek>0) {
$tabel  = mysql_fetch_array($sql);
}
?>

	
				<div class="entry">
				<br>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jajal[0]=0;
for ($i=1; $i <= $n[0] ; $i++)
{$data = mysql_fetch_array($sql);$jajal[$i] = $data['x']; }
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahx = 0;
$jumlahy = 0;
$jumlahx2 = 0;
$jumlahy2 = 0;
$jumlahxy = 0;
while ($data = mysql_fetch_array($sql)){$jumlahx += $data['x'];$jumlahy += $data['y'];$x2=$data['x']*$data['x']; $jumlahx2 += $x2; $y2=$data['y']*$data['y']; $jumlahy2 += $y2; $xy =$data['x']*$data['y'];$jumlahxy += $xy;}
?>
	
	
				<div class="entry-title">Korelasi 2 Variabel</div><br>
			
		<?php
		$x = $_POST['x'];
		$y = $_POST['y'];
		$r=(($n[0]*$jumlahxy)-($jumlahx*$jumlahy))/sqrt((($n[0]*$jumlahx2)-(exp(2*log($jumlahx))))*(($n[0]*$jumlahy2)-(exp(2*log($jumlahy)))));
		$r2 = $r*$r;
		$rsquare = $r2*100;
		echo "=======================================================================================<br>";
		echo "<b>A. Hipotesis</b><br>";
		echo "   H0 = Hubungan antara variabel ".$x." dan variabel ".$y." lemah<br>";
		echo "   H1 = Hubungan antara variabel ".$x." dan variabel ".$y." kuat<br>";
		echo "<b>B. Taraf signifikan</b> 5% = 0.05<br>";
		echo "<b>C. Kriteria Pengujian</b><br>";
		echo "   Tolak H0 jika nilai mutlak r hitung lebih besar dari r tabel, dan sebaliknya<br>";
		echo "<b>D. Perhitungan</b><br>";
		echo "<img src='r.png'></img><br>";
		echo "Didapat n=".$n[0]."; jumlah Xi=".$jumlahx."; jumlah Yi=".$jumlahy."; jumlah X2i=".$jumlahx2."; jumlah Y2i=".$jumlahy2."; jumlah XiYi=".$jumlahxy."<br>"; 
		echo "   r hitung = ".number_format($r,3,'.','')."<br>";
		echo "   r tabel = ".$tabel['r']." >>>>><a href='tabel.php' target='_blank'> Lihat r tabel</a><br>";
		echo "   R square = ".number_format($r2,3,'.','')."<br>";
		if (abs($r)>$tabel['r'])
		echo "<b>E. Kesimpulan</b> : Karena nilai mutlak r hitung lebih besar dari r tabel maka Ho ditolak, Jadi Hubungan antara variabel ".$x." dan variabel ".$y." kuat ";
		else
		echo "<b>E. Kesimpulan</b> : Karena nilai mutlak r hitung lebih kecil dari r tabel maka Ho diterima, Jadi Hubungan antara variabel ".$x." dan variabel ".$y." lemah ";
		echo "dengan besar hubungan sebesar ".number_format($rsquare,1,'.','')."%";
		?>
			<br>
		</div>


	<div id="footer">
		
	</div>

</div>

</body>
</html>
