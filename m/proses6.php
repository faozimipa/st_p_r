<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
				<div class="entry">
				<br>
				<div class="entry-title">Uji T Berpasangan</div><br>
				<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT COUNT(*) FROM tabel2 where nama='$nama'");
$n = mysql_fetch_row($sql);
?>
<?php
include "db_connect.php";
$t= $n[0]-1;
$sql = mysql_query ("SELECT * FROM tabelt where n='$t'");
$cek = mysql_num_rows($sql);
if($cek>0) {
$tabel  = mysql_fetch_array($sql);
}
?>	
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahx = 0;
while ($data = mysql_fetch_array($sql)) { $jumlahx += $data['x'];}
$ratax=$jumlahx/$n[0];
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahy = 0;
while ($data = mysql_fetch_array($sql)) { $jumlahy += $data['y'];}
$ratay=$jumlahy/$n[0];
?>		
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahd = 0;
while ($data = mysql_fetch_array($sql)) {$d=$data['y']-$data['x'];$jumlahd += $d;}
$dbar = $jumlahd/$n[0];
?>
<?php
include "db_connect.php";
$nama= $_POST['nama'];
$sql = mysql_query ("SELECT * FROM tabel2 where nama='$nama'");
$jumlahselisih2 = 0;
while ($data = mysql_fetch_array($sql)) {$d=$data['y']-$data['x'];$selisih = $d-$dbar; $selisih2=$selisih*$selisih ;$jumlahselisih2 += $selisih2;}
$s = sqrt($jumlahselisih2/($n[0]-1));
?>	
					
		<?php
		$x = $_POST['x'];
		$t= abs(($dbar)/($s/sqrt($n[0])));
		echo "<b>A. Hipotesis</b><br>";
		echo "   H0 = rataan variabel ".$x." untuk kelas kontrol / sebelum perlakuan dan kelas eksperimen / setelah perlakuan adalah sama<br>";
		echo "   H1 = rataan variabel ".$x." untuk kelas kontrol / sebelum perlakuan dan kelas eksperimen / setelah perlakuan adalah beda<br>";
		echo "<b>B. Taraf signifikan</b> 5% = 0.05<br>";
		echo "<b>C. Kriteria Pengujian</b><br>";
		echo "   Tolak H0 jika nilai mutlak t hitung lebih besar dari t tabel, dan sebaliknya<br>";
		echo "<b>D. Perhitungan</b><br>";
		echo "   Rataan variabel ".$x." untuk kelas kontrol / sebelum perlakuan =".$ratax."<br>";
		echo "   Rataan variabel ".$x." untuk kelas eksperimen / setelah perlakuan =".$ratay."<br>";
		echo "   nilai mutlak t hitung = ".number_format($t,3,'.','');
		echo "<br>";
		echo "   nilai tabel t uji 2 pihak dengan taraf signifikan 0.05 dan dk n-1 = ".$tabel['t']." >>>>><a href='tabelt.php' target='_blank'> Lihat tabel t</a><br>";
		echo "<b>E. Kesimpulan</b><br>";
		if (abs($t)>$tabel['t'])
		echo " Karena nilai mutlak t hitung lebih besar dari t tabel maka Ho ditolak, Jadi rataan variabel ".$x." untuk kelas kontrol / sebelum perlakuan dan kelas eksperimen / setelah perlakuan adalah beda<br>";
		else
		echo " Karena nilai mutlak t hitung lebih kecil dari t tabel maka Ho diterima, Jadi rataan variabel ".$x." untuk kelas kontrol / sebelum perlakuan dan kelas eksperimen / setelah perlakuan adalah sama<br>";
		?>
			<br>
		
		</div>

</html>
