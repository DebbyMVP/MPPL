<!DOCTYPE html>
<html>
<?php 
session_start();
 ?>
<head>
	<title>Home Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
<?php 
include"../config/koneksi.php";
$hasil = mysqli_query($koneksi,"select * FROM pengumuman order by kd_pengumuman desc limit 1");
$data=mysqli_fetch_array($hasil);

$foto = $data['foto'];
 ?>
<div class="modal fade modal-primary" id="daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pengumuman</h4>
            </div>
            <form class="form-horizontal" action="pengumuman.php" method="post" enctype="multipart/form-data" name="FormUpload" id="FormUpload">
            <div class="modal-body">

<!-- pengumuman -->
            <!-- <div class="form-title"><strong><font color="white">Pengumuman</font></strong></div>
                <br> -->
                
                <div class="form-group">
                  <label>Masukan Pengumuman</label>
                  <textarea class="form-control" rows="3" placeholder="Tuliskan Pengumuman" name="pengumuman"></textarea>
                </div>

                <input type="hidden" value="<?php ?> " name="foto1"> </input>

                <!-- Button -->
            </div>
            <div class="modal-footer">
            <input type="file" name="foto">
<!--     <input type="submit" value="Upload"> -->
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
                 Tambah Pengumuman
                 <?php 
                 } ?>
                 </button>
              </div>
        </div>

<div class="pad margin no-print">
<div class="callout callout-info" style="margin-bottom: 0!important;">
<h4>
<i class="fa fa-info"></i>
Note:
</h4>
<?php 
echo "$data[nama_pengumuman]"; ?>
</div>
</div>
<!-- caraousel -->
<!-- pengumuman gambar -->
<center>

<?php 


      if (empty($foto)) 
          echo "<strong><img src='../gambar/no_Image.jpg' width='500px' height='500px'> <br></strong>";
      else
          echo"<img src='../gambar/$foto' width='500px' heigth='500px'/ >"
?>
  </td>
</center>
</body>
</html>