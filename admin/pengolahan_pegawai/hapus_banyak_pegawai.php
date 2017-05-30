<?php
include '../../config/koneksi.php';
error_reporting(1);
$cekbox = $_POST['cekbox'];
if ($cekbox) {
	
    foreach ($cekbox as $value) {
    	$hasil = mysqli_query($koneksi,"SELECT `foto` FROM t_pegawai WHERE `nip`= '$value'");
    	$foto = mysqli_fetch_array($hasil);
    	$gambar = $foto['foto'];
        mysqli_query($koneksi,"DELETE FROM t_pegawai WHERE nip = '$value'");
        unlink('../../gambar/'.$gambar);
    }
    echo '<script>alert("Berhasil Menghapus Data."); window.location="../media.php?page=hapus_pegawai"</script>';
}  else {
    echo '<script>alert("anda belum memilih data."); window.location="../media.php?page=hapus_pegawai"</script>';
}
?>