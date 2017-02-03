<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT COUNT(*) FROM tabel3 where nama='$nama'");
$n = mysql_fetch_row($sql);
 
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlahy = 0;
while ($data = mysql_fetch_array($sql)){$jumlahy += $data['y'];}
$ratay = $jumlahy/$n[0];
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlahselisih2 = 0;
while ($data = mysql_fetch_array($sql)){$selisih = $data['y']-$ratay;$selisih2=$selisih*$selisih ;$jumlahselisih2 += $selisih2;}
$s = sqrt($jumlahselisih2/($n[0]-1));
?>
	
			<?php 
			include "db_connect.php";
			$nama= $_POST['nama'];
			$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama' order by y ASC");
			for ($i=1; $i <= $n[0] ; $i++)
			{$data = mysql_fetch_array($sql);$bilangany[$i] = $data['y'];
			$zhitung[$i] = ($bilangany[$i]-$ratay)/$s;
			$z[$i] = number_format($zhitung[$i],2,'.','');
			$sql1[$i] = mysql_query ("SELECT * FROM tabelz where zhitung='$z[$i]'");
			$jajal = mysql_fetch_array($sql1[$i]);$coba[$i]=$jajal['ztabel'];}
			?>
<div class="entry"><br>
				<div class="entry-title">Regresi Ganda 2 Variabel Independen</div><br>
				=======================================================================================<br><b><u>Uji Asumsi Normalitas dengan Uji Kolmogrof Smirnov</u></b><br>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT COUNT(*) FROM tabel3 where nama='$nama'");
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
$f= $n[0]-3;
$sql = mysql_query ("SELECT * FROM tabelf2 where n='$f'");
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
		$x1 = $_POST['x1'];
		$x2 = $_POST['x2'];
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
		echo "<b>E. Kesimpulan</b> : Karena nilai tertinggi mutlak Ft-Fs lebih kecil dari nilai tabel D maka Ho diterima, Jadi variabel ".$x1.",".$x2." dan variabel ".$y." berdistribusi normal<br>";
		else
		echo "<b>E. Kesimpulan</b> : Karena nilai tertinggi mutlak Ft-Fs lebih besar dari nilai tabel D maka Ho ditolak, Jadi variabel ".$x1.",".$x2." dan variabel ".$y." tidak berdistribusi normal<br>";
		?>
		=======================================================================================<br><b><u>Uji Asumsi Homogenitas</u></b><br>
			<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlahy = 0;
while ($data = mysql_fetch_array($sql)){$jumlahy += $data['y'];}
$ratay = $jumlahy/$n[0];
?>
		<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlahselisih2 = 0;
while ($data = mysql_fetch_array($sql)){$selisih = $data['y']-$ratay;$selisih2=$selisih*$selisih ;$jumlahselisih2 += $selisih2;}
$s = sqrt($jumlahselisih2/($n[0]-1));

?>
		<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlahbagi4 = 0;
while ($data = mysql_fetch_array($sql)){$selisih = $data['y']-$ratay; $bagi=$selisih/$s ;$bagi4 = $bagi*$bagi*$bagi*$bagi; $jumlahbagi4 += $bagi4;}
?>	
			<?php 
			$kurtosis = ((($n[0]*($n[0]+1))/(($n[0]-1)*($n[0]-2)*($n[0]-3)))*$jumlahbagi4)-((3*(($n[0]-1)*($n[0]-1)))/(($n[0]-2)*($n[0]-3)));
			?>
			
			<?php
		$x1 = $_POST['x1'];
		$x2 = $_POST['x2'];
		$y = $_POST['y'];
		echo "<b>A. Perhitungan</b><br>";
		echo "   nilai kurtosis = ".number_format($kurtosis,3,'.','')."<br>";
		echo "<b>B. Deskripsi Aumsi Homogenitas</b><br>";
		if (abs($kurtosis)<1.5)
		echo "Berdasar nilai kurtosis = ".number_format($kurtosis,3,'.','')." menunjukkan nilai yang tidak jauh dari nol, Jadi variabel ".$x1.",".$x2." dan variabel ".$y." bisa dikatakan cenderung homogen<br>";
		else
		echo "Berdasar nilai kurtosis = ".number_format($kurtosis,3,'.','')." menunjukkan nilai yang jauh dari nol, Jadi variabel ".$x1.",".$x2." dan variabel ".$y." bisa dikatakan cenderung tidak homogen<br>";
		?>
		=======================================================================================<br><b><u>Uji Multikolinieritas</u></b><br>
		<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlah1x = 0;
while ($data = mysql_fetch_array($sql)){$jumlah1x += $data['x1'];}
?>
		<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlah2x = 0;
