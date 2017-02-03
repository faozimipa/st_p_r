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
			<li><a href="anggota.php">My Profil</a></li>
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
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahy = 0;
while ($data = mysql_fetch_array($sql)){$jumlahy += $data['y'];}
$ratay = $jumlahy/$n[0];
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahselisih2 = 0;
while ($data = mysql_fetch_array($sql)){$selisih = $data['y']-$ratay;$selisih2=$selisih*$selisih ;$jumlahselisih2 += $selisih2;}
$s = sqrt($jumlahselisih2/($n[0]-1));
?>
		<?php 
			
			include "db_connect.php";
			$nama= $_POST['nama'];
			$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama' order by y ASC");
			for ($i=1; $i <= $n[0] ; $i++)
			{$data = mysql_fetch_array($sql);$bilangany[$i] = $data['y'];
			$zhitung[$i] = ($bilangany[$i]-$ratay)/$s;
			$z[$i] = number_format($zhitung[$i],2,'.','');
			$sql1[$i] = mysql_query ("SELECT * FROM tabelz where zhitung='$z[$i]'");
			$jajal = mysql_fetch_array($sql1[$i]);$coba[$i]=$jajal['ztabel'];}

			?>

	<div class="entry"><br>
				<div class="entry-title">Regresi Sederhana </div><br>
				=======================================================================================<br><b><u>Uji Asumsi Normalitas dengan Uji Kolmogrof Smirnov</u></b><br>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT COUNT(*) FROM tabel2 where nama='$nama'");
$n = mysql_fetch_row($sql);
?>
			<?php
include "db_connect.php";
$d= $n[0];
$sql = mysql_query ("SELECT * FROM tabeld where n='$d'");
$cek = mysql_num_rows($sql);
if($cek>0) {
$datad  = mysql_fetch_array($sql);
}
?>
<?php
include "db_connect.php";
$f= $n[0]-2;
$sql = mysql_query ("SELECT * FROM tabelf1 where n='$f'");
$cek = mysql_num_rows($sql);
if($cek>0) {
$dataf  = mysql_fetch_array($sql);
}
?>
			<?php
			for ($i=1; $i <= $n[0] ; $i++)
			{$fs[$i] = $i/$n[0];}
			?>
			<?php  
			$d = 0;
			for ($i=1; $i <= $n[0] ; $i++) 
			{ $normal[$i] = $coba[$i]-$fs[$i]; $absd[$i] = abs($normal[$i]);}
			?>		
			<?php
		$x = $_POST['x'];
		$y = $_POST['y'];
		$d = max($absd);
		echo "<b>A. Hipotesis</b><br>";
		echo "   H0 = Data berdistribusi normal<br>";
		echo "   H1 = Data tidak berdistribusi normal<br>";
		echo "<b>B. Taraf signifikan</b> 5% = 0.05<br>";
		echo "<b>C. Kriteria Pengujian</b><br>";
		echo "   Terima H0 jika nilai tertinggi mutlak Ft-Fs lebih kecil dari nilai tabel D, dan sebaliknya<br>";
		echo "<b>D. Perhitungan</b><br>";
		echo "<table border =1 >";
			echo "<tr> <td>Ft</td><td>Fs</td><td>Ft-Fs</td></tr>";
			for ($i = 1; $i <= $n[0]; $i++) 
			{echo "<tr><td>$coba[$i]</td><td>$fs[$i]</td><td>$absd[$i]</td></tr>"; }
		echo "</table>";
		echo "   nilai tertinggi mutlak Ft-Fs = ".number_format($d,3,'.','')."<br>";
		echo "   nilai tabel D = ".$datad['d']." >>>>><a href='tabeld.php' target='_blank'> Lihat tabel D</a><br>";
		if ($d<$datad['d'])
		echo "<b>E. Kesimpulan</b> : Karena nilai tertinggi mutlak Ft-Fs lebih kecil dari nilai tabel D maka Ho diterima, Jadi variabel ".$x." dan variabel ".$y." berdistribusi normal<br>";
		else
		echo "<b>E. Kesimpulan</b> : Karena nilai tertinggi mutlak Ft-Fs lebih besar dari nilai tabel D maka Ho ditolak, Jadi variabel ".$x." dan variabel ".$y." tidak berdistribusi normal<br>";
		?>
		=======================================================================================<br><b><u>Uji Asumsi Homogenitas</u></b><br>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahy = 0;
