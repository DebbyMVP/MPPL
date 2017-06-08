<?php
session_start();
error_reporting(1);
if(empty($_SESSION)){
  header("Location: ../index.php");
}
if($_SESSION['level']==2){
  ?>
  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KEPEGAWAIAN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>DM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HALAMAN</b>User</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../gambar/<?php echo $_SESSION['foto'];?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../gambar/<?php echo $_SESSION['foto'];?>" width="100px" heigt="100px" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['username'];?> - Pembuat Web
                  <small>Mahasiswa Unikom</small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Log Out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
          <img src="../gambar/<?php echo $_SESSION['foto'];?>" width="100px" heigt="100px" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username'];?></p>
          
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><center>DATA OLAH USER</center></li>
        <li class="active treeview">
          <a href="media.php?page=home">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="media.php?page=tampil_pegawai">
            <i class="fa fa-users"></i>
            <span>Data Pegawai</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="media.php?page=tampil_pegawai"><i class="fa fa-circle-o"></i> Tampil Data Pegawai </a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Data Gaji
            </span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <li><a href="media.php?page=pph21_pegawai"><i class="fa fa-circle-o"></i> PPH21 </a></li>
            <li><a href="media.php?page=slip_gaji"><i class="fa fa-circle-o"></i> Slip Gaji </a></li>
           
            
          </ul>
        </li>

        <li class="treeview">
          <a href="media.php?page=tampil_absen">
            <i class="fa fa-users"></i>
            <span>Data Absen</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <!--  <li><a href="media.php?page=tampil_pengajuan_cuti_pegawai"><i class="fa fa-circle-o"></i> Pengajuan Cuti </a></li> -->
            <li><a href="media.php?page=tampil_absen_pegawai"><i class="fa fa-circle-o"></i> Data Absen </a></li>
          </ul>
        </li>
            </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <br>
    <section class="content">
      <!-- Main row -->
      <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">

              <?php 
              $page = (isset($_GET['page']))? $_GET['page'] : "main";
              switch ($page) {
               // Home
              case 'home': include "../admin/home.php"; break; 
              // end home
              case 'tampil_pegawai': include "../user/tampil_pegawai.php"; break;
              
              //absen
              case 'tampil_absen_pegawai': include "../user/tampil_absen_pegawai.php"; break;
               // case 'tampil_pengajuan_cuti_pegawai': include "../user/pengajuan_cuti_pegawai.php"; break;
              //gaji
              case 'slip_gaji': include "../user/slip_gaji.php"; break;
              case 'pph21_pegawai': include "../user/pph21_pegawai.php"; break;
              case 'detail_slip': include "../user/detail_slip.php"; break;
              case 'detail_pph21_pegawai': include "../user/detail_pph21_pegawai.php"; break;
              case 'main':
              default: include 'utama.php';
              }
              ?>  
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
 <!--  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">10113096</a>.</strong> All rights
    reserved.
  </footer> -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- page script -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- Notiny -->
<script src="../plugins/notiny/notiny.min.js"></script>
<script src="../plugins/notiny/notiny.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
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




<!-- AdminLTE../ App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

</body>
</html>

  <?php 
}
else{


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KEPEGAWAIAN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>DM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HALAMAN</b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../gambar/<?php echo $_SESSION['foto'];?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../gambar/<?php echo $_SESSION['foto'];?>" width="100px" heigt="100px" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['username'];?> - Pembuat Web
                  <small>Mahasiswa Unikom</small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Log Out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
          <img src="../gambar/<?php echo $_SESSION['foto'];?>" width="100px" heigt="100px" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Sedang Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><center>DATA OLAH USER</center></li>
        <li class="active treeview">
          <a href="media.php?page=home">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="media.php?page=tampil_pegawai">
            <i class="fa fa-users"></i>
            <span>Data Pegawai</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="media.php?page=tampil_pegawai"><i class="fa fa-circle-o"></i> Tampil Data Pegawai </a></li>
            <?php
              if($_SESSION['level']=="1"){
            ?>
            <li><a href="media.php?page=hapus_pegawai"><i class="fa fa-circle-o"></i> Hapus Data Pegawai </a></li>
            <?php
              }
            ?>
          </ul>
        </li>
       <!-- <li class="treeview"> 
          <a href="media.php?page=tampil_jabatan">
            <i class="fa fa-trophy"></i>
            <span>Data Jabatan</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
        </li> -->
        <!-- <li class="treeview">
          <a href="media.php?page=tampil_bagian">
            <i class="fa fa-trophy"></i>
            <span>Data Bagian</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Data Gaji
            </span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <li><a href="media.php?page=pph21"><i class="fa fa-circle-o"></i> PPH21 </a></li>
            <li><a href="media.php?page=slip_gaji"><i class="fa fa-circle-o"></i> Slip Gaji </a></li>
           
            
          </ul>
        </li>

        <li class="treeview">
          <a href="media.php?page=tampil_absen">
            <i class="fa fa-users"></i>
            <span>Data Absen</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <!--  <li><a href="media.php?page=tampil_pengajuan_cuti"><i class="fa fa-circle-o"></i> Pengajuan Cuti </a></li> -->
            <li><a href="media.php?page=tampil_absen"><i class="fa fa-circle-o"></i> Data Absen Hari Ini</a></li>
            <!-- <li><a href="media.php?page=tampil_semua_absen"><i class="fa fa-circle-o"></i> Data Absen Global </a></li> -->
          </ul>
        </li>
        <?php
              if($_SESSION['level']=="1"){
          ?>
          <li class="header"><center>DATA OLAH ADMIN</center></li>
          
          <li class="treeview">
          <a href="media.php?page=tampil_admin">
            <i class="fa fa-user-secret"></i>
            <span>Data Admin
            </span>
            <i class="fa fa-angle-right pull-right"></i>
            <?php 
          }
           ?>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <br>
    <section class="content">
      <!-- Main row -->
      <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">

              <?php 
              $page = (isset($_GET['page']))? $_GET['page'] : "main";
              switch ($page) {
               // Home
              case 'home': include "../admin/home.php"; break; 
              // end home
              case 'tampil_pegawai': include "pengolahan_pegawai/tampil_pegawai.php"; break;
              //bagian
              case 'tampil_bagian': include "pengolahan_bagian/tampil_bagian.php"; break;
              case 'edit_bagian_kerja': include "pengolahan_bagian/edit_bagian_kerja.php"; break;
              //jabatan
              case 'tampil_jabatan': include "pengolahan_jabatan/tampil_jabatan.php"; break;
              case 'edit_jabatan_kerja': include "pengolahan_jabatan/edit_jabatan_kerja.php"; break;
              //pegawai
              case 'tampil_pegawai': include "pengolahan_pegawai/tampil_pegawai.php"; break;
              case 'edit_pegawai': include "pengolahan_pegawai/edit_pegawai.php"; break;
              case 'detail_pegawai': include "pengolahan_pegawai/detail_pegawai.php"; break;
              case 'hapus_pegawai': include "pengolahan_pegawai/hapus_pegawai.php"; break;
              //absen
              case 'tampil_absen': include "pengolahan_absen/tampil_absen.php"; break;
              case 'edit_absen': include "pengolahan_absen/edit_absen.php"; break;
              // case 'tampil_pengajuan_cuti': include "pengolahan_absen/pengajuan_cuti.php"; break;
              //gaji
              case 'slip_gaji': include "pengolahan_gaji/slip_gaji.php"; break;
              case 'pph21': include "pengolahan_gaji/pph21.php"; break;
              case 'detail_slip': include "pengolahan_gaji/detail_slip.php"; break;
              case 'detail_pph21': include "pengolahan_gaji/detail_pph21.php"; break;
              case 'main':
              //admin
              case 'tampil_admin': include "pengolahan_admin/tampil_admin.php"; break;
              case 'edit_admin': include "pengolahan_admin/edit_admin.php"; break;
              case 'ubah_admin': include "pengolahan_admin/ubah_admin.php"; break;

              default: include 'utama.php';
              }
              ?>  
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">10113096</a>.</strong> All rights
    reserved.
  </footer> -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- page script -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- Notiny -->
<script src="../plugins/notiny/notiny.min.js"></script>
<script src="../plugins/notiny/notiny.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
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




<!-- AdminLTE../ App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

</body>
</html>
<?php } ?>
