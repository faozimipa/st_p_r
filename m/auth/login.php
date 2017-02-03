<?php
/**
 * Created by PhpStorm.
 * User: FAOZI
 * Date: 1/15/2017
 * Time: 7:38 AM
 * Email: faozimipa@gmail.com
 */

?>

    <center><div class="entry-title">Login Admin</div><br>
        <form action="http://<?= $_SERVER['SERVER_NAME']; ?>/m/insert_login.php" method="post" name="form" onsubmit="return cekform()">
            <input type="hidden" name="location" value="<?= $_SERVER['SCRIPT_NAME']; ?>">
            <table width="301">
                <tr align="left" valign="middle">
                    <td><strong>Username</strong></td>
                    <td>:</td>
                    <td><label for="username"></label>
                        <input type="text" name="username" id="username" class="login-inp" /></td>
                </tr>
                <tr align="left" valign="middle">
                    <td><strong>Password</strong></td>
                    <td>:</td>
                    <td><label for="password"></label>
                        <input type="password" name="password" id="password" class="login-inp"/></td>
                </tr>
            </table>

            <br>
            <input type="submit" class="btn btn-success btn-raised" value="LOGIN" name="login" onClick="close_window();return false;" />
        </form>
        <div class="text text-warning">
            Mendaftar  <a href="http://<?= $_SERVER['SERVER_NAME']; ?>/m/auth/register/register.php">di sini</a>
        </div>
    </center>