while ($data = mysql_fetch_array($sql)){$jumlahy += $data['y'];}
$ratay = $jumlahy/$n[0];
?>
		<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahselisih2 = 0;
while ($data = mysql_fetch_array($sql)){$selisih = $data['y']-$ratay;$selisih2=$selisih*$selisih ;$jumlahselisih2 += $selisih2;}
$s = sqrt($jumlahselisih2/($n[0]-1));
?>
		<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahbagi4 = 0;
while ($data = mysql_fetch_array($sql)){$selisih = $data['y']-$ratay; $bagi=$selisih/$s ;$bagi4 = $bagi*$bagi*$bagi*$bagi; $jumlahbagi4 += $bagi4;}
?>	
			<?php 
			$kurtosis = ((($n[0]*($n[0]+1))/(($n[0]-1)*($n[0]-2)*($n[0]-3)))*$jumlahbagi4)-((3*(($n[0]-1)*($n[0]-1)))/(($n[0]-2)*($n[0]-3)));
			?>
			<?php
		$x = $_POST['x'];
		$y = $_POST['y'];
		echo "<b>A. Perhitungan</b><br>";
		echo "   nilai kurtosis = ".number_format($kurtosis,3,'.','')."<br>";
		echo "<b>B. Deskripsi Aumsi Homogenitas</b><br>";
		if (abs($kurtosis)<1.5)
		echo "Berdasar nilai kurtosis = ".number_format($kurtosis,3,'.','')." menunjukkan nilai yang tidak jauh dari nol, Jadi variabel ".$x." dan variabel ".$y." bisa dikatakan cenderung homogen<br>";
		else
		echo "Berdasar nilai kurtosis = ".number_format($kurtosis,3,'.','')." menunjukkan nilai yang jauh dari nol, Jadi variabel ".$x." dan variabel ".$y." bisa dikatakan cenderung tidak homogen<br>";
		?>
		=======================================================================================<br><b><u>Uji Hubungan / Uji Linieritas</u></b><br>
			<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahx = 0;
while ($data = mysql_fetch_array($sql)){$jumlahx += $data['x'];}
$ratax = $jumlahx/$n[0];
$jumlahx2=$jumlahx*$jumlahx;
?>
			<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahx2 = 0;
while ($data = mysql_fetch_array($sql)){$x2 = $data['x']*$data['x'];$jumlahx2 += $x2;}
?>	
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahxy = 0;
while ($data = mysql_fetch_array($sql)){$xy = $data['x']*$data['y'];$jumlahxy += $xy;}
?>	
			<?php
		$x = $_POST['x'];
		$y = $_POST['y'];
		$b=(($n[0]*$jumlahxy)-($jumlahx*$jumlahy))/(($n[0]*$jumlahx2)-(exp(2*log($jumlahx))));
		$a=($jumlahy/$n[0])-($b*($jumlahx/$n[0]));
		?>
					<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jkr = 0;
while ($data = mysql_fetch_array($sql)){$ytopi = $a + ($b*$data['x']); $topibar = $ytopi-$ratay; $topibar2 = $topibar*$topibar; $jkr += $topibar2;}

?>
	<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jke = 0;
while ($data = mysql_fetch_array($sql)){$ytopi = $a + ($b*$data['x']); $yitopi = $data['y']-$ytopi; $yitopi2 = $yitopi*$yitopi; $jke += $yitopi2;}

