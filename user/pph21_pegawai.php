 <?php 
 session_start();
 $nip=$_SESSION['nip'];
 include"../config/koneksi.php";
  ?>
  <div class="row">
    <div class="col-md-12">
      <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">DATA GAJI YANG DIBERIKAN BULAN INI</a></li>
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
                    
                   
                </div>
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
                                        `t_gaji_pegawai`USING(`nip`) where nip=$nip;");
        if($hasil != null){
            while($kolom=mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td><?php echo $kolom['bulan']." ".$kolom['tahun']?></td>
                <td><?php echo $kolom['nip']?></td>
                <td><?php echo $kolom['nama']?></td>
                <td><?php echo $kolom['status']?></td>
                <td><?php echo "Rp ".number_format($kolom['gaji_pokok'],2,',','.');?></td>
                <td><?php echo "Rp ".number_format($kolom['peng_tahun'],2,',','.');?></td>
                <td><?php echo "Rp ".number_format($kolom['total_pengu'],2,',','.');?></td>
                <td><?php echo "Rp ".number_format($kolom['peng_kena_pajak'],2,',','.');?></td>
                <td>
                     <a href="media.php?page=detail_pph21_pegawai&id_gaji=<?php echo $kolom['id_gaji']; ?>"><button type="button" class="btn btn-success"><span  class="fa fa-external-link"aria-hidden="true"> Detail </span></button></a>
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