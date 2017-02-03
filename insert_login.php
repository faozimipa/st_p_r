<?php
include "db_connect.php";
$username = $_POST['username'];
$password = $_POST['password'];
$tanggal = gmdate("Y-m-d", time()+60*60*7);


if (isset($_POST['login'])) 
{
    include "db_connect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $login = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    $hasil = mysql_num_rows($login);
    $r = mysql_fetch_array($login);
    
    if ($hasil > 0)
    {
      session_start();
     
      $_SESSION['username'] = $r['username'];
      $_SESSION['password'] = $r['password'];
      $_SESSION['level']    = $r['level'];
      $_SESSION['nama'] = $r['nama'];
      $_SESSION['id'] = $r['user_id'];
        if ($_SESSION['level'] == "admin") {
		  header('location:admin/index.php');
	  }else{
            header('location:index.php');
        }
    }
    else{ echo "<script>alert('Presensi masuk anda belum berhasil, masukkan NIP/NIS dan Password anda dengan benar')</script>";
		  }				?>
						<script language="JavaScript">
						document.location='index.php'</script>
						<?php
}
?>