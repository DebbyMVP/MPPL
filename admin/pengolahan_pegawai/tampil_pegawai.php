<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>



<body class="flat-blue">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-tasks"></i> Management Pegawai</h3>
            </div>
            <div class="box-body">
             <?php 
                include"../config/koneksi.php";
                $hasil=mysqli_query($koneksi,"SELECT * FROM t_pegawai JOIN t_jabatan USING (kd_jabatan)
                                    JOIN k_t_bank USING (kd_bank);");
             ?>


                        <div class="modal fade modal-primary" id="daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Tambah Pegawai</h4>
                                    </div>

                                    <form class="form-horizontal" action="pengolahan_pegawai/simpan_pegawai.php" method="post" enctype="multipart/form-data" name="FormUpload" id="FormUpload">
                                    <div class="modal-body">

                        <!-- Data Pegawai -->
                                    <div class="form-title"><strong><font color="white">Masukan Data Pegawai</font></strong></div>
                                        <br>
                                        <!-- Generate NIP -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">NIP Pegawai : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="contract-name" name="nip"  required placeholder="Masukan Nip Pegawai" >
                                            </div>
                                        </div >

                                        <!-- Pilih Kode Jabatan -->
                                         <div class="form-group">
                                            <label for="contact-name" class="col-lg-3 control-label">Jabatan : </label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="kd_jabatan">
                                                    <option>Pilih Nama Jabatan</option>
                                                    <?php 
                                                    $query1 = "SELECT * FROM `t_jabatan`;";
                                                    $sql1 = mysqli_query($koneksi,$query1);
                                                    while ( $baris = mysqli_fetch_array($sql1)) {
                                                        echo '<option value="'.$baris['kd_jabatan'].'">'.$baris['nama_jabatan'].'</option>';
                                                    }
                                                     ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Pilih Kode Bank -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Bank : </label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="kd_bank">
                                                    <option>Pilih Nama Bank</option>
                                                    <?php 
                                                    $query1 = "SELECT * FROM `k_t_bank`;";
                                                    $sql1 = mysqli_query($koneksi,$query1);
                                                    while ( $baris = mysqli_fetch_array($sql1)) {
                                                        echo '<option value="'.$baris['kd_bank'].'">'.$baris['nama_bank'].'</option>';
                                                    }
                                                     ?>
                                                </select>
                                            </div>
                                        </div >

                                        <!-- Input No Rek -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">No Rekening : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="contract-name" placeholder="Masukan No Rekening Bank" name="no_rek" required>
                                            </div>
                                        </div >

                                         <!-- Pilih Status Kerja -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Status Kerja : </label>
                                            <div class="col-lg-9">
                                                <select name="s_kerja" class="form-control" required>
                                                    <option value=""> -----------------Pilih--------------</option>
                                                    <option value="Kontrak">Kontrak</option>
                                                    <option value="Tetap">Tetap</option>                                 
                                                </select>
                                        </div>
                                        </div>

                                        <!-- Masukan Tanggal Masuk -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Tanggal Masuk Pegawai : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="datepicker1" placeholder="Masukan Tanggal Masuk Pegawai" name="tgl_masuk" required>
                                            </div>
                                        </div >
                                        <br>

                                        <!-- Masukan Tanggal berakhir -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Tanggal Berakhir Pegawai : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="datepicker1" placeholder="Masukan Tanggal Berakhir Pegawai" name="tgl_berakhir">
                                            </div>
                                        </div >
                                        <br>

                        <!-- Data Pegawai -->

                        <!-- Data Diri -->
                                    <div class="form-title"><strong><font color="white">Masukan Data Pribadi Pegawai</font></strong></div>
                                        <br>

                                        <!-- Input No KTP -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">No KTP : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="contract-name" placeholder="Masukan No KTP" name="no_ktp" required>
                                            </div>
                                        </div >

                                        <!-- Input NPWP -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">NPWP : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="contract-name" placeholder="Masukan NPWP" name="npwp" required>
                                            </div>
                                        </div >

                                        <!-- Input Nama Pegawai -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Nama Pegawai : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama Pegawai" name="nama" required>
                                            </div>
                                        </div >

                                        <!-- Input Tempat Lahir -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Tempat Lahir : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="contract-name" placeholder="Masukan Tempat Lahir" name="tempat_lahir" required>
                                            </div>
                                        </div >

                                        <!-- Input Tanggal Lahir -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Tanggal Lahir : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="datepicker" placeholder="Masukan Tanggal Lahir" name="tgl_lahir" required>
                                            </div>
                                        </div >

                                        <!-- Input Alamat -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Alamat : </label>
                                            <div class="col-lg-9">
                                                <textarea class="form-control" name="alamat" placeholder="Masukan Alamat Pegawai" rows="2" required></textarea>
                                            </div>
                                        </div >

                                        <!-- Input No Telepon -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">No Telepon : </label>
                                            <div class="col-lg-9">
                                                <input name="n_hp" class="form-control" placeholder="No Telepon" type="text" data-mask="" required data-inputmask="'mask': ['9999-9999-9999'] ">
                                            </div>
                                        </div >

                                        <!-- Input Jenis Kelamin -->
                                        <div class="form-group">
                                        <label for = "contact-msg" class="col-lg-3 control-label">Jenis Kelamin : </label>
                                          <div class="col-lg-9">
                                          <div class="radio3 radio-check radio-inline">
                                            <input type="radio" id="radio4" name="jk" value="Laki-Laki">
                                            <label for="radio4">
                                              Laki-laki
                                            </label>
                                          </div>
                                          <div class="radio3 radio-check radio-success radio-inline">
                                            <input type="radio" id="radio5" name="jk" value="Perempuan">
                                            <label for="radio5">
                                              Perempuan
                                            </label>
                                          </div>
                                          </div>
                                        </div>
                                      
                                        <!-- Masukan Masukan Foto -->
                                        <div class="form-group">
                                            <label for="contact-name" class="col-lg-3 control-label">Foto Karyawan : </label>
                                            <div class="col-lg-9">
                                                <input type="file" name="foto" id="foto">
                                            </div>
                                        </div>
            <!-- Data Diri -->

                                        <!-- Button -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                        <button type="submit" class="btn btn-success" ><span class="icon fa fa-user-plus"></span> Tambah</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>


        <?php
            if($_SESSION['level']=="1"){
        ?>
        <div class="clearfix margin-bottom-10">
              <div class="btn-group">                               
              <button a href="#daftar" data-toggle="modal" class="btn btn-success"><span class="icon fa fa-tasks"></span>
                 Tambah Data Pegawai
                 </button>
              </div>
        </div>
         <?php
            }
        ?>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Status Kerja</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Berakhir</th>
                    <td>Foto</td>
                    <!-- <th>No KTP</th>
                    <th>NPWP</th>
                    <th>Nama Bank</th>
                    <th>No Rekening</th>
                    <th>Nama Jabatan</th>
                    <th>No Hp</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                     -->
                    
                    <th align="center">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php 
            if($hasil != null){
                while($kolom=mysqli_fetch_array($hasil)){
                ?>
                <tr>
                    <td><?php echo $kolom['nip']?></td>
                    <td><?php echo $kolom['nama']?></td>
                    <td><?php echo $kolom['s_kerja']?></td>
                    <td>
                        <?php
                            $tgl_masuk1 = explode("-", $kolom['tgl_masuk']);
                            $tgl_masuk = $tgl_masuk1[2]."-".$tgl_masuk1[1]."-".$tgl_masuk1[0];
                            echo $tgl_masuk;
                        ?>    
                    </td>
                    <td>
                        <?php
                            $tgl_berakhir1 = explode("-", $kolom['tgl_berakhir']);
                            $tgl_berakhir = $tgl_berakhir1[2]."-".$tgl_berakhir1[1]."-".$tgl_berakhir1[0];
                            echo $tgl_berakhir;
                        ?>    
                    </td>
                    

                    <td>
                    <?php 
                        $foto = $kolom['foto'];
                        if (empty($foto)) 
                            echo "<strong><img src='../gambar/no_Image.jpg' width='50' height='50'> <br></strong>";
                        else
                            echo"<img src='../gambar/$foto' width='50px' heigth='50px'/ >"
                    ?>
                    </td>

                    <td align="center">
                        <a href="media.php?page=detail_pegawai&id=<?php echo $kolom['nip']; ?>" class="btn btn-success"><span  class="fa fa-external-link" aria-hidden="true"> Detail Pegawai </span></a>
                        
                    </td>
                </tr>
                <?php 
                }
            }
            else {
                echo "data kosong";
            }
            ?>
            </tbody>
        </table>
        <!-- page script -->
<script>
  //datatables untuk pencarian, paging dan sorting
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  //datepicker untuk tanggal
  $('#datepicker').datepicker({
      format: 'yyyy/mm/dd',
      autoclose: true
    });
  $('#datepicker1').datepicker({
      format: 'yyyy/mm/dd',
      autoclose: true
    });
  //input mask untuk no telepon
    $("[data-mask]").inputmask();


</script>



                     
</body>

</html>

