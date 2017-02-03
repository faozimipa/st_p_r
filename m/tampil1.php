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
			Data Satu Variabel
		</div>
		<div class="panel-body">
       <table border="1"><tr><td><center>data X</center></td></tr>
	    <?php
	include "db_connect.php";
    $kelas = $_GET['nama'];
    $query = mysql_query("select * from tabel1 where nama='".$kelas."'");
    while($siswa = mysql_fetch_array($query)){
    	echo '<tr><td>'.$siswa['x'].'</td></tr>';
    }?></table>
		</div>
	</div>
	<?php }else{ ?>
		<?php include('auth/login.php');?>
	<?php } ?>
</div>
</body>
<?php include('common/footer.php') ?>
</html>