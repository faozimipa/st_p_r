<?php
include "db_connect.php";
$tanggal = gmdate("Y-m-d", time()+60*60*7);


if (isset($_POST['login'])) 
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $location = $_POST['location'];

   // die($_POST);
    
    $login = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password' AND is_aktif=1");
    $hasil = mysql_num_rows($login);
    $r = mysql_fetch_array($login);


    if ($hasil > 0)
    {
      session_start();
     
      $_SESSION['username'] = $r['username'];
      $_SESSION['password'] = $r['password'];
      $_SESSION['level']    = $r['level'];
      $_SESSION['id'] = $r['user_id'];
      $_SESSION['login'] = 1;
        if ($_SESSION['level'] == "admin") {
		  header('location:admin/index.php');
	    }else{
            header('location:/m/data.php');
        }
    }else{
        echo "<script> alert('Anda belum terdaftar atau pendaftaran Anda belum di ACC ');

              document.location='$location';

             </script>";
    }
   // header('location:'.$location);
}

?>