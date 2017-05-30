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
$kd_jabatan = $hasil['kd_jabatan'];
$kd_bank = $hasil['kd_bank'];
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


// proses edit
if(isset($_POST['edit'])){
$nip1 = $_POST['nip1'];
$kd_jabatan1 = $_POST['kd_jabatan1'];
$kd_bank1 = $_POST['kd_bank1'];
$no_rek1 = $_POST['no_rek1'];
$s_kerja1 = $_POST['s_kerja1'];
$tgl_masuk1 = $_POST['tgl_masuk1'];
$tgl_berakhir1 = $_POST['tgl_berakhir1'];
$no_ktp1 = $_POST['no_ktp1'];
$npwp1 = $_POST ['npwp1'];
$nama1 = $_POST['nama1'];
$tempat_lahir1 = $_POST['tempat_lahir1'];
$tgl_lahir1 = $_POST['tgl_lahir1'];
$alamat1 = $_POST['alamat1'];
$n_hp1= $_POST['n_hp1'];
$jk1 = $_POST['jk1'];

$fileName = $_FILES['foto1']['name'];    

$namafolder="../gambar/";

// Simpan di Folder Gambar
if($fileName!=null){
        if (!empty($_FILES["foto1"]["tmp_name"]))
            {
                $jenis_gambar=$_FILES['foto1']['type'];
                if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
                {           
                    $gambar = $namafolder . basename($_FILES['foto1']['name']);       
                    if (move_uploaded_file($_FILES['foto1']['tmp_name'], $gambar)) {
                        // update data
                        $query = "UPDATE `t_pegawai` SET `kd_jabatan` = '$kd_jabatan1' , `kd_bank` = '$kd_bank1' , `no_rek` = '$no_rek1'
                                  , `s_kerja` = '$s_kerja1' , `tgl_masuk` = '$tgl_masuk1' , `tgl_berakhir` = '$tgl_berakhir1' , `no_ktp` = '$no_ktp1' , `npwp` = '$npwp1' , `nama` = '$nama1'
                                  , `tempat_lahir` = '$tempat_lahir1' , `tgl_lahir` = '$tgl_lahir1' , `alamat` = '$alamat1', `n_hp` = '$n_hp1', `jk` = '$jk1'
                                  , `foto` = '$fileName'                                  
                                   WHERE `nip` = '$nip';";

                            $sql = mysqli_query($koneksi,$query);
                            if ($sql) {
                                    ?>
                                    <script language="JavaScript">
                             alert('Data Berhasil Disimpan');
                             document.location='../admin/media.php?page=detail_pegawai&id=<?php echo $nip ?>';
                             </script>
                             <?php 

                                echo "<meta http-equiv='refresh' content='0; url=media.php?page=detail_pegawai&id=$nip'>";
                            } else {
                                echo "Data gagal di edit";
                                }
                          ?>
                             
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
        else
        {
            $query = "UPDATE `t_pegawai` SET `kd_jabatan` = '$kd_jabatan1' , `kd_bank` = '$kd_bank1' , `no_rek` = '$no_rek1'
                             , `s_kerja` = '$s_kerja1' , `tgl_masuk` = '$tgl_masuk1' , `tgl_berakhir` = '$tgl_berakhir1' , `no_ktp` = '$no_ktp1' , `npwp` = '$npwp1' , `nama` = '$nama1'
                             , `tempat_lahir` = '$tempat_lahir1' , `tgl_lahir` = '$tgl_lahir1' , `alamat` = '$alamat1', `n_hp` = '$n_hp1', `jk` = '$jk1'
                             WHERE `nip` = '$nip';";

            $sql = mysqli_query($koneksi,$query);
            if ($sql) {
                ?>


            <script language="JavaScript">
             alert('Data Berhasil Disimpan');
             document.location='../admin/media.php?page=detail_pegawai&id=<?php echo $nip ?>';
             </script>
             <?php 

                echo "<meta http-equiv='refresh' content='0; url=media.php?page=detail_pegawai&id=$nip'>";
            } else {
                echo "Data gagal di edit";
                }
          ?>
             
            <?php
        }


}	
 ?>
 <br>
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel fresh-color panel-info">
                        <div class="panel-heading">
                            Management Edit Pegawai
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="FormUpload" id="FormUpload">
                  
                    
                     <!-- Generate NIP -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">NIP Pegawai : </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="contract-name" name="nip1" required value="<?php echo $nip ?>" placeholder="Masukan NIP Pegawai" disabled>
                        </div>
                    </div >

                     <!-- Pilih Kode Jabatan -->
                     <div class="form-group">
                        <label for="contact-name" class="col-lg-3 control-label">Jabatan : </label>
                        <div class="col-lg-9">
                            <select class="form-control" name="kd_jabatan1" value="<?php echo $kd_jabatan ?>">
                                
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

                     <!-- Pilih Kode bank -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Bank : </label>
                        <div class="col-lg-9">
                            <select class="form-control" name="kd_bank1" value="<?php echo $kd_bank ?>">
                                <option>-----------------Pilih--------------</option>
                                <?php 
                                $query1 = "SELECT * FROM `k_t_bank`;";
                                $sql1 = mysqli_query($koneksi,$query1);
                                while ( $baris = mysqli_fetch_array($sql1)) {
                                    if ($kd_bank == $baris['kd_bank']){
                                        echo "<option value=$baris[kd_bank] selected>$baris[nama_bank]</option>";
                                    }else {
                                        echo "<option value=$baris[kd_bank]>$baris[nama_bank]</option>";
                                    }
                                }
                                 ?>
                            </select>
                        </div>
                    </div >
                    <!-- Input No Rekening -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">No Rekening : </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="contract-name" placeholder="Masukan No Rekening" name="no_rek1" value="<?php echo $no_rek ?>" required>
                        </div>
                    </div >
                    <!-- Pilih Status Kerja -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Status Kerja : </label>
                        <div class="col-lg-9">
                            <select class="form-control" name="s_kerja1" required>
                                <option <?php if( $s_kerja=='Kontrak'){echo "selected"; } ?> value='Kontrak'>Kontrak</option>
                                <option <?php if( $s_kerja=='Tetap'){echo "selected"; } ?> value='Tetap'>Tetap</option>
                            </select>
                    </div>
                    </div>
                     <!-- Masukan Tanggal Masuk -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Tanggal Masuk Pegawai : </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="datepicker1" placeholder="Masukan Tanggal Masuk Pegawai" name="tgl_masuk1" value="<?php echo $tgl_masuk ?>" required>
                        </div>
                    </div >
                    <!-- Masukan Tanggal Berakhir -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Tanggal Berakhir Pegawai : </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="datepicker1" placeholder="Masukan Tanggal Berakhir Pegawai" name="tgl_berakhir1" value="<?php echo $tgl_berakhir ?>" required>
                        </div>
                    </div >
                    <!-- Masukan No Ktp -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">No Ktp : </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="datepicker1" placeholder="Masukan No Ktp" name="no_ktp1" value="<?php echo $no_ktp ?>" required>
                        </div>
                    </div >
                    <!-- Masukan NPWP -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">NPWP : </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="datepicker1" placeholder="Masukan NPWP" name="npwp1" value="<?php echo $npwp ?>" required>
                        </div>
                    </div >
                    <!-- Input Nama Pegawai -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Nama Pegawai : </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama Pegawai" name="nama1" value="<?php echo $nama ?>" required>
                        </div>
                    </div >
                    <!-- Input Tempat Lahir -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Tempat Lahir : </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="contract-name" placeholder="Masukan Tempat Lahir Pegawai" name="tempat_lahir1" value="<?php echo $tempat_lahir ?>" required>
                        </div>
                    </div >
                    <!-- Input Tanggal Lahir -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Tanggal Lahir : </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="datepicker" placeholder="Masukan Tanggal Lahir Pegawai" name="tgl_lahir1" value="<?php echo $tgl_lahir ?>" required>
                        </div>
                    </div >
                    <!-- Input Alamat -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Alamat : </label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="alamat1" placeholder="Masukan Alamat Pegawai" rows="2" required><?php echo $alamat ?></textarea>
                        </div>
                    </div >
                    <!-- Input No Telepon -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">No Telepon : </label>
                        <div class="col-lg-9">
                            <input name="n_hp1" class="form-control" placeholder="No Telepon" type="text" data-mask="" required data-inputmask="'mask': ['9999-9999-9999'] " value="<?php echo $n_hp ?>">
                        </div>
                    </div >
                    <!-- Input Jenis Kelamin -->
                    <div class="form-group">
                    <label for = "contact-msg" class="col-lg-3 control-label">Jenis Kelamin : </label>
                      <div class="col-lg-9">
                      <div class="radio3 radio-check radio-inline">
                        <input type="radio" id="radio4" name="jk1" value="Laki-Laki" <?php if($jk=='Laki-Laki'){echo 'checked';}?>
                        <label for="radio4">
                          Laki-laki
                        </label>
                      </div>
                      <div class="radio3 radio-check radio-success radio-inline">
                        <input type="radio" id="radio5" name="jk1" value="Perempuan" <?php if($jk=='Perempuan'){echo 'checked';}?>
                        <label for="radio5">
                          Perempuan
                        </label>
                      </div>
                      </div>
                    </div>
                
                    <!-- Tampilkan Foto -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Foto Pegawai : </label>
                        <div class="col-lg-9">
                            <img src="../gambar/<?php echo "$foto"; ?>" width="200px" heigh="200px">
                        </div>
                    </div>

                    <!-- Masukan Masukan Foto -->
                    <div class="form-group">
                        <label for = "contact-msg" class="col-lg-3 control-label">Foto Pegawai : </label>
                        <div class="col-lg-9">
                            <input type="file" name="foto1" id="foto">
                        </div>
                    </div>



                    <!-- Button -->
                    <div class="form-action no-margin-bottom" style="margin-left:40%">
                        <input class="btn btn-primary" type="submit" name="edit" id="edit" value="Edit">                   
                    <a href="media.php?page=detail_pegawai&id=<?php echo $nip; ?>" class="btn btn-primary">Batal</a>
                    </div>
                </form>
            </div>
    </div>
</div>
