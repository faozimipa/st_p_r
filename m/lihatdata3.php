<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('common/header.php') ?>
</head>
<body>
<div class="container">
	<?php if(isset($_SESSION['login'])){ ?>
	<div class="panel panel-info">
		<div class="panel-heading">
			Daftar nama tabel yang sudah ada
		</div>
		<div class="panel-body">
       <table border="1"><tr><td><center>No</center></td><td><center>Data Tiga Variabel</center></td></tr>
		<?php
    //file kelas.php
	include "db_connect.php";
    $query = mysql_query("select nama from tabel3 group by nama"); // data digroup jadi yang sama akan tampil satu
    $no=1;
	while($kelas = mysql_fetch_array($query)){
    	echo '<tr><td>'.$no.'</td><td><a href="/m/tampil3.php?nama='.$kelas['nama'].'">'.$kelas['nama'].'</a></td></tr>';
    $no++;
	}?></table>*Klik nama tabel untuk melihat data
		</div>
	</div>
	<?php }else{ ?>
		<?php include('auth/login.php');?>
	<?php } ?>
</div>
</body>
<?php include('common/footer.php') ?>
</html>