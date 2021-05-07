<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/foodController.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/registrationController.php';

$itemID = $_GET['itemID']; //retrieve id

$item = new foodController();
$data = $item->viewItems($itemID); //main data
$link = $item->viewItems($itemID); //site link

$name = new registerController();
$datas = $name->viewFoodSP();

if(isset($_POST['update'])){
    $item->editItem();
}

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RTYMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../ApplicationLayer/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../../ApplicationLayer/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../ApplicationLayer/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../ApplicationLayer/template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../ApplicationLayer/template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../ApplicationLayer/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../ApplicationLayer/template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../ApplicationLayer/template/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel = "icon" href ="../../../ApplicationLayer/template/Falahicon.png">
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
        <a href="foodSPMain.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <!--input class="form-control form-control-navbar" type="search" placeholder="Falah" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div-->
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <form action="../../../BusinessServicesLayer/controller/loginController.php" method="GET"> <button name="logout" type="submit" class="btn btn-block btn-default">Logout</button></form>
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
    <a href="foodSPMain.php" class="brand-link">
      <img src="../../../ApplicationLayer/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">RTYMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../ApplicationLayer/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info"><?php foreach($datas as $rows){ ?>
          <a href="#" class="d-block"><?=$rows['spName']?><?php } ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Menu</li>
          <li class="nav-item">
            <a href="foodSPMain.php" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="foodAddItem.php" class="nav-link" title>
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Item
                <!--span class="badge badge-info right">+</span-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="foodViewOrder.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i></i>
              <p>
                Manage Order
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="foodViewProfile.php" class="nav-link " title>
              <i class="nav-icon fas fa-edit"></i></i>
              <p>
                View Profile
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
            <h1 class="m-0 text-dark">Edit Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="foodSPMain.php">Home</a></li> 
              <li class="breadcrumb-item"><a href="foodSPMain.php">Item</a></li>
              <?php foreach($link as $con) { ?>
              <li class="breadcrumb-item active"><?=$con['itemName']?></li>
              <?php } ?>
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
                <h3 class="card-title"><i class="nav-icon fas fa-user"></i> Item Details</h3>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <div class="">
                        <label>Product name</label>
                        <input type="text" class="form-control" name="itemName" value="<?=$row['itemName']?>" style="width: auto" required>
                      </div>
                  </div>
                  <div class="row">
                  <div class="col-md-4">
                    <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                       <div class="">
                          <label for="price">Item price</label>
                          <div class="input-group"  required style="width: ">
                            <div class="input-group-prepend">
                            <span class="input-group-text">MYR</span>
                            </div>
                            <input id="price" name="itemPrice" type="number" min="1" step=".01" class="form-control" value="<?=$row['itemPrice']?>" required>
                          </div>
                       </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                        <div class="">
                          <label for="qty">Quantity</label>
                          <input id="qty" name="itemQty" type="number" min="1" max="2000" class="form-control" style="width:" value="<?=$row['itemQty']?>" required>
                        </div>
                    </div>
                  </div>
                </div> 
                </div>
                <div class="col-md-6">
                  <form>
                  <div class="form-group" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <label>Photo</label>
                      <img src="<?="../../../ApplicationLayer/template/image/".$row['image']?>" id="image" name="image" alt="" style="width: 100px; height:130px; border-style: groove; overflow: hidden; margin:5px">
                      <input type="text" id="photoImage" value="<?=$row['image'] ?>" size="30" readonly>

                        <div class="input-group">
                          <div class="custom-file">
                            <form>
                              <label class="custom-file-label" >
                              <button type="button" name="button" class="input-group custom-file-input" onclick="document.getElementById('fileName').click()" style="width:50%"></button>
                              </label>
                              <input type='file' name="photoFile" id="fileName" style=";">
                            </form>
                          </div>
                            <div class="input-group-append">
                              <form>
                              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                              <button type="button" name="button" onclick="document.getElementById('uploadFile').click()" class="input-group-text">Upload Image</button>
                              <input type='button' id="uploadFile" style="display:none" onclick="return readURL();">
                              <!--label class="custom-file-label">Select File</label-->
                              </form>
                            </div>
                        </div>
                  </div>
                  </form>
                </div>
              </div>
              <div class="row">
                 <div class="col-md-12">
                  <div class="" style="padding: 0.5rem!important;flex: 1 1 auto !important;">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="itemDesc" class="form-control" style="height:220px;width: 100%; resize: none"required> <?php echo $row['itemDesc']?></textarea>
                      </div>
                  </div><br><input type="hidden" name="itemID" value="<?=$row['itemID']?>">
                </div>
              </div>
              


            <div class="card-footer">
              <button type="button" onclick="location.href='foodSPMain.php'" class="btn btn-success"><i class="fas fa-times"></i>&nbsp;Cancel </button>&nbsp;&nbsp;
              <input type="hidden" name="data" value="<?=$row['itemID']?>+<?=$row['image']?>"><button type="submit" class="btn btn-primary" name="update"><i class="icon fas fa-check"></i>&nbsp;Update</button>
              
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
    <strong>Project &copy; RYTMS <a href="#">SDW</a>.</strong>
    Group Project.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>

  var fileName,input;
  var input = document.getElementById( 'fileName' );
  input.addEventListener( 'change', showFileName );

  function showFileName( event ) {
    // the change event gives us the input it occurred in
   input = event.srcElement;
  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
   fileName = input.files[0].name;

  document.getElementById( 'photoImage' ).value = fileName ;
  }


    $("#uploadfile").change(function() {
  readURL(input);
  });

    function readURL() {
    if (input.files && input.files[0]) {
    var reader = new FileReader();

      reader.onload = function(e) {
        $('#image').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]); // convert to base64 string
          }
      }


</script>


<!-- jQuery -->
<script src="../../../ApplicationLayer/template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../ApplicationLayer/template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../../ApplicationLayer/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../../ApplicationLayer/template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../../ApplicationLayer/template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../../ApplicationLayer/template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../../ApplicationLayer/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../ApplicationLayer/template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../../ApplicationLayer/template/plugins/moment/moment.min.js"></script>
<script src="../../../ApplicationLayer/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../../ApplicationLayer/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../../ApplicationLayer/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../ApplicationLayer/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../ApplicationLayer/template/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../ApplicationLayer/template/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../ApplicationLayer/template/dist/js/demo.js"></script>
</body>
</html>
