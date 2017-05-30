<?php 
include "../../config/koneksi.php";

$kd_pengajuan = isset($_GET['kd_pengajuan']) ? $_GET['kd_pengajuan']:"";
$nip = isset($_GET['nip']) ? $_GET['nip']:"";
$tanggal_cuti = isset($_GET['tanggal_cuti']) ? $_GET['tanggal_cuti']:"";
$nama_bagian = isset($_GET['nama_bagian']) ? $_GET['nama_bagian']:"";


if ($kd_pengajuan=="" || $kd_pengajuan == "") {
	echo "Data Gagal Tersimpan";
} else {
	$tidak_setujui = mysqli_query($koneksi,"UPDATE `t_pengajuan_cuti` SET `status` = 'Ditolak' WHERE `kd_pengajuan` = '$kd_pengajuan'; ") or die (mysqli_error($koneksi));
	 	?>
 <script language="JavaScript">
 alert('Cuti Telah Ditolak');
 document.location='../media.php?page=tampil_pengajuan_cuti';
 </script>

 <?php  
 }
 ?>