<?php
/**
 * Created by PhpStorm.
 * User: FAOZI
 * Date: 1/28/2017
 * Time: 11:01 AM
 * Email: faozimipa@gmail.com
 */
?>
<?php
session_start();
if(isset($_SESSION['level'])){
if( $_SESSION['level']=="admin"){
include "db_connect.php";
    if(isset($_POST['is_aktif'])){
        $is_aktif = $_POST['is_aktif'];
        $id = $_POST['id'];
        $location = $_POST['location'];

        $query=mysql_query("UPDATE user SET is_aktif = '$is_aktif' WHERE user_id='$id'");

       // header('location:'.$location);
    }
//error_reporting(0);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Statistika Parametrik</title>
        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    </head>

    <body>

    <div id="wrapper">

        <div id="header">
            <h1>Parametrik Jitu</h1>
            <h2>Memecahkan Masalah Data Statistik Anda...</h2>
        </div>
        <div id="jalan2">
            <marquee>Selamat datang di Aplikasi Parametrik Jitu, silahkan untuk menginput, memproses dan menganalisis data Anda, Terima Kasih</marquee>
        </div>
        <div id="menu">
            <ul>
                <li><a href="acc.php">ACC</a></li>
                <li><a href="lihatdata1.php">1 Variabel</a></li>
                <li><a href="lihatdata2.php"> 2 Variabel</a></li>
                <li><a href="2lihatdata2.php">2 Variabel tak Berpasangan</a></li>
                <li><a href="lihatdata3.php">3 Variabel</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>



        <div class="entry">
            <div class="entry-title">Daftar User yang belum ACC</div><br>
                <center>
                <table border="1">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>ACC</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $query = mysql_query("select * from user");
                    $no=1;
                    while($r = mysql_fetch_array($query)){
                        ?><tr>
                            <td><?= $no; ?></td>
                            <td><?= $r['nama']; ?> </td>
                            <td><?= $r['username']; ?></td>
                            <td><?= ($r['is_aktif']==1)?'Aktif':'Non Aktif'; ?></td>
                            <td>
                                <form action="" method="POST" name="ubah">
                                    <input type="hidden" name="location" value="<?= $_SERVER['SCRIPT_NAME']; ?>">
                                    <input type="hidden" name="is_aktif" value="<?= ($r['is_aktif']==1)?0:1 ?> ">
                                    <input type="hidden" name="id" value="<?= $r['user_id'];?>">
                                    <input type="submit" value="Ubah">
                                </form>
                            </td>
                        </tr>
                       <?php
                        $no++;
                    }?>
                    </table>
                </center>
            </div>
            <div id="footer">

            </div>

        </div>

    </body>
    </html>
<?php
}
}else
{
    echo "Belum Login";
}
?>
