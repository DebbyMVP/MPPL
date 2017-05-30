<?php 
include "../../config/koneksi.php";
if (isset($_GET['id'])) {
	$id_gaji = $_GET['id'];
} else {
	die ("Error tidak ada kode yang dipilih");
}
	if (!empty($id_gaji) && $id_gaji != "") {
		$query = "DELETE FROM `t_gaji_pegawai` WHERE `id_gaji` = '$id_gaji';";
		$sql   = mysqli_query($koneksi,$query);
		if($sql){
			header("location:../media.php?page=tampil_gaji");
		} else {
			echo "data gagal terhapus";
		}
	}
 ?>