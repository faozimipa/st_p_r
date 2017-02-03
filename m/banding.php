<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('common/header.php') ?>
</head>
<body>
	<div class="container">
<?php if(isset($_SESSION['login'])){ ?>
	<a class="btn btn-block btn-raised btn-info" href="m/ujit1.php">Uji Banding Satu Sampel</a>
	<a class="btn btn-block btn-raised btn-info" href="m/paired.php">Uji Banding Sampel Berpasangan</a>
	<a class="btn btn-block btn-raised btn-info" href="m/independen.php">Uji Banding Dua Sampel Tidak Berpasangan</a>
<?php }else{ ?>
		<?php include('auth/login.php');?>
<?php } ?>
	</div>
</body>
<?php include('common/footer.php') ?>
</html>
