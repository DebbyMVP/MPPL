<?php 
include "../config/koneksi.php";

if (isset($_GET['id_gaji'])) {
	$id_gaji = $_GET['id_gaji'];
} else {
	die ("Error, Tidak ada kode terpilih");
}

// tampilkan data
$query =  "SELECT *FROM `t_pegawai` JOIN `t_jabatan` USING(`kd_jabatan`) JOIN
`t_gaji_pegawai`USING(`nip`) where id_gaji='$id_gaji';";

$sql = mysqli_query($koneksi,$query);
$hasil = mysqli_fetch_array($sql);
$id_gaji = $hasil['id_gaji'];
$nama = $hasil['nama'];
$nip = $hasil['nip'];
$jk = $hasil['jk'];
$status = $hasil['status'];
$gaji_pokok = $hasil['gaji_pokok'];
$lembur = $hasil['lembur'];
$peng_tahun = $hasil['peng_tahun'];
$biaya_jab = $hasil['biaya_jab'];
$bpjs_kes = $hasil['bpjs_kes'];
$bpjs_ket = $hasil ['bpjs_ket'];
$telat_alpa = $hasil['telat_alpa'];
$tempat_lahir = $hasil['tempat_lahir'];
$ptkp = $hasil['ptkp'];
$total_pengu = $hasil['total_pengu'];
$peng_kena_pajak= $hasil['peng_kena_pajak'];
$pph_terhutang_set = $hasil['pph_terhutang_set'];
$pph_terhutang_seb = $hasil['pph_terhutang_seb'];
$bulan = $hasil['bulan'];
$tahun = $hasil ['tahun'];

?>
<!-- header title -->
 <div class="box-header">
              <h3 class="box-title"><i class="fa fa-tasks"></i> Detail gaji</h3>
               <h3 class="profile-username text-center"><?php echo $nama; ?></h3>
               <h3 class="profile-username text-center"><?php echo $nip; ?></h3>
            </div>
            <div class="box-body">

<!-- Foto, Nama, Nip, N_Jabatan, N_Bagian dan status kerja -->
<section class="content">

      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <!-- <h3 class="profile-username text-center"><?php echo $nama; ?></h3> -->

              <ul class="list-group list-group-unbordered">
              <!-- <li class="list-group-item">
                  <b>Nama</b> <a class="pull-right"><?php echo $nama ?></a>
                </li>
              	<li class="list-group-item">
                  <b>NIP</b> <a class="pull-right"><?php echo $nip ?></a>
                </li> -->
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right"><?php echo $jk ?></a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?php echo $status ?></a>
                </li>
                <li class="list-group-item">
                  <b>Gaji Pokok</b> <a class="pull-right"><?php echo "Rp ".number_format($gaji_pokok,"2",",",".") ?></a>
                </li>
                <li class="list-group-item">
                  <b>Lembur</b> <a class="pull-right">Rp <?php echo number_format($lembur,"2",",",".") ?></a>
                </li>
              	<li class="list-group-item">
                  <b>PengHasilan Setahun</b> <a class="pull-right">Rp <?php echo number_format($peng_tahun,"2",",",".") ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
         <!-- col-md-5 -->
        </div>



<!-- Data Pribadi  -->
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <h7 class="profile-username text-left">Pengurang</h7>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Biaya Jabatan</b> <a class="pull-right">Rp <?php echo number_format($biaya_jab,"2",",",".") ?></a>
                </li>
                <li class="list-group-item">
                  <b>BPJS Kes</b> <a class="pull-right">Rp <?php echo number_format($bpjs_kes,"2",",",".") ?></a>
                </li>
                <li class="list-group-item">
                  <b>BPJS Ket</b> <a class="pull-right">Rp <?php echo number_format($bpjs_ket,"2",",",".") ?></a>
                </li>
                <li class="list-group-item">
                  <b>Telat /  Alpa</b> <a class="pull-right">Rp <?php echo number_format($telat_alpa,"2",",",".") ?></a>
                </li>
                <li class="list-group-item">
                  <b>PTKP</b> <a class="pull-right">Rp <?php echo number_format($ptkp,"2",",",".") ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
         <!-- col-md-5 -->
        </div>
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Total Pengurang</b> <a class="pull-right">Rp <?php echo number_format($total_pengu,"2",",",".") ?></a>
                </li>
                <li class="list-group-item">
                  <b>Penghasilan Kena Pajak</b> <a class="pull-right">Rp <?php echo number_format($peng_kena_pajak,"2",",",".") ?></a>
                </li>
                <li class="list-group-item">
                  <b>PPH Terhutang Setahun</b> <a class="pull-right">Rp <?php echo number_format($pph_terhutang_set,"2",",",".") ?></a>
                </li>
                <li class="list-group-item">
                  <b>PPH Terhutang Perbulan</b> <a class="pull-right">Rp <?php echo number_format(floor($pph_terhutang_seb),"2",",",".") ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
         <!-- col-md-5 -->
        </div>