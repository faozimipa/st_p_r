<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('../common/header.php'); ?>
</head>
<body>
<div class="container">
    <div class="panel panel-info">
  <div class="panel-heading"><h2>Uji T 2 Sampel Takberpasangan</h2></div>        
    <div class="panel-body">
            <p class="text">
                Menurut Sukestiyarno, uji T tidak berpasangan atau sering diistilakan dengan Independent sample t-test adalah jenis uji statistika yang bertujuan untuk membandingkan rata-rata dua grup yang tidak saling berpasangan atau saling bebas. Tidak saling berpasangan dapat diartikan bahwa penelitian dilakukan untuk dua subjek sampel yang berbeda. 
             </p>
             <p class="text">
                Prinsip pengujian uji ini adalah melihat perbedaan variasi kedua kelompok data, sehingga sebelum dilakukan pengujian, terlebih dahulu harus diketahui apakah variannya sama (equal variance) atau variannya berbeda (unequal variance). 
             </p>
             <p class="text">
                Homogenitas varian diuji berdasarkan rumus: 
             </p>
            <center><img src="http://<?= $_SERVER['SERVER_NAME']; ?>/homo.PNG" class="img img-responsive"></center>
            <center><img src="http://<?= $_SERVER['SERVER_NAME']; ?>/kethomo.PNG" class="img img-responsive"></center>
            <p class="text">
                Bentuk varian kedua kelompok data akan berpengaruh pada nilai standar error yang akhirnya akan membedakan rumus pengujiannya. Terdapat dua buah rumus t-test yang dapat digunakan. Untuk varian yang sama (equal variance) menggunakan rumus Polled Varians:
            </p>
            <center><img src="http://<?= $_SERVER['SERVER_NAME']; ?>/sama.PNG" class="img img-responsive"></center>
            <p class="text">
                Uji t untuk varian yang berbeda (unequal variance) menggunakan rumus Separated Varians:
            </p>
            <center><img src="http://<?= $_SERVER['SERVER_NAME']; ?>/beda.PNG" class="img img-responsive"></center>
    </div>
    </div>
    <a href="http://<?= $_SERVER['SERVER_NAME']; ?>/m/konsep"class="sesuatu btn btn-primary btn-fab">
        <i class="material-icons">home</i>
    </a>
</div>
<?php include ('../common/footer.php'); ?>
