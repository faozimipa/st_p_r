<?php
include "db_connect.php";
$n = $_POST['n'];
for ($i=1; $i <= $n ; $i++)
{$nama = $_POST['nama']; $i;$standarde[$i] = $_POST['standarde'.$i];

$query=mysql_query ("INSERT INTO grafik(nama, data, x)
VALUES ('$nama', '$i', '$standarde[$i]')",$connection)or die (mysql_error());}
if($query) {
?>
<script language="JavaScript">
document.location='grafik.php'</script>
<?php
}
?>