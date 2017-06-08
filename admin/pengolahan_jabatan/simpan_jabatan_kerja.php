<?php 
include "../../config/koneksi.php";

$kd_jabatan = isset($_POST['kd_jabatan']) ? $_POST['kd_jabatan']:"";
$nama_jabatan = isset($_POST['nama_jabatan']) ? $_POST['nama_jabatan']:"";
$tunjangan_jabatan = isset($_POST['tunjangan_jabatan']) ? $_POST['tunjangan_jabatan']:"";


if ($kd_jabatan=="" || $nama_jabatan == "") {
	echo "Data Gagal Tersimpan";
} else {
	$query = mysqli_query($koneksi,"INSERT INTO t_jabatan (kd_jabatan,nama_jabatan,tunjangan_jabatan) 
		values ('$kd_jabatan','$nama_jabatan','$tunjangan_jabatan')") or die (mysqli_error($koneksi));
 	?>
 <script language="JavaScript">
 alert('Data Berhasil Disimpan');
 document.location='../media.php?page=tampil_jabatan';
 </script>

 <?php  
 }
 ?>