while ($data = mysql_fetch_array($sql)){$jumlah2x += $data['x2'];}
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlah1x2 = 0;
while ($data = mysql_fetch_array($sql)){$x12 = $data['x1']*$data['x1'];$jumlah1x2 += $x12;}
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlah2x2 = 0;
while ($data = mysql_fetch_array($sql)){$x22 = $data['x2']*$data['x2'];$jumlah2x2 += $x22;}
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlahx1x2 = 0;
while ($data = mysql_fetch_array($sql)){$x1x2 = $data['x1']*$data['x2'];$jumlahx1x2 += $x1x2;}
?>
			
		<?php
		$r=(($n[0]*$jumlahx1x2)-($jumlah1x*$jumlah2x))/sqrt((($n[0]*$jumlah2x2)-(exp(2*log($jumlah2x))))*(($n[0]*$jumlah1x2)-(exp(2*log($jumlah1x)))));
		$r2 = $r*$r;
		$vif = 1/(1-$r2);
		echo "<b>A. Hipotesis</b><br>";
		echo "   H0 = Tidak terdapat multikolinieritas diantara variabel-variabel independen<br>";
		echo "   H1 = terdapat multikolinieritas diantara variabel-variabel independen<br>";
		echo "<b>B. Batas nilai VIF = 10</b><br>";
		echo "<b>C. Kriteria Pengujian</b><br>";
		echo "   Terima H0 jika nilai VIF kurang dari 10<br>";
		echo "<b>D. Perhitungan</b><br>";
		echo "Diperoleh nilai VIF = ".number_format($vif,3,'.','')."<br>";
		echo "<b>E. Kesimpulan</b><br>";
		if ($vif<10)
		echo "Karena nilai VIF = ".number_format($vif,3,'.','')." kurang dari 10, Jadi tidak terdapat multikolinieritas diantara variabel ".$x1." dan variabel ".$x2."<br>";
		else
		echo "Karena nilai VIF = ".number_format($vif,3,'.','')." lebih dari 10, Jadi terdapat multikolinieritas diantara variabel ".$x1." dan variabel ".$x2."<br>";
		
		?>
		=======================================================================================<br><b><u>Uji Autokorelasi</u></b><br>
			<?php  
			$jmlx12 = $jumlah1x2-(($jumlah1x*$jumlah1x)/$n[0]);
			?>
			<?php  
			$jmlx22 = $jumlah2x2-(($jumlah2x*$jumlah2x)/$n[0]);
			?>
					<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlahy = 0;
while ($data = mysql_fetch_array($sql)){$jumlahy += $data['y'];}
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlahy2 = 0;
while ($data = mysql_fetch_array($sql)){$y2 = $data['y']*$data['y'];$jumlahy2 += $y2;}
?>
			<?php  
			$jmly2 = $jumlahy2-(($jumlahy*$jumlahy)/$n[0]);
			?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlahx1y = 0;
while ($data = mysql_fetch_array($sql)){$x1y = $data['y']*$data['x1'];$jumlahx1y += $x1y;}
?>
			<?php  
			$jmlx1y=$jumlahx1y-(($jumlah1x*$jumlahy)/$n[0]);			
			?>
			<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jumlahx2y = 0;
while ($data = mysql_fetch_array($sql)){$x2y = $data['y']*$data['x2'];$jumlahx2y += $x2y;}
?>

			<?php  
			$jmlx2y=$jumlahx2y-(($jumlah2x*$jumlahy)/$n[0]);		
			?>
			<?php  
			$jmlx1x2=$jumlahx1x2-(($jumlah1x*$jumlah2x)/$n[0]);			
			?>
			<?php
			$x1 = $_POST['x1'];
			$x2 = $_POST['x2'];
			$y = $_POST['y'];
			$b1=(($jmlx22*$jmlx1y)-($jmlx2y*$jmlx1x2))/(($jmlx12*$jmlx22)-(exp(2*log($jmlx1x2))));
			$b2=(($jmlx12*$jmlx2y)-($jmlx1y*$jmlx1x2))/(($jmlx12*$jmlx22)-(exp(2*log($jmlx1x2))));
			$a=($jumlahy-($b1*$jumlah1x)-($b2*$jumlah2x))/$n[0];
		?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jmlet2 = 0;
