<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rtyms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    
    print '<script type="text/javascript">'; 
    print 'alert("Connection Failed!!")'; 
    print '</script>';  
}

//Assigned data from login view through login controller
  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  $userType = $_REQUEST['userType'];



// Begin if statement for userType
if(isset($_REQUEST['userType'])){
    
    //Admin
    if($userType=="Admin")
    {
      
      $query="select * from admin";
      $result=mysqli_query($conn,$query);
      $flag=0;
      while($row=mysqli_fetch_array($result))
      {
          //if enetered username, password matches db values
          if($username==$row[1] && $password==$row[2]) {
              $flag=1;
              break;
          }
      }
      if($flag==1)
      {
          $_SESSION['username']=$username;
          header("location:../../ApplicationLayer/admin/adminMain.php");
      }
      // if enetered username, password doesnt match db values
      else
      {
          header("location:../../../ApplicationLayer/Home/login.php");
      }
    }



    //SP 
    elseif ($userType=="Service Provider")
    {
      $query="select * from serviceprovider";
      $result=mysqli_query($conn,$query);
      $flag=0;
      $query1="select * from serviceprovider where spUsername='$username'and approved ='0' ";//
      $result1=mysqli_query($conn,$query1);
      if($row=mysqli_fetch_array($result1)){
          echo '<script type="text/javascript">
              alert("sorry, your account has not approved yet"); 
              </script>';
          header( "refresh:1; url=../../ApplicationLayer/home/login.php");
      }
      else{
          while($row=mysqli_fetch_array($result))
        {
          if($username==$row['spUsername'] && $password==$row['spPassword']) {
            $flag=1;
            break;
              
          }
        }      
        if($flag==1) //if enetered username, password matches db values
        {
            if($row['spType']=="Medical"){
              $_SESSION['username']=$username;
              $_SESSION['$servProvID']=$servProvID;
              $message = "Welcome 'username'!";
              echo "<script type='text/javascript'>alert('$message');</script>"; 
              header("location:../../ApplicationLayer/serviceProvider/medical/medSPMain.php?id=$username");
            }
            elseif($row['spType']=="Pet"){
              $_SESSION['username']=$username;
              $_SESSION['servProvID']=$servProvID;
              $message = "Welcome 'username'!";
              echo "<script type='text/javascript'>alert('$message');</script>"; 
              header("location:../../ApplicationLayer/serviceProvider/pet/petSPMain.php?id=$username");
            }
            elseif($row['spType']=="Good"){
              $_SESSION['username']=$username;
              $_SESSION['servProvID']=$servProvID;
              $message = "Welcome 'username'!";
              echo "<script type='text/javascript'>alert('$message');</script>"; 
              header("location:../../ApplicationLayer/serviceProvider/good/goodSPMain.php?id=$username");
            }
            elseif($row['spType']=="Food" ){
              $_SESSION['username']=$username;
              $_SESSION['servProvID']=$servProvID;
              $message = "Welcome 'username'!";
              echo "<script type='text/javascript'>alert('$message');</script>"; 
              header("location:../../ApplicationLayer/serviceProvider/food/foodSPMain.php?id=$username");
            }
            else{ //userType doesnt exists
              $message = "User does not exist";
            echo "<script type='text/javascript'>alert('$message');
                  window.location = '../../ApplicationLayer/home/login.php'; 
                  </script>";
            }
            
        }
        else// if entered username, password doesnt match db values
        {
          $message = "Username or password is incorrect";
            echo "<script type='text/javascript'>alert('$message');
                  window.location = '../../ApplicationLayer/home/login.php'; 
                  </script>";
        }
      }
    }



    //Runner
     elseif ($userType=="Runner")
    {
      $query="select * from runner";
      $result=mysqli_query($conn,$query);
      $flag=0;
      $query1="select * from runner where runnerUsername='$username'and approved ='0' ";//
      $result1=mysqli_query($conn,$query1);
      if($row=mysqli_fetch_array($result1)){
          echo '<script type="text/javascript">
              alert("sorry, your account has not approved yet"); 
              </script>';
          header( "refresh:1; url=../../ApplicationLayer/home/login.php");
      }
      else{
          while($row=mysqli_fetch_array($result))
        {
          if($username==$row['runnerUsername'] && $password==$row['runnerPassword']) {
            $flag=1;
            break;
              
          }
        }      
        if($flag==1) //if enetered username, password matches db values
        {
          $_SESSION['username']=$username;
          $_SESSION['runnerID']=$runnerID;
          header("location:../../ApplicationLayer/runner/runnerMain.php?id=$username");
            
        }
        else// if entered username, password doesnt match db values
        {
          $message = "Username or password is incorrect";
            echo "<script type='text/javascript'>alert('$message');
                  window.location = '../../ApplicationLayer/home/login.php'; 
                  </script>";
        }
      }
    }
  }
?>