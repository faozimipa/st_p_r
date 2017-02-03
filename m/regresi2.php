<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('common/header.php') ?>
</head>
<body>
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Regresi Ganda 2 Variabel Independen</h3>
		</div>
		<div class="panel-body">
		<form method="post" action="proses7.php">
				<table>
			<tr><td>Masukkan Nama Tabel</td>
			<td>
				<select name="nama" id="nama" class="form-control selectTable " data-init-plugin="select2">
				<?php

					session_start();
					include_once("db_connect.php");
					$user_id = $_SESSION['id'];
					$query = mysql_query("SELECT DISTINCT nama, COUNT(nama) as total FROM tabel3 WHERE user_id=$user_id GROUP BY nama");

					while($row = mysql_fetch_array($query)){
						?>
						<option value="<?= $row['nama'];?>"><?= $row['nama'];?> n= <?= $row['total'] ?></option>
						<?php
					}

					?>
				</select>
			</td></tr>
			<tr><td colspan="2">*Jika tabel tidak ada, Masukkan data pada menu Data</td></tr>
			<tr><td>Masukkan Nama Variabel X1</td> 
			<td><input name="x1" id="x1" class="form-control"></td></tr>
			<tr><td>Masukkan Nama Variabel X2</td> 
			<td><input name="x2" id="x2" class="form-control"></td></tr>
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