for ($i=1; $i <= $n[0] ; $i++)
{$data = mysql_fetch_array($sql); $bilangan1x[$i] = $data['x1'];$bilangan2x[$i] = $data['x2'];$bilangany[$i] = $data['y'];$ytopi[$i] = $a + ($b1*$bilangan1x[$i])+ ($b2*$bilangan2x[$i]); $et[$i] = $ytopi[$i]-$bilangany[$i]; $et2[$i] = $et[$i]*$et[$i]; $jmlet2 += $et2[$i];}
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$et[0]=0;
for ($i=1; $i <= $n[0] ; $i++)
{$data = mysql_fetch_array($sql); $bilangan1x[$i] = $data['x1'];$bilangan2x[$i] = $data['x2'];$bilangany[$i] = $data['y'];$ytopi[$i] = $a + ($b1*$bilangan1x[$i])+ ($b2*$bilangan2x[$i]); $et[$i] = $ytopi[$i]-$bilangany[$i]; $et1[$i] = ($et[$i]-$et[$i-1]);$et12[$i] = $et1[$i]*$et1[$i];}
?>

		
		
		<?php
		$jmlet12 = 0;
		for ($i=2; $i <= $n[0] ; $i++)
		{$jmlet12 += $et12[$i];}
		?>
		<?php
		$dw = $jmlet12/$jmlet2;
		echo "<b>A. Hipotesis</b><br>";
		echo "   H0 = Tidak terdapat autokorelasi diantara variabel error<br>";
		echo "   H1 = terdapat autokorelasi diantara variabel error<br>";
		echo "<b>B. Kriteria Pengujian</b><br>";
		echo "   Terima H0 jika nilai DW/Durbin-Watson masih diantara -2 dan 2<br>";
		echo "<b>C. Perhitungan</b><br>";
		echo "Diperoleh nilai DW = ".number_format($dw,3,'.','')."<br>";
		echo "<b>D. Kesimpulan</b><br>";
		if (abs($dw)<2)
		echo "Karena nilai DW = ".number_format($dw,3,'.','')." diantara -2 dan 2, Jadi model regresi linier tidak terjadi autokorelasi<br>";
		else
		echo "Karena nilai DW = ".number_format($dw,3,'.','')." tidak diantara -2 dan 2, Jadi model regresi linier terjadi autokorelasi<br>";
		?>
		=======================================================================================<br><b><u>Uji Heteroskedastisitas</u></b><br>
		<form action="insertgrafik.php" method="post" name="form" onsubmit="return cekform()">
		<?php
		echo "<b>A. Perhitungan</b><br>";
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
for ($i=1; $i <= $n[0] ; $i++)
{$data = mysql_fetch_array($sql); $bilangan1x[$i] = $data['x1'];$bilangan2x[$i] = $data['x2'];$bilangany[$i] = $data['y'];$ytopi[$i] = $a + ($b1*$bilangan1x[$i])+ ($b2*$bilangan2x[$i]); $et[$i] = $ytopi[$i]-$bilangany[$i];}
?>
			<?php  
			$jumlahe = 0;
			$ratae = 0;
			for ($i=1; $i <= $n[0]; $i++) 
			{ $jumlahe += $et[$i]; $ratae = $jumlahe/$n[0];}
			?>
			<?php   
			$jumlahselisihe2 = 0; 
			for ($i=1; $i <= $n[0] ; $i++) 
			{ $selisihe[$i] = $et[$i]-$ratae; $selisihe2[$i]=$selisihe[$i]*$selisihe[$i] ;$jumlahselisihe2 += $selisihe2[$i];}
			?>
			<?php 
			$se = sqrt($jumlahselisihe2/($n[0]-1));
			?>
			<?php  
			$jumlahe = 0;
			$ratae = 0;
			for ($i=1; $i <= $n[0]; $i++) 
			{ $standarde[$i] = $et[$i]/$se;}
			?>
			<?php 
			echo "<table border=1>";
			echo "<tr><td>Tabel Standard Residuals</tr></td>";
			for ($i=1; $i <= $n[0]; $i++) 
			{ $standarde[$i] = $et[$i]/$se; echo "<tr><td>".$standarde[$i]."</tr></td>"; echo "<input type='hidden' name='standarde".$i."' value='".$standarde[$i]."' />";}
			echo "</table>";
			
			echo '<input type="submit" value="Lihat Grafik" name="login" />';
			echo "<input type='hidden' name='nama' value='".$nama."' />";
			echo "<input type='hidden' name='n' value='".$n[0]."' />";
			?>
			</form>
			Jika titik-titik yang terjadi cukup menyebar disekitar garis nol, ada yang diatas nol (bernilai positif) dan ada pula yang dibawah nol (bernilai negatif) maka varian error tidak terjadi heteroskedastisitas<br>
		=======================================================================================<br><b><u>Uji Hubungan / Uji Linieritas</u></b><br>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$jkr = 0;
