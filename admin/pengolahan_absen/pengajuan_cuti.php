<!DOCTYPE html>
<html>
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
$hasil = mysqli_query($koneksi,"select * FROM cuti order by id desc limit 1");
$data=mysqli_fetch_array($hasil);


 ?>
<div class="modal fade modal-primary" id="daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
     
            </div>
        </div>
    </div>
</div>

 <div class="clearfix margin-bottom-10">
              <div class="btn-group"> 
               <h4 class="modal-title" id="myModalLabel">Pilih File</h4>                             
              <input type="file" name="file"></input>
                
              </div>
        </div>

<div class="pad margin no-print">
<div class="callout callout-info" style="margin-bottom: 0!important;">