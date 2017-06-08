<?php 
include "../config/koneksi.php";
error_reporting(1);
$foto = isset($_POST['foto']) ? $_POST['foto']:"";
$fileName = $_FILES['foto']['name'];
$namafolder="../../gambar/";

if (!empty($_FILES["foto"]["tmp_name"]))
            {
                $jenis_gambar=$_FILES['foto']['type'];
                if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
                {           
                    $gambar = $namafolder . basename($_FILES['foto']['name']);       
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $gambar)) {
                        $query = mysqli_query($koneksi,"INSERT INTO gambar (kd_gambar,nama) 
                                    VALUES ('$fileName')") or die (mysqli_error($koneksi));
                          echo "<meta http-equiv='refresh' content='0; url=media.php?page=home'>";
                          ?>
                             <script language="JavaScript">
                             alert('Data Berhasil Disimpan');
                             document.location='../media.php?page=home';
                             </script>
                              <?php  
                    } else {
                       echo "Gambar gagal dikirim";
                    }}
 } 
?>