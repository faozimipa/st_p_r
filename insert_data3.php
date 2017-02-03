<?php
include "db_connect.php";
//$tanggal = gmdate("Y-m-d", time()+60*60*7);
$n = $_POST['n'];
for ($i=1; $i <= $n ; $i++)
{$nama = $_POST['nama']; $i;$bilangan1x[$i] = $_POST['data1x'.$i];$bilangan2x[$i] = $_POST['data2x'.$i]; $bilangany[$i] = $_POST['datay'.$i];

$query=mysql_query ("INSERT INTO tabel3(nama, data, x1,x2, y)
VALUES ('$nama', '$i', '$bilangan1x[$i]','$bilangan2x[$i]', '$bilangany[$i]')",$connection)or die (mysql_error());}
if($query) {
?>
<?php
?>
<script language="JavaScript">
document.location='index.php'</script>
<?php
}
?>