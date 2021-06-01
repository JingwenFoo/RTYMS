<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/CustomerController.php';
$custID=$_SESSION['cid'];

?>
<html>
    <head>
        <title>RTYMS | Order Success</title>
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

            .aligncenter {
                text-align: center;
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
                padding:11px 76px;
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
        <h2>Payment Failed</h2>
    </div>
    <br><br>
    <div class="aligncenter">
        <img src="cross-icon.png" alt="Tick Icon" width="200" height="200" >
            <h1>Payment for Order could not be proceed.</h1>
            <table align="center" width="600px" border=1 >
                <th>Order ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <?php 
                    $con = new mysqli("localhost","root","","rtyms");
                    $qry="SELECT * FROM orders INNER JOIN item ON orders.itemID = item.itemID WHERE customerID='$custID'";
                    $result = $con->query($qry);
                    if($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td align='center'>".$row['orderID']."</td>";
                            echo "<td align='center'>".$row['itemName']."</td>";
                            echo "<td align='center'>".$row['orderItemQty']."</td>";
                            echo "<td align='center'>".$row['orderTotalPrice']."</td>";
                            echo "</tr>";
                        }
                        echo "<tr>";
                    }
                ?>
            </table>
    </div>
    <br><br><br><br>
    <p style="text-align: center"><input class="tryAgain" type="button" onclick="location.href='../customer/CustomerPayment.php'" value="Try Again"></p>
    <br><br> 
    
        </body>
</html>
