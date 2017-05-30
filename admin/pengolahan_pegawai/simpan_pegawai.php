<?php 
include "../../config/koneksi.php";


//Deklarasi Variabel Input

$nip = isset($_POST['nip']) ? $_POST['nip']:"";
$kd_jabatan = isset($_POST['kd_jabatan']) ? $_POST['kd_jabatan']:"";
$kd_bank = isset($_POST['kd_bank']) ? $_POST['kd_bank']:"";
$no_rek = isset($_POST['no_rek']) ? $_POST['no_rek']:"";
$s_kerja = isset($_POST['s_kerja']) ? $_POST['s_kerja']:"";
$tgl_masuk = isset($_POST['tgl_masuk']) ? $_POST['tgl_masuk']:"";
$tgl_berakhir = isset($_POST['tgl_berakhir']) ? $_POST['tgl_berakhir']:"";
$no_ktp = isset($_POST['no_ktp']) ? $_POST['no_ktp']:"";
$npwp = isset($_POST['npwp']) ? $_POST['npwp']:"";
$nama = isset($_POST['nama']) ? $_POST['nama']:"";
$tempat_lahir = isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir']:"";
$tgl_lahir = isset($_POST['tgl_lahir']) ? $_POST['tgl_lahir']:"";
$alamat = isset($_POST['alamat']) ? $_POST['alamat']:"";
$n_hp = isset($_POST['n_hp']) ? $_POST['n_hp']:"";
$jk = isset($_POST['jk']) ? $_POST['jk']:"";
// $tunjangan_jabatan = isset($_POST['tunjangan_jabatan']) ? $_POST['tunjangan_jabatan']:"";
$foto = isset($_POST['foto']) ? $_POST['foto']:"";
$fileName = $_FILES['foto']['name'];
$namafolder="../../gambar/";
//Validasi jika ada data input yang kosong
if ($nip=="") {
	echo "Data Gagal Tersimpan";
} else {	
	// Simpan di Folder Gambar

		if (!empty($_FILES["foto"]["tmp_name"]))
			{
			    $jenis_gambar=$_FILES['foto']['type'];
			    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
			    {           
			        $gambar = $namafolder . basename($_FILES['foto']['name']);       
			        if (move_uploaded_file($_FILES['foto']['tmp_name'], $gambar)) {
			        	$query = mysqli_query($koneksi,"INSERT INTO t_pegawai (nip, nama, s_kerja, tgl_masuk, tgl_berakhir, no_ktp, npwp
			        		, kd_bank, no_rek, kd_jabatan, n_hp, jk, tempat_lahir, tgl_lahir, alamat, foto) 
									VALUES ('$nip','$nama','$s_kerja','$tgl_masuk','$tgl_berakhir','$no_ktp','$npwp','$kd_bank','$no_rek','$kd_jabatan','$n_hp',
										    '$jk','$tempat_lahir', '$tgl_lahir', '$alamat','$fileName')") or die (mysqli_error($koneksi));
			              echo "<meta http-equiv='refresh' content='0; url=../media.php?page=tampil_pegawai'>";
			              ?>
							 <script language="JavaScript">
							 alert('Data Berhasil Disimpan');
							 document.location='../media.php?page=tampil_pegawai';
							 </script>
							  <?php  
			        } else {
			           echo "Gambar gagal dikirim";
			        }
			   } else {
			        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
			   }
			} else {
			    echo "Anda belum memilih gambar";
			}
 } 
?>



