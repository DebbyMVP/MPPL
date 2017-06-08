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
                $hasil=mysqli_query($koneksi,"SELECT id, nip, nama, email, level, foto FROM users");
             ?>

            <!-- Main Content -->
                     <!-- Modal -->
                        <div class="modal fade modal-primary" id="daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                    

                        <!-- tambah jabatan kerja -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Tambah Data Admin</h4>
                                    </div>

                                    <form class="form-horizontal" action="pengolahan_admin/simpan_admin.php" method="post">
                                    <div class="modal-body">

                        <!-- Data Pegawai -->
                                    <div class="form-title"><strong><font color="white">Masukan Data Admin</font></strong></div>
                                        <br>
                                        <!-- Generate ID -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">ID : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="contract-name" name="id"  required placeholder="Masukan ID" >
                                            </div>
                                        </div >

                                        <!-- Pilih NIP -->
                                         <div class="form-group">
                                            <label for="contact-name" class="col-lg-3 control-label">NIP : </label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="nip">
                                                    <option>Pilih NIP Pegawai</option>
                                                    <?php 
                                                    $query1 = "SELECT * FROM `t_pegawai`;";
                                                    $sql1 = mysqli_query($koneksi,$query1);
                                                    while ( $baris = mysqli_fetch_array($sql1)) {
                                                        echo '<option value="'.$baris['nip'].'">'.$baris['nip'].'</option>';
                                                    }
                                                     ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Input Username -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Username : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="contract-name" placeholder="Masukan Username" name="username" required>
                                            </div>
                                        </div >

                                        <!-- Input Password -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Password : </label>
                                            <div class="col-lg-9">
                                                <input type="password" class="form-control" id="contract-name" placeholder="Masukan Password" name="password" required>
                                            </div>
                                        </div >

                                        <!-- Input Nama -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Nama : </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama" name="nama" required>
                                            </div>
                                        </div >

                                        <!-- Input E-mail -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Email : </label>
                                            <div class="col-lg-9">
                                                <input type="email" class="form-control" id="contract-name" placeholder="Masukan E-mail" name="email" required>
                                            </div>
                                        </div >
                                      
                                        <!-- Pilih Level Administrator -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Level Hak Akses : </label>
                                            <div class="col-lg-9">
                                                <select name="level" class="form-control" required>
                                                    <option value=""> Pilih Level Hak Akses</option>
                                                    <option value="1">Administrator</option>
                                                    <option value="2">User</option>                                
                                                </select>
                                        </div>
                                        </div>

                                        <!-- Masukan Masukan Foto -->
                                        <div class="form-group">
                                            <label for = "contact-msg" class="col-lg-3 control-label">Foto Admin : </label>
                                            <div class="col-lg-9">
                                                <input type="file" name="foto" id="foto">
                                            </div>
                                        </div>

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


        <div class="clearfix margin-bottom-10">
              <div class="btn-group">                               
              <button a href="#daftar" data-toggle="modal" class="btn btn-success"><span class="icon fa fa-tasks"></span>
                 Tambah Data Admin
                 </button>
              </div>
              
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Foto</th>
                    <th align="center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            if($hasil != null){
                while($kolom=mysqli_fetch_array($hasil)){
                ?>
                <tr>
                    <td><?php echo $kolom['id']?></td>
                    <td><?php echo $kolom['nip']?></td>
                    <td><?php echo $kolom['nama']?></td>
                    <td><?php echo $kolom['email']?></td>
                    <td><?php echo $kolom['level']?></td>
                    <td>
                    <?php 
                        $foto = $kolom['foto'];
                        if (empty($foto)) 
                            echo "<strong><img src='../gambar/no_Image.jpg' width='50' height='50'> <br></strong>";
                        else
                            echo"<img src='../gambar/$foto' width=75 heigth=25/ >"
                    ?>
                    </td>
                    <td align="center">
                        <a href="media.php?page=edit_admin&id=<?php echo $kolom['id']; ?>"><button type="button" class="btn btn-success"><span  class="fa fa-external-link"aria-hidden="true"> Ubah Data </span></button></a>
                        <a href="pengolahan_admin/hapus_admin.php?page=hapus_admin&id=<?php echo $kolom['id'];?>"onclick="return confirm('apakah yakin menghapus data ?')" ><button type="button" class="btn btn-danger"><span class="fa fa-remove"> Hapus Data</span></button></a>
                        
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
</script>



                     
</body>

</html>

