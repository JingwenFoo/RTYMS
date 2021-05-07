<?php
require_once '../controller/studentController.php';

$ic = $_GET['ic'];

$student = new studentController();
$data = $student->viewUser($ic);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SDW Admin Template</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel = "icon" href ="../Falahicon.png">
</head>



<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Falah" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Falah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Kim Woobin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Student Profile</li>
          <li class="nav-item">
            <a href="addStudent.php" class="nav-link" title>
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add New Student
                <!--span class="badge badge-info right">+</span-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php" class="nav-link  active">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Student List
              </p>
            </a>
          </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Registration</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Student Registration</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main row -->

              <!-- /.card-header -->
              <!-- form start -->
          <form role="form" action="" method="POST" enctype="multipart/form-data">
            <?php
            foreach($data as $row){
                ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-user"></i> Student's Information</h3>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <div class="">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="<?=$row['studname']?>" style="width: auto" readonly>
                      </div>
                  </div>
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                     <div class="">
                        <label>IC Number</label>
                        <input type="tel" class="form-control" name="ic" value="<?=$row['ic']?>" style="width: auto" readonly>
                      </div>
                  </div>
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <div class="">
                        <label>Tel No</label>
                        <input type="tel" class="form-control" name="phone" value="<?=$row['phone']?>" style="width: auto" placeholder="XXX-XXXXXXX" pattern="[0-9]{3}-[0-9]{7}" readonly>
                      </div>
                  </div>
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <div class="">
                        <label>Gender</label>
                         <input type="text" class="form-control" name="gender" value="<?=$row['gender']?>" style="width: auto" readonly>
                      </div>
                  </div>
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <div class="">
                        <label>Class</label>
                        <input type="text" class="form-control" name="class" value="<?=$row['class']?>" style="width: auto" readonly>
                      </div><br>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <label>Photo</label>
                      <img src="<?="../image/".$row['image']?>" id="image" name="stdImage" alt="blank" style="width: 100px; height:130px; border-style: groove; overflow: hidden; margin:5px">
                      <input type="text" id="photoImage" value="<?=$row['image'] ?>" size="30" readonly>
                      <!-- <img class="attachment-img" src="" alt=""> -->
                        <!--div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="photo" class="custom-file-input" id="exampleInputFile" size="30" required>
                            <label class="custom-file-label">Select File</label>

                         </div>
                          <div class="input-group-append">
                            <button type="submit" name=""class="input-group-text" id="">Upload Photo</button>
                          </div>
                        </div-->
                  </div>
                </div>
              </div>

              <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-user"></i> Parent's Information</h3>
              </div>
              <div class="row">
                 <div class="col-md-6">
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <div class="">
                        <label>Father's Name</label>
                        <input type="text" class="form-control" name="fName" value="<?=$row['fName']?>" style="width: auto" readonly>
                      </div>
                  </div>
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                     <div class="">
                        <label>IC Number</label>
                        <input type="tel" class="form-control" name="fIC" value="<?=$row['fIC']?>" style="width: auto" readonly>
                      </div>
                  </div><br>
                </div>
                <div class="col-md-6">
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <div class="">
                        <label>Mothers Name</label>
                        <input type="text" class="form-control" name="mName" value="<?=$row['mName']?>" style="width: auto" readonly>
                      </div>
                  </div>
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                     <div class="">
                        <label>IC Number</label>
                        <input type="tel" class="form-control" name="mIC" value="<?=$row['mIC']?>" style="width: auto" readonly>
                      </div>
                  </div>
                </div>
              </div>
              <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-user"></i> Emergency Contact Details</h3>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <div class="">
                        <label>Name</label>
                        <input type="text" class="form-control" name="eName" value="<?=$row['eName']?>" style="width: 100%" placeholder="Name" readonly>
                      </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <div class="">
                        <label>Relationship</label>
                        <input type="text" class="form-control" name="eRel" value="<?=$row['eRel']?>" style="width: 70%" placeholder="Relationship" readonly> 
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <div class="">
                        <label>Tel No</label>
                       <input type="tel" class="form-control" name="ePhone" value="<?=$row['ePhone']?>" style="width: 40%" placeholder="XXX-XXXXXXX" pattern="[0-9]{3}-[0-9]{7}" readonly>
                      </div>
                  </div>
                </div>

              </div>


            <div class="card-footer">
              <button type="button" onclick="location.href='index.php'" class="btn btn-success"><i class="fas fa-chevron-left"></i>&nbsp;Back</button>&nbsp;&nbsp;
            </div>

            </div><?php } ?>

          </form>
        </div>



        <!--div class="row">

        </div-->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Lab &copy; CB18022 <a href="http://google.com/">SDW</a>.</strong>
    Lab Assesement 1.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 4.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
