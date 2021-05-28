<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/data/itemModel.php';
 require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/orderController.php';
require_once ('component.php');
$item = new itemModel();
$data = $item->viewAll();
$total = $_SESSION['total'];

date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date("Y/m/d H:i:s", time());
$orderItemQty=1;


    $customerName = $_SESSION['customerName'];
   
    $con = new mysqli("localhost","root","","rtyms");
    $qry="SELECT * FROM customer WHERE customerName='$customerName'";
    $result = $con->query($qry);
    if ($result->num_rows > 0) {
  // output data of each row
         while($row = $result->fetch_assoc()) {
   
            $custID = $row['customerID'];
            $_SESSION['cid']=$custID;
        }
    }
   

    $order = new orderController();
    if (isset($_POST['checkout'])){
       
        $customerID = $_POST['customerID'];
        $date = $_POST['orderTime'];  
        
        $query="INSERT INTO orders ( orderItemQty,  orderTotalPrice,  itemID) SELECT itemQuantity, itemPrice, itemID FROM cart ;";
        $result = $con->query($query);
        $query1="UPDATE orders SET orderStatus = 'Pending', customerID = '$customerID' where orderStatus=' '";
        $result = $con->query($query1);
   
    }            
            

    

?>
<html>
    <head>
        <title>RTYMS | Checkout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Add meta tags for mobile and IE (from PayPal)-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

            .color {
                color: red;
            }
            .icon-container {
                margin-bottom: 20px;
                padding: 7px 0;
                font-size: 24px;
            }
        </style>
    </head>

    <body>
    <!-- Header -->
    <div class="header">
        <p>Runner To You</p>
        <h3>Payment</h3>
    </div>
    <div class="aligncenter">
        <img src="shopping-cart-icon.png" alt="Cart Images" width="300" height="300" >
            <h1>YOUR ORDER TOTAL PRICE:</h1>
            <h1>RM <?php echo $total?></h1>
            <br>
            <h3>Checkout Items</h3>
            <?php 
                 if (isset($_SESSION["shopping_cart"])){
                        $itemID = array_column($_SESSION["shopping_cart"], "itemID");
                    
                        ?>

                         <table align="center" width="500px" >
                                        
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                     <?php   foreach ($data as $row) {
                            
                            foreach ($itemID as $id){
                                if ($row['itemID'] == $id){
                                    ?>
                                    <tr>                                      
                                        <td align="center"><?php echo $row['itemName'];?>
                                        </td>
                                        <td align="center"> 1 </td>
                                        <td align="center"><?php echo $row['itemPrice'];?></td> 
                                    </tr>
                                    <tr>
                                         <form action="" method="POST">
                <input type="hidden" name="itemID" value="<?php echo $itemID?>">
                <input type="hidden" name="customerID" value="<?php echo $custID?>">
                 <input type="hidden" name="orderTime" value="<?php echo $date?>">
            
        </tr>
                          <?php      }
                          
                          }   
                      }
                                    
                    }
                    ?>
           
                 </table>
              <br> 
               <button name="checkout">Confirm Order</button> 
            <hr>
            <br>
          
    <!-- stripe payment form -->

    <br>
   
    <!-- Payment Gateway (PayPal) -->
    <h3 style="text-align:center">Pay Now</h3>
    
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container" class="aligncenter"></div>
</form>
    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AZtgi4JKNGstpcXVtVQHlc2rwZuZ8-2D43ImgD4TTzwLpcM82dUgnG4D4DdmGX_cMJAZoA3LVs859h6z&currency=MYR"></script>
    
    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            style: {
                layout: 'horizontal'
            },
            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total?>'
                           
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Payment Success!');
                    window.location.href = "../customer/SuccessPayment.php";

                });
            },

            onReject:function(data, actions) {
                return actions.order.reject().then(function(details){
                    // Show a payment failed message to the buyer
                    alert('Payment Failed!');
                    window.location.href = "../customer/UnsuccessfulPayment.php";
                });
        
        
        }
            
        }).render('#paypal-button-container');
    </script>
    </div>
    <!-- Payment Gateway (PayPal) ENDED -->
    </body>
</html>
