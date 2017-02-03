<?php
/**
 * Created by PhpStorm.
 * User: FAOZI
 * Date: 1/15/2017
 * Time: 7:38 AM
 * Email: faozimipa@gmail.com
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('./../../common/header.php') ?>
</head>
<body>
<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading">
           <h5 class="panel-title">Menu Pendaftaran</h5>
        </div>
        <div class="panel-body">
            <form action="http://<?= $_SERVER['SERVER_NAME']; ?>/m/auth/register/proses.php" id="form_register" method="POST">
                <input type="hidden" name="location" value="<?= $_SERVER['SCRIPT_NAME']; ?>">
                <!-- START INPUT DATA DIRI -->
                <h5>Data <span class="semi-bold">Diri</span></h5>
                <div class="form-group-attached">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap"
                                       id="nama_lengkap" placeholder="Masukan Nama Lengkap "
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" data-init-plugin="select2"
                                        class="form-control full-width" required>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="asal">Asal</label>
                                <input type="text" name="asal" id="asal" placeholder="Masukan Asal daerah Anda"
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END INPUT DATA DIRI -->
                <!-- START INPUT DATA AKUN -->
                <h5 class="p-t-15">Data <span class="semi-bold">Akun</span></h5>
                <div class="form-group-attached">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default ">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Masukkan alamat email Anda"
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="username">Username</label>
                                <input type="username" name="username" id="username" placeholder="Masukkan Username"
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default form-group-attached">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password"
                                       placeholder="Minimal 6 karakter dan 1 angka"
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default form-group-attached">
                                <label for="password_conf">Konfirmasi Password</label>
                                <input type="password" name="password_conf" id="password_conf"
                                       placeholder="Ketik ulang password Anda"
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END INPUT DATA AKUN -->

                <button class="btn btn-primary btn-cons m-t-10 btn-raised" type="submit">Daftar</button>
            </form>
        </div>

    </div>
</div>
</body>
<?php include('./../../common/footer.php') ?>
<script>
    $(document).ready(function () {

        $("#form_register").validate({
            rules: {
                nama_lengkap: {
                    required: true
                },
                email:{
                    required:true,
                    email: true
                },
                asal: {
                  required:true,
                },
                username: {
                  minlength:6
                },
                password: {
                    minlength: 6
                },
                password_conf: {
                    minlength : 6,
                    equalTo : '[name="password"]'
                }
            },
            messages: {
                nama_lengkap: {
                    required: "Mohon Masukan nama Lengkap Anda"
                },
                email:{
                    required:"Mohon masukan email Anda",
                    email:"Isikan dengan format email"
                },
                asal: {
                  required:"Mohon isikan asal daerah Anda"
                },
                username:{
                    required:"Mohon isi Username",
                    minlenth:"Minimal username 6 karakter"
                },
                password: {
                    required: "Mohon masukkan password Anda"
                },
                password_conf: {
                    equalTo : "Password harus sama"
                }
            }
        });
    });
</script>
</html>
