<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('common/header.php') ?>
</head>
<body>
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Uji Korelasi</h3>
		</div>
		<div class="panel-body">
				<form method="post" action="proses3.php">
				<table>
					<tr><td>Masukkan Nama Tabel</td>
					<td>
				<select name="nama" id="nama" class="form-control selectTable " data-init-plugin="select2">
					<?php

					session_start();
					include("db_connect.php");
					$user_id = $_SESSION['id'];
					$query = mysql_query("SELECT DISTINCT nama, COUNT(nama) as total FROM tabel2 WHERE user_id=$user_id GROUP BY nama");

					while($row = mysql_fetch_array($query)){
						?>
						<option value="<?= $row['nama'];?>"><?= $row['nama'];?> n= <?= $row['total'] ?></option>
						<?php
					}

					?>
				</select>
				</td></tr>
				<tr><td colspan="2">*Jika tabel tidak ada, Masukkan data pada menu Data</td></tr>
				<tr><td>Masukkan Nama Variabel X</td>
				<td><input name="x" id="x" class="form-control"></td></tr>
				<tr><td>Masukkan Nama Variabel Y</td>
				<td><input name="y" id="y" class="form-control"></td></tr>
				</table>
					<input type="submit" name="submit" class="btn btn btn-info btn-raised" value="Submit" />
				</form>
		</div>
	</div>
	<a href="http://<?= $_SERVER['SERVER_NAME']; ?>/m/hubungan.php" class="sesuatu btn btn-primary btn-fab">
		<i class="material-icons">home</i>
	</a>
</div>
</body>
<?php include('common/footer.php') ?>
</html>
