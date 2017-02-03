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
       		<table border="0">
				<tr>
					<td><strong>NO</strong></td>
					<td><center><strong>Data Satu Variabel</strong></center></td>
				</tr>
		<?php
		$user_id = $_SESSION['id'];

		include "db_connect.php";
		$query = mysql_query("SELECT nama FROM tabel1 WHERE user_id='$user_id' group by nama "); // data digroup jadi yang sama akan tampil satu
		$no=1;
		while($r = mysql_fetch_array($query)){
			echo '<tr><td>'.$no.'</td><td><a href="/m/tampil1.php?nama='.$r['nama'].'">'.$r['nama'].'</a></td></tr>';
		$no++;
		}?>
			</table>
			* Klik nama tabel untuk melihat data</center>
		</div>
	</div>
	<?php }else{ ?>
		<?php include('auth/login.php');?>
	<?php } ?>
</div>
</body>
<?php include('common/footer.php') ?>
</html>