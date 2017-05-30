<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>



<body class="flat-blue">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-tasks"></i> Pegawai Cuti</h3>
            </div>
            <div class="box-body">
             <?php 
                include"../config/koneksi.php";
                $hasil=mysqli_query($koneksi,"SELECT `nip`,`nama`,`nama_bagian`,`kd_absen`,`keterangan`,`lembur` FROM `t_pegawai` JOIN `t_bagian` USING(`kd_bagian`) JOIN`t_absen` USING(`nip`) WHERE tanggal LIKE CURDATE() AND `keterangan` LIKE 'cuti';");
             ?>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Nama Bagian</th>
                    <th>Keterangan</th>
                    <th>Lembur</th>
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
                    <td><?php echo $kolom['nama_bagian']?></td>
                    <td><?php echo $kolom['keterangan']?></td>
                    <td><?php echo $kolom['lembur']?></td>
                    <td align="center">
                        <a href="media.php?page=detail_pegawai&id=<?php echo $kolom['nip']; ?>"><button type="button" class="btn btn-success"><span  class="fa fa-external-link"aria-hidden="true"> Detail Pegawai </span></button></a>
                        
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

