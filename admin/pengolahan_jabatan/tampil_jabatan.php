<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>



<body class="flat-blue">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-tasks"></i> Jabatan</h3>
            </div>
            <div class="box-body">
             <?php 
                include"../config/koneksi.php";
                $hasil=mysqli_query($koneksi,"SELECT * FROM t_jabatan");
             ?>

            <!-- Main Content -->
                     <!-- Modal -->
                        <div class="modal fade modal-primary" id="daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


                        <!-- tambah jabatan kerja -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Tambah Jabatan</h4>
                                    </div>
                                    <form class="form-horizontal" action="pengolahan_jabatan/simpan_jabatan_kerja.php" method="post">
                                    <div class="modal-body">
                                         <div class="form-group">
                                            <label for="contact-name" class="col-lg-3 control-label">KODE JABATAN : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="contract-name" placeholder="Masukan Kode jabatan" name="kd_jabatan">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">NAMA JABATAN : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama jabatan" name="nama_jabatan">
                                            </div>
                                        </div >

                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">TUNJANGAN : </label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp.</span>
                                                    <input type="text" class="form-control" placeholder="Masukan Nominal Tunjangan" name="tunjangan_jabatan">
                                                </div>
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

        <?php
            if($_SESSION['level']=="admin"){
        ?>
        <div class="clearfix margin-bottom-10">
              <div class="btn-group">                               
              <button a href="#daftar" data-toggle="modal" class="btn btn-success"><span class="icon fa fa-tasks"></span>
                 Tambah Jabatan
                 </button>
              </div>
        </div>
        <br>
        <?php
            }
        ?>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>KODE JABATAN</th>
                    <th>NAMA JABATAN</th>
                    <th>TUNJANGAN JABATAN</th>
                    <?php
                        if($_SESSION['level']=="admin"){
                    ?>
                    <th>AKSI</th>
                    <?php
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php 
            if($hasil != null){
                while($kolom=mysqli_fetch_array($hasil)){
                ?>
                <tr>
                    <td><?php echo $kolom['kd_jabatan']?></td>
                    <td><?php echo $kolom['nama_jabatan']?></td>
                    <td align="right"><?php echo "Rp. ".number_format($kolom['tunjangan_jabatan'],2,",",".")?></td>
                    <?php
                        if($_SESSION['level']=="admin"){
                    ?>
                    <td align="center">

                        <a href="media.php?page=edit_jabatan_kerja&id=<?php echo $kolom['kd_jabatan']; ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></a>
                        <a href="pengolahan_jabatan/hapus_jabatan_kerja.php?page=hapus_jabatan_kerja&id=<?php echo $kolom['kd_jabatan'];?>"onclick="return confirm('apakah yakin menghapus data ?')" ><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></a>
                    </td>
                    <?php
                        }
                    ?>
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


                     
</body>

</html>

