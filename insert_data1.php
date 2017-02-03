<?php
include "db_connect.php";
//$tanggal = gmdate("Y-m-d", time()+60*60*7);
$n = $_POST['n'];
for ($i=1; $i <= $n ; $i++)
{$nama = $_POST['nama']; $i;$bilanganx[$i] = $_POST['datax'.$i];

$query=mysql_query ("INSERT INTO tabel1(nama, data, x)
VALUES ('$nama', '$i', '$bilanganx[$i]')",$connection)or die (mysql_error());}
if($query) {
?>
<?php
?>
<script language="JavaScript">
document.location='index.php'</script>
<?php
}
?>