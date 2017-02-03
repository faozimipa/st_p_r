<?php
/**
 * Created by PhpStorm.
 * User: FAOZI
 * Date: 1/15/2017
 * Time: 8:27 AM
 * Email: faozimipa@gmail.com
 */
session_start();
session_destroy();
echo "<script>document.write('Kamu sudah keluar dari halaman member!'); window.location = '../index.php'</script>";
