<?php

include "db_connect.php";

$username=$_GET['nama'];


$query=mysql_query("delete from tabel1 where nama='$username'");

if($query){

?><script language="javascript">document.location.href="lihatdata1.php";</script><?php

}else{

echo "gagal hapus data";

}

?>