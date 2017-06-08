<?php 
include "../../config/koneksi.php";


//Deklarasi Variabel Input

$id = isset($_POST['id']) ? $_POST['id']:"";
$username = isset($_POST['username']) ? $_POST['username']:"";
$password = isset($_POST['password']) ? $_POST['password']:"";
$pass_md5 = md5($password);
$nama = isset($_POST['nama']) ? $_POST['nama']:"";
$email = isset($_POST['email']) ? $_POST['email']:"";
$level = isset($_POST['level']) ? $_POST['level']:"";
$foto = isset($_POST['foto']) ? $_POST['foto']:"";
$nip = isset($_POST['nip']) ? $_POST['nip']:"";
$pass = sha1($password);


//Validasi jika ada data input yang kosong
if ($id=="") {
	echo "Data Gagal Tersimpan";
} else {	
	$query = mysqli_query($koneksi,"INSERT INTO `pegawai`.`users` (`id`, `username`, `password`, `nama`, `email`, `level`, `foto`, `nip`) VALUES ('$id', '$username', '$pass', '$nama', '$email', '$level', '$foto', '$nip');") or die (mysqli_error($koneksi));
?>
	 <script language="JavaScript">
		 alert('Data Berhasil Disimpan');
		 document.location='../media.php?page=tampil_admin';
	 </script>
	  <?php
 }
?>



