<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<?php include('common/header.php') ?>
</head>
<body>
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Uji T Tidak Berpasangan</h3>
		</div>
		<div class="panel-body">
			<form method="post" action="proses5.php">
			<table>
				<tr><td>Masukkan Nama Tabel</td>
				<td>

					<select name="nama" id="nama" class="form-control  selectTable " data-init-plugin="select2">
						<?php

						session_start();
						include("db_connect.php");
						$user_id = $_SESSION['id'];
						$query = mysql_query("select DISTINCT t1.nama as nama FROM tabel1 t1, tabel2 t2 WHERE t1.nama=t2.nama AND t1.user_id=$user_id");

						while($row = mysql_fetch_array($query)){
							?>
							<option value="<?= $row['nama'];?>"><?= $row['nama'];?></option>
							<?php
						}

						?>
					</select>

				</td></tr>
				<tr><td colspan="2">*Jika tabel tidak ada, Masukkan data pada menu Data</td></tr>
				<tr><td colspan="2">Masukkan Nama Variabel</td></tr>
				<tr><td>Kelompok 1</td><td><input name="x" id="x" class="form-control"></td></tr>
				<tr><td>Kelompok 2</td><td><input name="y" id="y"  class="form-control"></td></tr>
				</table>
			<input type="submit" class="btn btn btn-info btn-raised" name="submit" value="Submit" /> </form>
			</form>
		</div>
	</div>
	<a href="http://<?= $_SERVER['SERVER_NAME']; ?>/m/banding.php" class="sesuatu btn btn-primary btn-fab">
		<i class="material-icons">home</i>
	</a>
</div>
</body>
<?php include('common/footer.php') ?>
</html>
