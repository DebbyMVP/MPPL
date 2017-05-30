<?php 
include "../config/koneksi.php";

if (isset($_GET['id'])) {
	$nip = $_GET['id'];
} else {
	die ("Error, Tidak ada kode terpilih");
}

// tampilkan data
$query =  "SELECT * FROM t_pegawai JOIN t_jabatan USING (kd_jabatan)
                                    JOIN t_bagian USING (kd_bagian) where nip = '$nip';";

$sql = mysqli_query($koneksi,$query);
$hasil = mysqli_fetch_array($sql);
$nip = $hasil['nip'];
$nama = $hasil['nama'];
$tempat_lahir = $hasil['tempat_lahir'];
$tgl_lahir = $hasil['tgl_lahir'];
$alamat = $hasil['alamat'];
$n_hp= $hasil['n_hp'];
$jk = $hasil['jk'];
$s_kerja = $hasil['s_kerja'];
$s_kawin = $hasil['s_kawin'];
$jml_anak = $hasil['jml_anak'];
$tgl_masuk = $hasil['tgl_masuk'];
$kd_bagian = $hasil['kd_bagian'];
$kd_jabatan = $hasil['kd_jabatan'];
$nama_bagian = $hasil['nama_bagian'];
$nama_jabatan = $hasil['nama_jabatan'];
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

              <p class="text-muted text-center">Pegawai <?php echo $s_kerja ?></p>

              <ul class="list-group list-group-unbordered">
              	<li class="list-group-item">
                  <b>NIP</b> <a class="pull-right"><?php echo $nip ?></a>
                </li>
              	<li class="list-group-item">
                  <b>Tanggal Masuk Pegawai</b> <a class="pull-right"><?php echo $tgl_masuk ?></a>
                </li>
                <li class="list-group-item">
                  <b>Nama Bagian</b> <a class="pull-right"><?php echo $nama_bagian ?></a>
                </li>
                <li class="list-group-item">
                  <b>Nama Jabatan</b> <a class="pull-right"><?php echo $nama_jabatan ?></a>
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
                  <b>Tempat Lahir</b> <a class="pull-right"><?php echo $tempat_lahir ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Lahir</b> <a class="pull-right"><?php echo $tgl_lahir ?></a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right"><?php echo $alamat ?></a>
                </li>
                <li class="list-group-item">
                  <b>No.Telepon</b> <a class="pull-right"><?php echo $n_hp ?></a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right"><?php echo $jk ?></a>
                </li>
                <li class="list-group-item">
                  <b>Status Kawin</b> <a class="pull-right"><?php echo $s_kawin?></a>
                </li>
                <li class="list-group-item">
                  <b>Jumlah Anak</b> <a class="pull-right"><?php echo $jml_anak ?></a>
              </ul>

              <a href="media.php?page=edit_pegawai&id=<?php echo $hasil['nip']; ?>" class="btn btn-primary btn-block"><b>Edit Data Pegawai</b></a>
            </div>
            <!-- /.box-body -->
          </div>
         <!-- col-md-5 -->
        </div>