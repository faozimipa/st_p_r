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
			Data Dua Variabel tak Berpasangan
		</div>
		<div class="panel-body">
        <table border="1"><tr><td>kelompok 1</td><td>kelompok 2</td></tr>
	    <tr><td>
		<?php
    //file siswa.php
	include "db_connect.php";
    $kelas = $_GET['nama'];
    $query = mysql_query("select * from tabelt1 where nama='".$kelas."'");
    while($siswa = mysql_fetch_array($query)){
    	echo '<table><tr><td>'.$siswa['x'].'</td></tr></table>';
    }?></td><td>
	 <?php
    //file siswa.php
	include "db_connect.php";
    $kelas = $_GET['nama'];
    $query = mysql_query("select * from tabelt2 where nama='".$kelas."'");
    while($siswa = mysql_fetch_array($query)){
    	echo '<table><tr><td>'.$siswa['x'].'</td></tr></table>';
    }?>
	</td></tr></table>
		</div>
	</div>
	<?php }else{ ?>
		<?php include('auth/login.php');?>
	<?php } ?>
</div>
</body>
<?php include('common/footer.php') ?>
</html>

