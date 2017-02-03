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
				<div class="entry-title">Uji T Satu Sampel</div>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT COUNT(*) FROM tabel1 where nama='$nama'");
$n = mysql_fetch_row($sql);
?>
<br>
<?php
include "db_connect.php";
$d= $n[0]-1;
$sql = mysql_query ("SELECT * FROM tabelt where n='$d'");
$cek = mysql_num_rows($sql);
if($cek>0) {
$tabel  = mysql_fetch_array($sql);
}
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel1 where nama='$nama'");
$jumlahx = 0;
while ($data = mysql_fetch_array($sql)) { $jumlahx += $data['x'];}
$rata=$jumlahx/$n[0];
?>

<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel1 where nama='$nama'");
$jumlahselisih2 = 0;
while ($data = mysql_fetch_array($sql)) {
$selisih = $data['x']-$rata; $selisih2=$selisih*$selisih ;$jumlahselisih2 += $selisih2;}
$s = sqrt($jumlahselisih2/($n[0]-1));
?>

			<?php
		$u = $_POST['u'];
		$x = $_POST['x'];
		$t = ($rata-$u)/($s/sqrt($n[0]));
		echo "<b>A. Hipotesis</b><br>";
		echo "   H0 = Rataan variabel ".$x." sama dengan rataan asumsi populasi ".$u."<br>";
		echo "   H1 = Rataan variabel ".$x." tidak sama dengan rataan asumsi populasi ".$u."<br>";
		echo "<b>B. Taraf signifikan</b> 5% = 0.05<br>";
		echo "<b>C. Kriteria Pengujian</b><br>";
		echo "   Tolak H0 jika nilai mutlak t hitung lebih besar dari t tabel, dan sebaliknya<br>";
		echo "<b>D. Perhitungan</b><br>";
		echo "   Rataan variabel ".$x." = ".$rata."<br>";
		echo "   t hitung = ".number_format($t,3,'.','');
		echo "<br>";
		echo "   nilai tabel t uji 2 pihak dengan taraf signifikan 0.05 dan dk (n-1=$n[0]-1) = ".$tabel['t']." >>>>><a href='tabelt.php' target='_blank'> Lihat tabel t</a><br>";
		if (abs($t)> $tabel['t'])
		echo "<b>E. Kesimpulan</b> : Karena nilai mutlak t hitung lebih besar dari t tabel maka Ho ditolak, Jadi rataan variabel ".$x." tidak sama dengan rataan asumsi populasi ".$u."<br>";
		else
		echo "<b>E. Kesimpulan</b> : Karena nilai mutlak t hitung lebih kecil dari t tabel maka Ho diterima, Jadi rataan variabel ".$x." sama dengan rataan asumsi populasi ".$u."<br>";
		?>
			<br>
		
		</div>


	<div id="footer">
		
	</div>

</div>

</body>
</html>
