<?php 
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/OrderController.php';
session_start();
if(isset($_POST['find'])){
    $_SESSION['orderID'] = $_POST['orderID'];
    $orderID = $_POST['orderID'];
    $find = new orderController();
    $finds= $find->viewOrders($orderID);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>RTYMS | Order Tracking</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            .button {
                margin:auto;
                display:block;
            }
            .myButton {
                box-shadow:inset 0px 1px 3px 0px #91b8b3;
                background:linear-gradient(to bottom, #768d87 5%, #6c7c7c 100%);
                background-color:#768d87;
                display:inline-block;
                cursor:pointer;
                color:#ffffff;
                font-family:Arial;
                font-size:15px;
                font-weight:bold;
                padding:11px 76px;
                text-decoration:none;
                text-shadow:0px -1px 0px #2b665e;
            }
            .myButton:hover {
                background:linear-gradient(to bottom, #6c7c7c 5%, #768d87 100%);
                background-color:#6c7c7c;
            }
            .myButton:active {
                position:relative;
                top:1px;
            }
            .homepage {
                box-shadow: 0px 1px 0px 0px #fff6af;
                background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
                background-color:#ffec64;
                display:inline-block;
                cursor:pointer;
                color:#333333;
                font-family:Arial;
                font-size:15px;
                font-weight:bold;
                padding:6px 76px;
                text-decoration:none;
                text-shadow:0px 1px 0px #ffee66;
            }
            .homepage:hover {
                background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
                background-color:#ffab23;
            }
            .homepage:active {
                position:relative;
                top:1px;
            }
        </style>
</head>
<body>
    <div class="header">
        <p>Runner To You</p>
        <h3>Order Tracking</h3>
    </div>
    <br><br><br>
    <div class="row">
        <h1 style="text-align:center">Please enter your Order ID to view your order status</h1>
    <form role="form" action="CustomerTrack.php" method="post" enctype="multipart/form-data">
    <p style="text-align:center"><input type="text" name="orderID" placeholder="Order ID"></p>
    <p style="text-align:center"><input class="myButton" type="submit" name="find" value="Track"></p>
    <p style="text-align:center"><input class="homepage" type="button" onclick="location.href='../home/CustomerHomePage.php'" value="Return To Homepage"></p>
    </div>
    </form>
    <br><br><br><br>
    <div class="row">
    <?php  if(!empty($finds)){
        foreach($finds as $row){

        ?>
    <h2 style="text-align:center">Your Order Status</h2>
    <p style="text-align:center"><input style="font-size: 30px;" type="text" value="<?=$row['orderID']?>" readonly placeholder="Order ID" size="1px">
    <input style="font-size: 30px;" type="text" value="<?=$row['orderStatus']?>" readonly placeholder="Order Status">  </p>
    <?php } } ?>
    </div>
    

</body>
</html>