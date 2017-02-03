<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('common/header.php') ?>
</head>
<body>
<div class="container">
    <?php if(isset($_SESSION['login'])){ ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            Upload Data Dua Variabel
        </div>
        <div class="panel-body">
			Contoh Format Tabel di Excel<br><img src="baru.png"></img><br>NB : Nama tabel harus yang belum ada atau yang belum tersimpan di aplikasi ini, untuk melihat daftar nama tabel yang sudah ada klik pilihan "Lihat data" pada menu "Data"
<br><br>
		<?php
//koneksi ke database, username,password  dan namadatabase menyesuaikan 
mysql_connect('localhost', 'root', '');
mysql_select_db('ta');
 
//memanggil file excel_reader
require "excel_reader.php";
 
//jika tombol import ditekan
if(isset($_POST['submit'])){
 
    $target = basename($_FILES['filepegawaiall']['name']) ;
    move_uploaded_file($_FILES['filepegawaiall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
   // $tanggal = gmdate("Y-m-d", time()+60*60*7);
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $nama           = $data->val($i, 1);
      $no   = $data->val($i, 2);
      $x  = $data->val($i, 3);
	  $y  = $data->val($i, 4);
 
//      setelah data dibaca, masukkan ke tabel pegawai sql
      $query = "INSERT into tabel2 (nama,data,x,y)values('$nama','$no','$x','$y')";
      $hasil = mysql_query($query);
    }
    
    if(!$hasil){
//          jika import gagal
          die(mysql_error());
      }else{
//          jika impor berhasil
          echo "Data berhasil diimpor.";
    }
    
//    hapus file xls yang udah dibaca
    unlink($_FILES['filepegawaiall']['name']);
}
 
?>
 
<form name="myForm" id="myForm" onSubmit="return validateForm()" action="importdata2.php" method="post" enctype="multipart/form-data">
    <input type="file" id="filepegawaiall" name="filepegawaiall" />
    <input type="submit" name="submit" value="Upload" /><br/>
</form>
 
<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filepegawaiall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>
		* Format file harus .xls
        </div>
    </div>
    <?php }else{ ?>
        <?php include('auth/login.php');?>
    <?php } ?>
</div>
</body>
<?php include('common/footer.php') ?>
</html>