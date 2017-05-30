<?php 
include "../config/koneksi.php";

if (isset($_GET['kd_absen'])) {
    $kd_absen = $_GET['kd_absen'];
} else {
    die ("Error, Tidak ada kode terpilih");
}
// tampilkan data
$query =  "SELECT * FROM t_absen JOIN t_jabatan USING (kd_jabatan)
                                    JOIN t_pegawai USING (nip) where kd_absen = '$kd_absen';";

$sql = mysqli_query($koneksi,$query);
$hasil = mysqli_fetch_array($sql);
$tanggal = $hasil['tanggal'];
$nip = $hasil['nip'];
$kd_jabatan = $hasil['kd_jabatan'];
$jam_masuk = $hasil['jam_masuk'];
$jam_keluar = $hasil['jam_keluar'];
$keterangan = $hasil['keterangan'];


// proses edit
if(isset($_POST['edit'])){
$tanggal1 = $_POST['tanggal1'];
$nip1 = $_POST['nip1'];
$kd_jabatan1 = $_POST['kd_jabatan1'];
$jam_masuk1 = $_POST['jam_masuk1'];
$jam_keluar1 = $_POST['jam_keluar1'];
$keterangan1 = $_POST['keterangan1'];

                        // update data
                        $query = "UPDATE `t_absen` SET `tanggal` = '$tanggal1' , `nip` = '$nip1' , `kd_jabatan` = '$kd_jabatan1'
                                 , `jam_masuk` = '$jam_masuk1' , `jam_keluar` = '$jam_keluar1' , `keterangan` = '$keterangan1'                             
                                   WHERE `kd_absen` = '$kd_absen';";

                            $sql = mysqli_query($koneksi,$query);
                            if ($sql) {
                                    ?>
                                    <script language="JavaScript">
                             alert('Data Berhasil Disimpan');
                             document.location='../admin/media.php?page=tampil_absen&id=<?php echo $kd_absen ?>';
                             </script>
                             <?php 

                                echo "<meta http-equiv='refresh' content='0; url=media.php?page=tampil_absen&id=$kd_absen'>";
                            } else {
                                echo "Data gagal di edit";}
                                }
                          ?>
                               
 <br>
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel fresh-color panel-info">
                        <div class="panel-heading">
                            Management Edit Absen
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="FormUpload" id="FormUpload">
                  
                    
                     <!-- Generate NIP -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Kode Absen : </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="contract-name" name="kd_absen1" required value="<?php echo $kd_absen ?>" readonly>
                        </div>
                    </div >

                      <div class="form-group">
                            <label for="contact-name" class="col-lg-3 control-label">NIP : </label>
                            <div class="col-lg-9">
                                <select class="form-control" name="nip1">
                    
                                    <?php 
                                        $query1 = "SELECT * FROM `t_pegawai`;";
                                        $sql1 = mysqli_query($koneksi,$query1);
                                        while ( $baris = mysqli_fetch_array($sql1)) {
                                        if ($nip == $baris['nip']){
                                        echo "<option value=$baris[nip] selected>$baris[nip]</option>";
                                        }else {
                                        echo "<option value=$baris[nip]>$baris[nip]</option>";
                                             }
                                         }
                                    ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="contact-name" class="col-lg-3 control-label">Jabatan : </label>
                            <div class="col-lg-9">
                                <select class="form-control" name="kd_jabatan1">
                                    <option>Pilih Jabatan</option>
                                    <?php 
                                $query1 = "SELECT * FROM `t_jabatan`;";
                                $sql1 = mysqli_query($koneksi,$query1);
                                while ( $baris = mysqli_fetch_array($sql1)) {
                                    if ($kd_jabatan == $baris['kd_jabatan']){
                                        echo "<option value=$baris[kd_jabatan] selected>$baris[nama_jabatan]</option>";
                                    }else {
                                        echo "<option value=$baris[kd_jabatan]>$baris[nama_jabatan]</option>";
                                    }
                                }
                                 ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Jam Masuk : </label>
                            <div class="col-lg-9">
                               <input type=time name="jam_masuk1"  class="form-control" required value="<?php echo $jam_masuk ?>"></input>
                            </div>
                        </div >
                         <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Jam Keluar : </label>
                            <div class="col-lg-9">
                               <input type=time name="jam_keluar1"  class="form-control" required value="<?php echo $jam_keluar ?>"></input>
                            </div>
                        </div >
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Keterangan : </label>
                            <div class="col-lg-9">
                                <input name="keterangan1" class="form-control" placeholder="Keterangan" type="text" required value="<?php echo $keterangan ?>">
                            </div>
                        </div >



                    <!-- Button -->
                    <div class="form-action no-margin-bottom" style="margin-left:40%">
                        <input class="btn btn-primary" type="submit" name="edit" id="edit" value="Edit">                   
                    <a href="media.php?page=tampil_absen&id=<?php echo $kd_absen; ?>" class="btn btn-primary">Batal</a>
                    </div>
                </form>
            </div>
    </div>
</div>