for ($i=1; $i <= $n[0] ; $i++)
{$data = mysql_fetch_array($sql); $bilangan1x[$i] = $data['x1'];$bilangan2x[$i] = $data['x2'];$bilangany[$i] = $data['y'];$ytopi[$i] = $a + ($b1*$bilangan1x[$i])+ ($b2*$bilangan2x[$i]); $topibar[$i] = $ytopi[$i]-$ratay; $topibar2[$i] = $topibar[$i]*$topibar[$i]; $jkr += $topibar2[$i];}
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel3 where nama='$nama'");
$et[0]=0;
$jke = 0;
for ($i=1; $i <= $n[0] ; $i++)
{$data = mysql_fetch_array($sql); $bilangan1x[$i] = $data['x1'];$bilangan2x[$i] = $data['x2'];$bilangany[$i] = $data['y'];$ytopi[$i] = $a + ($b1*$bilangan1x[$i])+ ($b2*$bilangan2x[$i]); $yitopi[$i] = $bilangany[$i]-$ytopi[$i]; $yitopi2[$i] = $yitopi[$i]*$yitopi[$i]; $jke += $yitopi2[$i];}
?>		
		
		<?php
		$jkt = $jkr + $jke;
		$rkr = $jkr/2;
		$rke = $jke/($n[0]-3);
		$f = $rkr/$rke;
		?>
		<?php
		echo "<b>A. Hipotesis</b><br>";
		echo "   H0 = Persamaan adalah tidak linier atau tidak ada relasi antara variabel ".$x1." dan variabel ".$x2." terhadap variabel ".$y."<br>";
		echo "   H1 = Persamaan adalah linier atau ada relasi antara variabel ".$x1." dan variabel ".$x2." terhadap variabel ".$y."<br>";
		echo "<b>B. Taraf signifikan</b> 5% = 0.05<br>";
		echo "<b>C. Kriteria Pengujian</b><br>";
		echo "   Tolak H0 jika nilai F hitung lebih besar dari nilai F tabel, dan sebaliknya<br>";
		echo "<b>D. Perhitungan</b><br>";
		echo "a = ".number_format($a,3,'.','')."<br>";
		echo "b1 = ".number_format($b1,3,'.','')."<br>";
		echo "b2 = ".number_format($b2,3,'.','')."<br>";
		echo "Diperolel persamaan : Y = ".number_format($a,3,'.','')." + ".number_format($b1,3,'.','')." x + ".number_format($b2,3,'.','')." x<br>";
		echo "Didapat tabel perhitungan nilai Distribusi F<br>";
		echo "<table border =1 >";
		echo "<tr><td>Source</td><td>Jumlah Kuadrat</td><td>Derajat keb.</td><td>Rataan</td><td>F</td></tr>";
		echo "<tr><td>Regresi</td><td>".number_format($jkr,3,'.','')."</td><td>2</td><td>".number_format($rkr,3,'.','')."</td><td>".number_format($f,3,'.','')."</td></tr>";
		echo "<tr><td>Error</td><td>".number_format($jke,3,'.','')."</td><td>$n[0]-3</td><td>".number_format($rke,3,'.','')."</td><td></td></tr>";
		echo "<tr><td>Total</td><td>".number_format($jkt,3,'.','')."</td><td>$n[0]-1</td><td></td><td></td></tr>";
		echo "</table>";
		echo "   nilai tabel F dengan dk pembilang 2 dan penyebut n-3 = ".$dataf['f']." >>>>><a href='tabelf.php' target='_blank'> Lihat tabel F</a><br>";
		if ($f<$dataf['f'])
		echo "<b>E. Kesimpulan</b> : Karena nilai F hitung lebih kecil dari nilai tabel F maka Ho diterima, Jadi variabel ".$x1." dan variabel ".$x2." terhadap variabel ".$y." tidak ada relasi atau tidak linier<br>";
		else
		echo "<b>E. Kesimpulan</b> : Karena nilai F hitung lebih besar dari nilai tabel F maka Ho ditolak, Jadi variabel ".$x1." dan variabel ".$x2." terhadap variabel ".$y." ada relasi atau linier<br>";
		?>
		=======================================================================================<br><b><u>Uji Pengaruh</u></b><br>
		<?php
		$x1 = $_POST['x1'];
		$x2 = $_POST['x2'];
		$y = $_POST['y'];
		$r2=(($b1*$jmlx1y)+($b2*$jmlx2y))/$jmly2;
		
		$rsquare = number_format($r2,3,'.','');
		$rpersen = $rsquare*100;
		$rinpersen = 100-$rpersen;
		echo "<b>Interpretasi Hasil</b><br>";
		echo "Diperoleh nilai R square = ".$rsquare." atau ".$rpersen."%<br>";
		echo "Nilai tersebut menunjukkan bahwa variasi variabel ".$y." Y dapat diterangkan atau dijelaskan oleh variabel ".$x1." dan variabel ".$x2."  sebesar ".$rpersen."%. Dengan perkataan lain variabel X1 dan variabel X2 mempengaruhi variabel Y sebesar ".$rpersen."%, masih ada ".$rinpersen."% variabel Y dipengaruhi atau dapat diterangkan oleh variabel lain selain".$x1." dan variabel ".$x2."<br>";
		?>
			<br>
		</div>
	
</html>
