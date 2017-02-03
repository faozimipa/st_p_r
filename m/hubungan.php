<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('common/header.php') ?>
</head>
<body>
<div class="container">
<?php if(isset($_SESSION['login'])){ ?>

	<a class="btn btn-block btn-raised btn-info" href="m/korelasi.php">Korelasi 2 Variabel</a>
	<a class="btn btn-block btn-raised btn-info" href="m/regresi1.php">Regresi Sederhana</a>
	<a class="btn btn-block btn-raised btn-info" href="m/regresi2.php">Regresi Ganda 2 Variabel Independen</a>

<?php }else{ ?>
	<?php include('auth/login.php');?>
<?php } ?>
</div>
</body>
<?php include('common/footer.php') ?>
</html>
