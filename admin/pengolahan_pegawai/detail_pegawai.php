<?php 
include "../config/koneksi.php";

if (isset($_GET['id'])) {
	$nip = $_GET['id'];
} else {
	die ("Error, Tidak ada kode terpilih");
}

// tampilkan data
$query =  "SELECT * FROM t_pegawai JOIN t_jabatan USING (kd_jabatan)
                                    JOIN k_t_bank USING (kd_bank) where nip = '$nip';";

$sql = mysqli_query($koneksi,$query);
$hasil = mysqli_fetch_array($sql);
$nip = $hasil['nip'];
$nama_jabatan = $hasil['nama_jabatan'];
$nama_bank = $hasil['nama_bank'];
$no_rek = $hasil['no_rek'];
$s_kerja = $hasil['s_kerja'];
$tgl_masuk = $hasil['tgl_masuk'];
$tgl_berakhir = $hasil['tgl_berakhir'];
$no_ktp = $hasil['no_ktp'];
$npwp = $hasil ['npwp'];
$nama = $hasil['nama'];
$tempat_lahir = $hasil['tempat_lahir'];
$tgl_lahir = $hasil['tgl_lahir'];
$alamat = $hasil['alamat'];
$n_hp= $hasil['n_hp'];
$jk = $hasil['jk'];
$foto = $hasil['foto'];

?>
<!-- header title -->
 <div class="box-header">
              <h3 class="box-title"><i class="fa fa-tasks"></i> Detail Pegawai</h3>
            </div>
            <div class="box-body">

<!-- Foto, Nama, Nip, N_Jabatan, N_Bagian dan status kerja -->
<section class="content">

      <div class="row">
        <div class="col-md-5">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../gambar/<?php echo "$foto"; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $nama; ?></h3>

              <p class="text-muted text-center">Pegawai </p>

              <ul class="list-group list-group-unbordered">
              	<li class="list-group-item">
                  <b>NIP</b> <a class="pull-right"><?php echo $nip ?></a>
                </li>
                <li class="list-group-item">
                  <b>Jabatan</b> <a class="pull-right"><?php echo $nama_jabatan ?></a>
                </li>
                <li class="list-group-item">
                  <b>Bank</b> <a class="pull-right"><?php echo $nama_bank ?></a>
                </li>
                <li class="list-group-item">
                  <b>No Rekening</b> <a class="pull-right"><?php echo $no_rek ?></a>
                </li>
                <li class="list-group-item">
                  <b>Status Kerja</b> <a class="pull-right"><?php echo $s_kerja ?></a>
                </li>
              	<li class="list-group-item">
                  <b>Tanggal Masuk Pegawai</b> <a class="pull-right"><?php echo $tgl_masuk ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Berakhir Pegawai</b> <a class="pull-right"><?php echo $tgl_berakhir ?></a>
                </li>
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
         <!-- col-md-5 -->
        </div>



<!-- Data Pribadi  -->
        <div class="col-md-7">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <h3 class="profile-username text-left">Data Pribadi</h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>No Ktp</b> <a class="pull-right"><?php echo $no_ktp ?></a>
                </li>
                <li class="list-group-item">
                  <b>NPWP</b> <a class="pull-right"><?php echo $npwp ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tempat Lahir</b> <a class="pull-right"><?php echo $tempat_lahir ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Lahir</b> <a class="pull-right"><?php echo $tgl_lahir ?></a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right"><?php echo $alamat ?></a>
                </li>
                <li class="list-group-item">
                  <b>No Telepon</b> <a class="pull-right"><?php echo $n_hp?></a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right"><?php echo $jk ?></a>
              </ul>

              <?php
                  if($_SESSION['level']=="1"){
              ?>
              <a href="media.php?page=edit_pegawai&id=<?php echo $hasil['nip']; ?>" class="btn btn-primary btn-block"><b>Edit Data Pegawai</b></a>
              <?php
                  }
              ?>
            </div>
            <!-- /.box-body -->
          </div>
         <!-- col-md-5 -->
        </div>