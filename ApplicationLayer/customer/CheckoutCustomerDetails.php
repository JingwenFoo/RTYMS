  <?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/CustomerController.php';
    //$_SESSION['customerName'] = $_POST['customerName'];


$cust = new customerController();
if (isset($_POST['addCustomer'])){
   $_SESSION['customerName'] = $_POST['customerName'];
   $_SESSION['customerAddress'] = $_POST['customerAddress'];
   $_SESSION['customerPhone'] = $_POST['customerPhone'];
   $_SESSION['customerEmail'] = $_POST['customerEmail'];

   $cust->addCustomer();
}

    $total=$_GET['total'];


?>

<html>
    <head>
        <title>RTYMS | Customer Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Add meta tags for mobile and IE (from PayPal)-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <style>
            body {
            font-family: Arial;
            }

            .header {
            padding-top: 15px;
            padding-left: 25px;
            padding-bottom: 10px;
            text-align: left;
            background: #424242;
            color: white;
            font-size: 25px;
            }
            .customerinfo {
            margin-top: 20px;
            margin-left: 550px;
            font-size: 25px; 
            width: 700px;
            border-radius: 25px;
            border: 2px solid #646464 ;
            padding: 20px;
            }

            .confirmButton {
                box-shadow:inset 0px 1px 3px 0px #91b8b3;
                background:linear-gradient(to bottom, #768d87 5%, #6c7c7c 100%);
                background-color:#768d87;
                display:inline-block;
                cursor:pointer;
                color:#ffffff;
                font-family:Arial;
                font-size:15px;
                font-weight:bold;
                padding:16px 34px;
                text-decoration:none;
            }      

            .confirmButton:hover {
                background:linear-gradient(to bottom, #6c7c7c 5%, #768d87 100%);
                background-color:#6c7c7c;
            }

            .confirmButton:active {
                position:relative;
                top:1px;
            }
        </style>
    </head>

    <body>
    <!-- Header -->
    <div class="header">
        <p>Runner To You</p>
        <h3>Customer Information</h3>
    </div>
    <br><br><br>
    <?echo $total ?>
    <!-- Customer Information Div -->
      <div class="customerinfo">
        <form role="form" action="" method="POST" enctype="multipart/form-data">
        <table>
            <h4>Delivery Information</h4>       
            <tr>
                <td style="padding: 10px">Name</td>
                <td style="padding: 10px"><input type="text" name="customerName" required size="50"></td>
            </tr>
            <tr>
                <td style="padding: 10px">Address</td>
                <td style="padding: 10px"><textarea rows="4" cols="50" type="text" name="customerAddress" required></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 10px">The delivery is only within KUANTAN, GAMBANG and PEKAN</td>
                <td></td>
            </tr>
        </table>
        <br>
        <hr>
        <table>
        <h4>Contact Information</h4>
                <td style="padding: 10px">Phone Number</td>
                <td style="padding: 10px"><input type="text" name="customerPhone" required size="50"></td>
            </tr>
            <tr>
                <td style="padding: 10px">Email</td>
                <td style="padding: 10px"><input type="email" name="customerEmail" required size="50"></td>
            </tr>
        </table>
        <p style="text-align: center;"><input class="confirmButton" type="submit" name="addCustomer" value="CONFIRM DETAILS"></p>
        </form>  
      </div>
    </body>
</html>
