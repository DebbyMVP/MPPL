 <?php 
 include"../config/koneksi.php";
  ?>
  <div class="row">
    <div class="col-md-12">
      <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">DATA GAJI YANG DIBERIKAN</a></li>
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
                        <h4 class="modal-title" id="myModalLabel">Slip Gaji</h4>
                    </div>
                    <form class="form-horizontal" action="pengolahan_gaji/simpan_slip.php" method="post">
                    <div class="modal-body">
                    <div class="form-group">
                            <label for="contact-name" class="col-lg-3 control-label">bulan : </label>
                            <div class="col-lg-9">
                                <select class="form-control" name="bulan">
                                    <option>Pilih bulan</option>
                                    <?php 
                                    $query1 = "SELECT distinct `bulan` FROM `t_gaji_pegawai`;";
                                    $sql1 = mysqli_query($koneksi,$query1);
                                    while ( $baris = mysqli_fetch_array($sql1)) {
                                        echo '<option value="'.$baris['bulan'].'">'.$baris['bulan'].'</option>';
                                    }
                                     ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-name" class="col-lg-3 control-label">Tahun : </label>
                            <div class="col-lg-9">
                                <select class="form-control" name="tahun">
                                    <option>Pilih Tahun</option>
                                    <?php 
                                    $query1 = "SELECT distinct `tahun` FROM `t_gaji_pegawai`;";
                                    $sql1 = mysqli_query($koneksi,$query1);
                                    while ( $baris = mysqli_fetch_array($sql1)) {
                                        echo '<option value="'.$baris['tahun'].'">'.$baris['tahun'].'</option>';
                                    }
                                     ?>
                                </select>
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
                            <label for = "contact-msg" class="col-lg-3 control-label">Working Days : </label>
                            <div class="col-lg-9">
                                <input name="work_days" class="form-control" placeholder="Gaji Pokok" type="text" required="">
                            </div>
                        </div >
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Net Payable Days : </label>
                            <div class="col-lg-9">
                                <input name="net_pay_days" class="form-control" placeholder="Lembur" type="text" required="">
                            </div>
                        </div >

                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Pay Mode : </label>
                            <div class="col-lg-9">
                                <input name="pay_mode" class="form-control" placeholder="Biaya Jabatan" type="text" required="">
                            </div>
                        </div >
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">BASIC SALARY : </label>
                            <div class="col-lg-9">
                                <input name="gaji_pokok" class="form-control" placeholder="BASIC SALARY" type="text" required="">
                            </div>
                        </div >
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Bonus : </label>
                            <div class="col-lg-9">
                                <input name="bonus" class="form-control" placeholder="Bonus" type="text" required="">
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
             Tambah Slip Gaji
             </button>
          </div>
    </div>
    <br>
       <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Bulan/Tahun</th>
                <th>Employee No</th>
                <th>Employee Name</th>
                <th>Joining Date</th>
                <th>NPWP</th>
                <!-- <th>Net Payable Days</th> -->
                <!-- <th>Lembur</th> -->
                <th>Designation</th>
                <th>Pay Mode</th>
                <!-- <th>PPH Terhutang Setahun</th> -->
                <!-- <th>PPh Terhutang Sebulan</th> -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php 
          $hasil=mysqli_query($koneksi,"SELECT * FROM `slip_gaji` JOIN `t_gaji_pegawai` USING(`id_gaji`) JOIN
                                        `t_pegawai`USING(`nip`) JOIN t_jabatan USING (kd_jabatan);");
        if($hasil != null){
            while($kolom=mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td><?php echo $kolom['bulan']." ".$kolom['tahun']?></td>
                <td><?php echo $kolom['nip']?></td>
                <td><?php echo $kolom['nama']?></td>
                <td>
                    <?php
                        $tgl_masuk1 = explode("-", $kolom['tgl_masuk']);
                        $tgl_masuk = $tgl_masuk1[2]."-".$tgl_masuk1[1]."-".$tgl_masuk1[0];
                        echo $tgl_masuk;
                    ?>
                </td>
                <td><?php echo $kolom['npwp']?></td>
                <td><?php echo $kolom['nama_jabatan']?></td>
                <td><?php echo $kolom['pay_mode']?></td>
                <td>
                     <a href="media.php?page=detail_slip&nip=<?php echo $kolom['nip']; ?>"><button type="button" class="btn btn-success"><span  class="fa fa-external-link"aria-hidden="true"> Detail </span></button></a>
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
    <!-- akhir tampil gaji pegawai bulan ini -->
          </div>
          </div>
          <!-- /.tab-pane -->
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