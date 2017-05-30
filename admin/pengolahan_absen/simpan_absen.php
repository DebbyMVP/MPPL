<?php 
include "../../config/koneksi.php";


//Deklarasi Variabel Input
$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal']:"";
$nip = isset($_POST['nip']) ? $_POST['nip']:"";
$kd_jabatan = isset($_POST['kd_jabatan']) ? $_POST['kd_jabatan']:"";
$jam_masuk = isset($_POST['jam_masuk']) ? $_POST['jam_masuk']:"";
$jam_keluar = isset($_POST['jam_keluar']) ? $_POST['jam_keluar']:"";
$keterangan = isset($_POST['keterangan']) ? $_POST['keterangan']:"";
if ($nip=="") {
    echo "Data Gagal Tersimpan";
} else {    
    // Simpan di Folder Gambar
                        $query = mysqli_query($koneksi,"INSERT INTO t_absen (tanggal, nip, kd_jabatan, jam_masuk, jam_keluar, keterangan ) 
                                    VALUES ('$tanggal','$nip','$kd_jabatan','$jam_masuk','$jam_keluar','$keterangan')") or die (mysqli_error($koneksi));
                          echo "<meta http-equiv='refresh' content='0; url=../media.php?page=tampil_absen'>";
                          ?>
                             <script language="JavaScript">
                             alert('Data Berhasil Disimpan');
                             document.location='../media.php?page=tampil_absen';
                             </script>
                              <?php  
                    
 } 
?>