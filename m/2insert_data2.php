<?php
include "db_connect.php";
$tanggal = gmdate("Y-m-d", time()+60*60*7);
$n1 = $_POST['n1']; 
$n2 = $_POST['n2'];
for ($i=1; $i <= $n1 ; $i++)
{$nama = $_POST['nama']; $i;$bilanganx[$i] = $_POST['datax'.$i]; 

mysql_query ("INSERT INTO tabelt1(nama, data, x, tanggal)
VALUES ('$nama', '$i', '$bilanganx[$i]', '$tanggal')",$connection)or die (mysql_error());}


for ($i=1; $i <= $n2 ; $i++)
{$nama = $_POST['nama']; $i;$bilangany[$i] = $_POST['datay'.$i]; 

$query=mysql_query ("INSERT INTO tabelt2(nama, data, x, tanggal)
VALUES ('$nama', '$i', '$bilangany[$i]', '$tanggal')",$connection)or die (mysql_error());}
if($query) {
?>
<?php
?>
<script language="JavaScript">
document.location='index.php'</script>
<?php
}
?>