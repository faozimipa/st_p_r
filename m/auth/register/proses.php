<?php
/**
 * Created by PhpStorm.
 * User: FAOZI
 * Date: 1/28/2017
 * Time: 9:57 AM
 * Email: faozimipa@gmail.com
 */

include("./../../db_connect.php");

if(isset($_POST)){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $location = $_POST['location'];
    $nama = $_POST['nama_lengkap'];
    $asal = $_POST['asal'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $level = 'user';
    $is_aktif = 0;

    $query= mysql_query ("INSERT INTO user(username,password,level,nama,is_aktif,jenis_kelamin,asal,email)
    VALUES ('$username', '$password', '$level','$nama','$is_aktif','$jenis_kelamin','$asal','$email')",$connection)or die (mysql_error());

    if($query){
        echo "<script>
                alert('Pendaftaran berhasil. Tianggal menunggu ACC Admin');

                document.location='m/index.php';
              </script>";

    }else{
        echo "<script> alert('Pendaftaran Gagal. Silahkan diulangi');
                 document.location='$location';
                </script>";
        //header('location:'.$location);
    }
}else{
    header('location:m/auth/register/register.php');
}