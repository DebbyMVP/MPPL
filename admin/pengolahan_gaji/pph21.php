 <?php 
 include"../config/koneksi.php";
  ?>
  <div class="row">
    <div class="col-md-12">
      <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">DATA PPH21 YANG DIBERIKAN </a></li>
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
                        <h4 class="modal-title" id="myModalLabel">PPH21 </h4>
                    </div>
                    <form class="form-horizontal" action="pengolahan_gaji/simpan_pph21.php" method="post">
                    <div class="modal-body">
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
                            <label for = "contact-msg" class="col-lg-3 control-label">Status : </label>
                            <div class="col-lg-9">
                                <select class="form-control" name="status">
                                    <option value="pilih_status">Pilih Status</option>
                                   <option value="tk">TK</option>
                                   <option value="k/-">K/-</option>
                                   <option value="k/1">K/1</option>
                                   <option value="k/2">K/2</option>
                                   <option value="k/3">K/3</option>
                                </select>
                            </div>
                        </div >
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Gaji Pokok : </label>
                            <div class="col-lg-9">
                                <input name="gaji_pokok" class="form-control" placeholder="Gaji Pokok" type="text" required="">
                            </div>
                        </div >
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Lembur : </label>
                            <div class="col-lg-9">
                                <input name="lembur" class="form-control" placeholder="Lembur" type="text" required="">
                            </div>
                        </div >

                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Biaya Jabatan : </label>
                            <div class="col-lg-9">
                                <input name="biaya_jab" class="form-control" placeholder="Biaya Jabatan" type="text" required="">
                            </div>
                        </div >
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">BPJS Kes : </label>
                            <div class="col-lg-9">
                                <input name="bpjs_kes" class="form-control" placeholder="BPJS Kes" type="text" required="">
                            </div>
                        </div >
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">BPJS Ket : </label>
                            <div class="col-lg-9">
                                <input name="bpjs_ket" class="form-control" placeholder="BPJS Ket" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for = "contact-msg" class="col-lg-3 control-label">Telat/Alpa : </label>
                            <div class="col-lg-9">
                                <input name="telat_alpa" class="form-control" placeholder="Telat/Alpa" type="text" required="">
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
             Tambah PPH21
             </button>
          </div>
    </div>
    <br>
       <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Bulan/Tahun</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Gaji Poko</th>
                <!-- <th>Lembur</th> -->
                <th>Penghasilan Setahun</th>
                <th>Total Pengurang</th>
                <th>Penghasilan Kena Pajak</th>
                <!-- <th>PPH Terhutang Setahun</th> -->
                <!-- <th>PPh Terhutang Sebulan</th> -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php 
          $hasil=mysqli_query($koneksi,"SELECT *
                                        FROM `t_pegawai` JOIN `t_jabatan` USING(`kd_jabatan`) JOIN
                                        `t_gaji_pegawai`USING(`nip`);");
        if($hasil != null){
            while($kolom=mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td><?php echo $kolom['bulan']." ".$kolom['tahun']?></td>
                <td><?php echo $kolom['nip']?></td>
                <td><?php echo $kolom['nama']?></td>
                <td><?php echo $kolom['status']?></td>
                <td><?php echo number_format($kolom['gaji_pokok'],2,',','.');?></td>
                <td><?php echo number_format($kolom['peng_tahun'],2,',','.');?></td>
                <td><?php echo number_format($kolom['total_pengu'],2,',','.');?></td>
                <td><?php echo number_format($kolom['peng_kena_pajak'],2,',','.');?></td>
                <td>
                     <a href="media.php?page=detail_pph21&id_gaji=<?php echo $kolom['id_gaji']; ?>"><button type="button" class="btn btn-success"><span  class="fa fa-external-link"aria-hidden="true"> Detail </span></button></a>
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