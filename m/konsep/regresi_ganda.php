<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('../common/header.php'); ?>
</head>
<body>
<div class="container">
    <div class="panel panel-info">
  <div class="panel-heading"><h2>Regresi  Ganda</h2></div>        
    <div class="panel-body">
            <p class="text">
            Analisis regresi linier berganda adalah hubungan secara linear antara dua atau lebih variabel independen (X1, X2,….Xn) dengan variabel dependen (Y). Analisis ini untuk mengetahui arah hubungan antara variabel independen dengan variabel dependen apakah masing-masing variabel independen berhubungan positif atau negatif dan untuk memprediksi nilai dari variabel dependen apabila nilai variabel independen mengalami kenaikan atau penurunan. Data yang digunakan biasanya berskala interval atau rasio. Persamaan Regresi Linear Ganda Model regresi linear ganda atas   akan ditaksir oleh </p>
            <center><img src="http://<?= $_SERVER['SERVER_NAME']; ?>/3.png" class="img img-responsive"></img></center>
            <p class="text"> Dengan a0,a1,a2,...,ak  merupakan korfisien-koefisien yang harus ditentukan berdasarkan data hasil pengamatan. Analisis regresi linear berganda memerlukan pengujian secara serempak dengan menggunakan F hitung. Signifikansi ditentukan dengan membandingkan F hitung dengan F tabel atau melihat signifikansi pada output SPSS. </p>
            <p class="text">Pengujian asumsi klasik regresi linier ganda:</p>
            <p class="text"> 1. Uji Normalitas</p>
            <p class="text"> 2. Uji Homogenitas</p>
            <p class="text"> 3. Uji Multikolinieritas</p>
            <p class="text"> 4. Uji Autokorelasi</p>
            <p class="text"> 5. Uji Heteroskedastisitas</p>

    </div>
    </div>
    <a href="http://<?= $_SERVER['SERVER_NAME']; ?>/m/konsep"class="sesuatu btn btn-primary btn-fab">
        <i class="material-icons">home</i>
    </a>
</div>
<?php include ('../common/footer.php'); ?>
