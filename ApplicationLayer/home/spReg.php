<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/registrationController.php';

  $sp = new registerController();

  if(isset($_POST['add'])){
    $sp->addSP();
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RTYMS | SP Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../ApplicationLayer/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../ApplicationLayer/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../ApplicationLayer/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel = "icon" href ="../../ApplicationLayer/template/Falahicon.png">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>RTMYS</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register as Service Provider</p>

      <form role="form" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" name="spName" class="form-control" placeholder="Company's Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-suitcase"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="spUsername" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-at"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="spPassword" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="spEmail" class="form-control" placeholder="Email"  title="eg: noreply@example" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="spPhone" class="form-control" placeholder="xxx-xxxxxxx" pattern="[0-9]{3}-[0-9]{7}" title="eg: 012-1234567" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="ssm" class="form-control" placeholder="xxxxxx-x" pattern="[0-9]{6}-[A-Z]{1}" title="eg: 123456-A" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-badge"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <textarea id="description" name="spAddress" placeholder="Address" class="form-control" style="resize: none"required></textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select name="spType" class="form-control" required>
            <option style="display: none;" dissabled selected>Category</option>
            <option>Good</option>
            <option>Food</option>
            <option>Pet</option>
            <option>Medical</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-th-list"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <div class="form-group">
            <label style="font-weight:normal;width:100%;color: #b0b0b0">Image: <input type="text" id="photoImage" value="" size="20" placeholder="  Image file name" readonly required></label>
              <div style="width:100%;text-align: center">
                <img src="../../ApplicationLayer/template/white.jpg" id="image" name="stdImage" alt="blank" style="width: 130px; height:130px; border-style: groove; overflow: hidden; margin:5px"> 
              </div>
              <div class="input-group">
                <div class="custom-file">
                  <form>
                    <label class="custom-file-label">
                      <button type="button" name="button" class="input-group custom-file-input" onclick="document.getElementById('fileName').click()" style="width:50%" ></button></label>
                      <input type='file' name="photoFile" id="fileName" required>
                  </form>
                </div>
                <div class="input-group-append">
                  <form>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                      <button type="button" name="button" onclick="document.getElementById('uploadFile').click()" class="input-group-text">Upload Image</button>
                      <input type='button' id="uploadFile" style="display:none" onclick="return readURL();">
                  </form>
                </div><br>
              </div>
          </div><br>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="add" class="btn btn-primary btn-block">Register</button>
          </div>

          <!-- /.col -->
        </div><p style="text-align: center!important;"><a href="login.php" class="text-center" style="text-align: center!important;display: inline-block;"> Cancel</a></p>
        </div>  
          
      </form>

      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->


<script> //upload image

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


  function readURL() {
    if (input.files && input.files[0]) {
    var reader = new FileReader();

      reader.onload = function(e) {
        $('#image').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  function validate(){
    var nme = document.getElementById("fileName");
      if(nme.value.length < 4) {
          alert('Must Select any of your photo for upload!');
          nme.focus();
          return false;
      }
  }

</script>

<!-- jQuery -->
<script src="../../ApplicationLayer/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../ApplicationLayer/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../ApplicationLayer/template/dist/js/adminlte.min.js"></script>
</body>
</html>
