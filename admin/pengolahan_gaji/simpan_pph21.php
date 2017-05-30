<?php 
include "../../config/koneksi.php";


//Deklarasi Variabel Input

$nip = isset($_POST['nip']) ? $_POST['nip']:"";
$status = isset($_POST['status']) ? $_POST['status']:"";
$gaji_pokok = isset($_POST['gaji_pokok']) ? $_POST['gaji_pokok']:"";
$lembur = isset($_POST['lembur']) ? $_POST['lembur']:"";
$biaya_jab = isset($_POST['biaya_jab']) ? $_POST['biaya_jab']:"";
$bpjs_kes = isset($_POST['bpjs_kes']) ? $_POST['bpjs_kes']:"";
$bpjs_ket = isset($_POST['bpjs_ket']) ? $_POST['bpjs_ket']:"";
$telat_alpa = isset($_POST['telat_alpa']) ? $_POST['telat_alpa']:"";
$bulan= date('F');
$tahun= date('Y');
$peng_tahun= ($gaji_pokok*12)+$lembur;
if ($status=="tk"){
    $ptkp=36000000;
}elseif ($status=="k/-") {
    $ptkp=39000000;
}elseif ($status=="k/1") {
    $ptkp=42000000;
}elseif ($status=="k/2") {
    $ptkp=45000000;
}elseif ($status=="k/3") {
    $ptkp=48000000;
}
$total_pengu= $biaya_jab+$bpjs_kes+$bpjs_ket+$telat_alpa+$ptkp;
$peng_kena_pajak= $peng_tahun-$total_pengu;
$pph_terhutang_set=($peng_kena_pajak-50000000)*0.15+(0.05*50000000);
$pph_terhutang_seb=$pph_terhutang_set/12;
$lembur = "";

if ($nip=="") {
    echo "Data Gagal Tersimpan";
} else {    
    // Simpan di Folder Gambar
                        $query = mysqli_query($koneksi,"INSERT INTO t_gaji_pegawai (nip, status, gaji_pokok, lembur, peng_tahun, biaya_jab, bpjs_kes, bpjs_ket, telat_alpa, ptkp, total_pengu, peng_kena_pajak, pph_terhutang_set, pph_terhutang_seb, bulan, tahun) 
                                    VALUES ('$nip','$status','$gaji_pokok','$lembur','$peng_tahun','$biaya_jab','$bpjs_kes','$bpjs_ket','$telat_alpa','$ptkp','$total_pengu','$peng_kena_pajak','$pph_terhutang_set', '$pph_terhutang_seb', '$bulan','$tahun')") or die (mysqli_error($koneksi));
                          echo "<meta http-equiv='refresh' content='0; url=../media.php?page=pph21'>";
                          ?>
                             <script language="JavaScript">
                             alert('Data Berhasil Disimpan');
                             document.location='../media.php?page=pph21';
                             </script>
                              <?php  
                    
 } 
?>



