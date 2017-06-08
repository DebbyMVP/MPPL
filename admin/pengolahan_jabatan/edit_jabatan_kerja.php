<?php 
include "../config/koneksi.php";

if (isset($_GET['id'])) {
	$kd_jabatan = $_GET['id'];
} else {
	die ("Error, Tidak ada kode terpilih");
}
// tampilkan data
$query =  "SELECT * FROM t_jabatan where kd_jabatan = '$kd_jabatan';";

$sql = mysqli_query($koneksi,$query);
$hasil = mysqli_fetch_array($sql);
$kd_jabatan = $hasil['kd_jabatan'];
$nama_jabatan = $hasil['nama_jabatan'];
$tunjangan_jabatan = $hasil['tunjangan_jabatan'];



// proses edit
if(isset($_POST['edit'])){
$kd_jabatan1 = $_POST['kd_jabatan1'];
$nama_jabatan1 = $_POST['nama_jabatan1'];
$tunjangan_jabatan1 = $_POST['tunjangan_jabatan1'];

// update data
$query = "UPDATE `t_jabatan`
                SET `kd_jabatan` = '$kd_jabatan1',
                  `nama_jabatan` = '$nama_jabatan1',
                  `tunjangan_jabatan` = '$tunjangan_jabatan1'
                    WHERE `kd_jabatan` = '$kd_jabatan';";
$sql = mysqli_query($koneksi,$query);
if ($sql) {
	echo "<meta http-equiv='refresh' content='0; url=media.php?page=tampil_jabatan'>";
} else {
	echo "Data gagal di edit";
	}
}	
 ?>
 <br>
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel fresh-color panel-info">
                        <div class="panel-heading">
                            Edit Jabatan
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        <form class="form-horizontal" action="" method="post" enctype="multypart/form-data" name="edit" id="edit">
              
                  
                    <div class="form-group">
                        <label for="contact-name" class="col-lg-3 control-label">Kode jabatan : </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="contract-name" placeholder="Masukan Kode jabatan" name="kd_jabatan1" value="<?php echo $kd_jabatan ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Nama jabatan : </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama jabatan" name="nama_jabatan1" value="<?php echo $nama_jabatan ?>">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">TUNJANGAN : </label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Rp.</span>
                                <input type="text" class="form-control" placeholder="Masukan Nominal Tunjangan" name="tunjangan_jabatan1" value="<?php echo $tunjangan_jabatan; ?>">
                            </div>
                        </div>
                    </div >
                    
                    <div class="form-action no-margin-bottom" style="margin-left:40%">
                    <input class="btn btn-primary" type="submit" name="edit" id="edit" value="Edit">
                    <a href="media.php?page=tampil_jabatan" class="btn btn-primary">Keluar</a>
                    </div>
                </form>
            </div>
    </div>
</div>
