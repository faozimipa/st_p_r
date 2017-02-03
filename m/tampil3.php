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
			Data Tiga Variabel
		</div>
		<div class="panel-body">
       <table border="1"><tr><td>data X1</td><td>data X2</td><td>data Y</td></tr>
	    <?php
    //file siswa.php
	include "db_connect.php";
    $kelas = $_GET['nama'];
    $query = mysql_query("select * from tabel3 where nama='".$kelas."'");
    while($siswa = mysql_fetch_array($query)){
    	echo '<tr><td>'.$siswa['x1'].'</td><td>'.$siswa['x2'].'</td><td>'.$siswa['y'].'</td></tr>';
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