?>
		<?php
		$jkt = $jkr + $jke;
		$rkr = $jkr/1;
		$rke = $jke/($n[0]-2);
		$f = $rkr/$rke;
		?>
		<?php
		echo "<b>A. Hipotesis</b><br>";
		echo "   H0 = Persamaan adalah tidak linier atau tidak ada relasi antara variabel ".$x." dan variabel ".$y."<br>";
		echo "   H1 = Persamaan adalah linier atau ada relasi antara variabel ".$x." dan variabel ".$y."<br>";
		echo "<b>B. Taraf signifikan</b> 5% = 0.05<br>";
		echo "<b>C. Kriteria Pengujian</b><br>";
		echo "   Tolak H0 jika nilai F hitung lebih besar dari nilai F tabel, dan sebaliknya<br>";
		echo "<b>D. Perhitungan</b><br>";
		echo "a = ".number_format($a,3,'.','')."<br>";
		echo "b = ".number_format($b,3,'.','')."<br>";
		echo "Diperolel persamaan : Y = ".number_format($a,3,'.','')." + ".number_format($b,3,'.','')." x<br>";
		echo "Didapat tabel perhitungan nilai Distribusi F<br>";
		echo "<table border =1 >";
		echo "<tr><td>Source</td><td>Jumlah Kuadrat</td><td>Derajat keb.</td><td>Rataan</td><td>F</td></tr>";
		echo "<tr><td>Regresi</td><td>".number_format($jkr,3,'.','')."</td><td>1</td><td>".number_format($rkr,3,'.','')."</td><td>".number_format($f,3,'.','')."</td></tr>";
		echo "<tr><td>Error</td><td>".number_format($jke,3,'.','')."</td><td>$n[0]-2</td><td>".number_format($rke,3,'.','')."</td><td></td></tr>";
		echo "<tr><td>Total</td><td>".number_format($jkt,3,'.','')."</td><td>$n[0]-1</td><td></td><td></td></tr>";
		echo "</table>";
		echo "   nilai tabel F dengan dk pembilang 1 dan penyebut n-2 = ".$dataf['f']." >>>>><a href='tabelf.php' target='_blank'> Lihat tabel F</a><br>";
		if ($f<$dataf['f'])
		echo "<b>E. Kesimpulan</b> : Karena nilai F hitung lebih kecil dari nilai tabel F maka Ho diterima, Jadi variabel ".$x." dan variabel ".$y." tidak ada relasi atau tidak linier<br>";
		else
		echo "<b>E. Kesimpulan</b> : Karena nilai F hitung lebih besar dari nilai tabel F maka Ho ditolak, Jadi variabel ".$x." dan variabel ".$y." ada relasi atau linier<br>";
		?>
		=======================================================================================<br><b><u>Uji Pengaruh</u></b><br>
		<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahy2 = 0;
while ($data = mysql_fetch_array($sql)){$y2 = $data['y']*$data['y'];$jumlahy2 += $y2;}
?>		
		<?php
		$x = $_POST['x'];
		$y = $_POST['y'];
		$r=(($n[0]*$jumlahxy)-($jumlahx*$jumlahy))/sqrt((($n[0]*$jumlahx2)-(exp(2*log($jumlahx))))*(($n[0]*$jumlahy2)-(exp(2*log($jumlahy)))));
		$r2 = $r*$r;
		$rsquare = number_format($r2,3,'.','');
		$rpersen = $rsquare*100;
		$rinpersen = 100-$rpersen;
		echo "<b>Interpretasi Hasil</b><br>";
		echo "Diperoleh nilai R square = ".$rsquare." atau ".$rpersen."%<br>";
		echo "Nilai tersebut menunjukkan bahwa variasi variabel ".$y." Y dapat diterangkan atau dijelaskan oleh variabel ".$x." X sebesar ".$rpersen."%. Dengan perkataan lain variabel X mempengaruhi variabel Y sebesar ".$rpersen."%, masih ada ".$rinpersen."% variabel Y dipengaruhi atau dapat diterangkan oleh variabel lain selain ".$x."<br>";
		?>
			<br>
		</div>
			
		
		

	<div id="footer">
		
	</div>

</div>

</body>
</html>
