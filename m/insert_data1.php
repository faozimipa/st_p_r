<?php
include "db_connect.php";
//session_start();
//$tanggal = gmdate("Y-m-d", time()+60*60*7);
$n = $_POST['n'];
for ($i=1; $i <= $n ; $i++)
{
    $nama = $_POST['nama'];
    $user_id =  $_POST['user_id'];
    $i;$bilanganx[$i] = $_POST['datax'.$i];

$query=mysql_query ("INSERT INTO tabel1(nama, user_id, data, x)
VALUES ('$nama','$user_id', '$i', '$bilanganx[$i]')",$connection)or die (mysql_error());}
if($query) {
?>
<?php
?>
<script language="JavaScript">
document.location='/m/ujit1.php'</script>
<?php
}
?>