<?php

include "db_connect.php";



$query=mysql_query("delete from grafik");

if($query){

?><script language="javascript">document.location.href="index.php";</script><?php

}else{

echo "gagal hapus data";

}

?>