<?php 
include "../../config/koneksi.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM users where id= '$id'";
	$hasil = mysqli_query($koneksi,$query);
	$data  = mysqli_fetch_array($hasil);
} else {
	die ("Error tidak ada kode yang dipilih");
}
	if (!empty($id) && $id != "") {
		$query = "DELETE FROM users where id = '$id'";
		$sql   = mysqli_query($koneksi,$query);

		if($sql){
			header("location:../media.php?page=tampil_admin");
		} else {
			echo "data gagal terhapus";
		}
	}
 ?>