<?php 
include "../../config/koneksi.php";
if (isset($_GET['id'])) {
	$kd_jabatan = $_GET['id'];
	$query = "SELECT * FROM t_jabatan where kd_jabatan= '$kd_jabatan'";
	$hasil = mysqli_query($koneksi,$query);
	$data  = mysqli_fetch_array($hasil);
} else {
	die ("Error tidak ada kode yang dipilih");
}
	if (!empty($kd_jabatan) && $kd_jabatan != "") {
		$query = "DELETE FROM t_jabatan where kd_jabatan = '$kd_jabatan'";
		$sql   = mysqli_query($koneksi,$query);

		if($sql){
			header("location:../media.php?page=tampil_jabatan");
		} else {
			echo "data gagal terhapus";
		}
	}
 ?>