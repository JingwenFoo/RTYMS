<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/registrationController.php';

  $runner = new registerController();

  if(isset($_POST['add'])){
    $runner->addRunner();
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
          <input type="text" name="runnerName" class="form-control" placeholder="Full Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-suitcase"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="runnerUsername" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-at"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="runnerPassword" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
            // Given password
$password = 'user-input-pass';

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}else{
    echo 'Strong password.';
}
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="runnerPhone" class="form-control" placeholder="xxx-xxxxxxx" pattern="[0-9]{3}-[0-9]{7}" title="eg: 012-1234567" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select name="vehicleType" class="form-control" required>
            <option style="display: none;" dissabled selected>Vehicle Type</option>
            <option>Motorcycle</option>
            <option>Car</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-car-side"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="vehiclePlate" pattern="[A-Z]{2,3} [0-9]{3,4}" class="form-control" placeholder="Plate No" title="ABC 1234" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-ad"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3"><br>
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
