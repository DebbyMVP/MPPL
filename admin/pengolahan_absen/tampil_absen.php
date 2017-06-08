 <?php 
 include"../config/koneksi.php";
  ?>
  <div class="row">
    <div class="col-md-12">
      <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">DATA ABSENSI</a></li>
          <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
      <!-- tampil gaji pegawai bulan ini -->
     <!-- Modal -->
        <div class="modal fade modal-primary" id="daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <!-- bayarkan gaji pegawai -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Absen </h4>
                    </div>

                    <form class="form-horizontal" action="pengolahan_absen/simpan_absen.php" method="post">
              
                    <div class="modal-body">
                    <div class="form-group">
                     <label for="contact-name" class="col-lg-3 control-label">Masukan Tanggal : </label>
                      <div class="col-lg-9">
                            <input type=date name="tanggal"  class="form-control"></input>
                      </div>
                    </div>
                    <div class="form-group">
                            <label for="contact-name" class="col-lg-3 control-label">NIP : </label>
                            <div class="col-lg-9">
                                <select class="form-control" name="nip">
                                    <option>Pilih NIP</option>
                                    <?php 
                                    $query1 = "SELECT `nip` FROM `t_pegawai`;";
                                    $sql1 = mysqli_query($koneksi,$query1);
                                    while ( $baris = mysqli_fetch_array($sql1)) {
                                        echo '<option value="'.$baris['nip'].'">'.$baris['nip'].'</option>';
                                    }
                                     ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="contact-name" class="col-lg-3 control-label">Jabatan : </label>
                            <div class="col-lg-9">
                                <select class="form-control" name="kd_jabatan">
                                    <option>Pilih Jabatan</option>
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
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Jam Masuk : </label>
                            <div class="col-lg-9">
                               <input type=time name="jam_masuk"  class="form-control"></input>
                            </div>
                        </div >
                         <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Jam Keluar : </label>
                            <div class="col-lg-9">
                               <input type=time name="jam_keluar"  class="form-control"></input>
                            </div>
                        </div >
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Keterangan : </label>
                            <div class="col-lg-9">
                                <input name="keterangan" class="form-control" placeholder="Keterangan" type="text" required="">
                            </div>
                        </div >

                       
          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-success" ><span class="icon fa fa-user-plus"></span> Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <div class="clearfix margin-bottom-10">
          <div class="btn-group">                               
          <button a href="#daftar" data-toggle="modal" class="btn btn-success"><span class="icon fa fa-tasks"></span>
             Tambah Absen
             </button>
          </div>
    </div>
    <br>
       <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>KODE ABSEN</th>
                <th>TANGGAL</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>JABATAN</th>
                <th>JAM MASUK</th>
                <th>JAM KELUAR</th>
                <th>KETERANGAN</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php 
          $hasil=mysqli_query($koneksi,"SELECT *
                                        FROM `t_absen` JOIN `t_jabatan` USING(`kd_jabatan`) JOIN
                                        `t_pegawai`USING(`nip`);");
        if($hasil != null){
            while($kolom=mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td><?php echo $kolom['kd_absen']?></td>
                <td>
                  <?php
                      $tgl1 = explode("-", $kolom['tanggal']);
                      $tgl = $tgl1[2]."-".$tgl1[1]."-".$tgl1[0];
                      echo $tgl;
                  ?>      
                </td>
                <td><?php echo $kolom['nip']?></td>
                <td><?php echo $kolom['nama']?></td>
                <td><?php echo $kolom['nama_jabatan']?></td>
                <td><?php echo $kolom['jam_masuk']?></td>
                <td><?php echo $kolom['jam_keluar']?></td>
                <td><?php echo $kolom['keterangan']?></td>
                <td>
                     <a href="media.php?page=edit_absen&kd_absen=<?php echo $kolom['kd_absen']; ?>"><button type="button" class="btn btn-success"><span  class="fa fa-external-link"aria-hidden="true"> EDIT </span></button></a>
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
     

          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->


  <script>
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
</script>