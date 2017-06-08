<?php 
include "../config/koneksi.php";
error_reporting(1);
$foto1 = isset($_POST['foto1']) ? $_POST['foto1']:"";
unlink('../gambar/'.$foto1);
//Deklarasi Variabel Input
$content ="";
$pengumuman = isset($_POST['pengumuman']) ? $_POST['pengumuman']:"";
$str = explode("\n", $pengumuman);
$foto = isset($_POST['foto']) ? $_POST['foto']:"";
$fileName = $_FILES['foto']['name'];
$namafolder="../gambar/";

//perintah perulangan
for ($i=0; $i<=count($str); $i++)
{
   $bag = str_replace($str[$i], $str[$i]."<br/>", $str[$i]);
   $content .= $bag;
}
//Validasi jika ada data input yang kosong
if ($pengumuman=="") {
	echo "Data Gagal Tersimpan";
} else {	
	if (!empty($_FILES["foto"]["tmp_name"]))
			{
			    $jenis_gambar=$_FILES['foto']['type'];
			    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
			    {           
			        $gambar = $namafolder . basename($_FILES['foto']['name']);
			        if (move_uploaded_file($_FILES['foto']['tmp_name'], $gambar)) {	
			        	$query = mysqli_query($koneksi,"INSERT INTO pengumuman (kd_pengumuman, nama_pengumuman, foto) 
									VALUES ('','$content','$fileName')") or die (mysqli_error($koneksi));
			              echo "<meta http-equiv='refresh' content='0; url=media.php?page=home'>";
			              ?>
							 <script language="JavaScript">
							 alert('Data Berhasil Disimpan');
							 document.location='media.php?page=home';
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



