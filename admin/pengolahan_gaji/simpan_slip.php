<?php 
include "../../config/koneksi.php";


//Deklarasi Variabel Input

$nip = isset($_POST['nip']) ? $_POST['nip']:"";
$work_days = isset($_POST['work_days']) ? $_POST['work_days']:"";
$net_pay_days = isset($_POST['net_pay_days']) ? $_POST['net_pay_days']:"";
$pay_mode = isset($_POST['pay_mode']) ? $_POST['pay_mode']:"";
$gaji_pokok = isset($_POST['gaji_pokok']) ? $_POST['gaji_pokok']:"";
$bonus = isset($_POST['bonus']) ? $_POST['bonus']:"";
$bulan = isset($_POST['bulan']) ? $_POST['bulan']:"";
$tahun = isset($_POST['tahun']) ? $_POST['tahun']:"";
$sql=mysqli_query($koneksi,"select * from t_gaji_pegawai where nip='$nip' and bulan='$bulan' and tahun='$tahun'");
$data=mysqli_fetch_array($sql);
$pph_terhutang_seb=$data['pph_terhutang_seb'];
$id_gaji=$data['id_gaji'];
if ($data['id_gaji']==null)
{
    echo "data tidak ada";
}else {    
    // Simpan di Folder Gambar
    $jht= $gaji_pokok*37/1000;
    if ($gaji_pokok>4725000){
        $jpk=4725000*4/100;
    }else{
        $jpk=$gaji_pokok*4/100;
    }
    $jkk=$gaji_pokok*0.24/100;
    $jkm = $gaji_pokok *0.3/100;
    if ($gaji_pokok>7000000){
        $jp=7000000*2/100;
    }else{
        $jp=$gaji_pokok*2/100;
    }
    $overtime=0;
     if ($gaji_pokok>4725000){
        $add_pay_jpk=4725000*1/100;
    }else{
        $add_pay_jpk=$gaji_pokok*1/100;
    }
    $add_pay_jht=$gaji_pokok*2/100;
    if ($gaji_pokok>7000000){
        $add_pay_jp=7000000*1/100;
    }else{
        $add_pay_jp=$gaji_pokok*1/100;
    }
    $total_ear= $gaji_pokok+$jht+$jpk+$jkk+$jkm+$jp+$overtime+$bonus;
    $total_dedu= $pph_terhutang_seb+$add_pay_jpk+$add_pay_jht+$add_pay_jp;
    $net_pay=$total_ear-$total_dedu;
    $take_home_pay= ($gaji_pokok+$overtime+$bonus)-$total_dedu;


                        $query = mysqli_query($koneksi,"INSERT INTO slip_gaji (work_days, net_pay_days, pay_mode, gaji_pokok, jht, jpk, jkk, jkm, jp, overtime, bonus, id_gaji, add_pay_jpk, add_pay_jht, add_pay_jp, total_ear, total_dedu, net_pay, take_home_pay) 
                                    VALUES ('$work_days','$net_pay_days','$pay_mode','$gaji_pokok','$jht','$jpk','$jkk','$jkm','$jp','$overtime','$bonus','$id_gaji', '$add_pay_jpk', '$add_pay_jht','$add_pay_jp','$total_ear','$total_dedu','$net_pay','$take_home_pay')") or die (mysqli_error($koneksi));
                          echo "<meta http-equiv='refresh' content='0; url=../media.php?page=slip_gaji'>";
                          ?>
                             <script language="JavaScript">
                             alert('Data Berhasil Disimpan');
                             document.location='../media.php?page=slip_gaji';
                             </script>
                              <?php  
                    
 } 
?>



