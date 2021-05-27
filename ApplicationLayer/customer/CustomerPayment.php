<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/data/itemModel.php';
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
            
        }
    }
    require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/orderController.php';


    $order = new orderController();
    if (isset($_POST['confirm'])){
        

        /*    $orderItemQty = $_POST['orderItemQty'];
            $orderTime = $_POST['orderTime'];
            $itemPrice = $_POST['itemPrice'];
            $customerID = $_POST['customerID'];
            $itemID = $_POST['itemID'];
            $sql = "INSERT INTO orders values (NULL,'$orderItemQty', '$itemID', '$orderTime', 'Pending', '$itemPrice', '$customerID')";
            $result1 = $con->query($sql);
        if ($result1->num_rows > 0) {
        $message = "Add order successfully!";
        echo "<script type='text/javascript'>alert('$message');
              window.location = '../../ApplicationLayer/customer/CustomerPayment.php'; 
                </script>"; 
            }*/
            $order = [];
            $order['orderItemQty'] = $_POST['orderItemQty'];
            $order['orderTime'] = $_POST['orderTime'];
            $order['itemPrice'] = $_POST['itemPrice'];
            $order['customerID'] = $_POST['customerID'];
            $order['itemID'] = $_POST['itemID'];
            $orderArr = [];
            array_push($orderArr, $order);
           // print_r($orderArr);
           
            if(is_array($orderArr)){
                foreach ($orderArr as $row){
                    var_dump($orderArr);
                    

                }
            }
            //$orderArr->addOrder();
        
/*
            $orderArr = array();
            
                $orderArr[] = $key;
            
            array_push($orderArr, $orderItemQty, $orderTime, $orderStatus, $itemPrice, $customerID, $itemID);
            $count = count($_SESSION["shopping_cart"]);
            $sql = "INSERT INTO orders values ";
            for($i=0;$i< $count;$i++){
                $sql .= "('$orderItemQty', '$orderTime', '$orderStatus', '$itemPrice', '$customerID')";
                if($i < ($count -1 ))
                    $sql .=",";
            }
            print_r($orderArr);
          
           /* $orderArr[] = array("orderItemQty"=>$orderItemQty,"orderTime"=>$orderTime,"orderStatus"=>'Pending',"orderTotalPrice"=>$orderTotalPrice,"customerID"=>$customerID);
            
            foreach ($orderArr as $row=> $value) {
                $orderItemQty = mysql_real_escape_string($con, $value[0]);
                $orderTime =  mysql_real_escape_string($con, $value[1]);
                $orderStatus =  mysql_real_escape_string($con, $value[2]);
                $orderTotalPrice =  mysql_real_escape_string($con, $value[3]);
                $customerID =  mysql_real_escape_string($con, $value[4]);
                $value[] = " ('$orderItemQty', '$orderTime', '$orderStatus', '$orderTotalPrice', '$customerID')";
            }*/
           /* $orderStr = serialize($orderArr);
            //    $sql = "INSERT INTO orders values ('$orderItemQty', '$itemID', '$orderTime', '$orderStatus', '$itemPrice', '$customerID')";
               // $sql = implode(', ', $orderArr);
                $result1 = $con->query($sql);
        if ($result1->num_rows > 0) {
  // output data of each row
        $message = "Add order successfully!";
        echo "<script type='text/javascript'>alert('$message');
              window.location = '../../ApplicationLayer/customer/CustomerPayment.php'; 
                </script>"; */
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
                                         <input type="hidden" name="customerID" value="<?php echo $custID?>">
                                         <input type="hidden" name="orderTime" value="<?php echo $date?>">
                                         <input type="hidden" name="itemID" value="<?php echo $row['itemID']?>">
                                         <input type="hidden" name="orderItemQty" value="1">
                                         <input type="hidden" name="itemPrice" value="<?php echo $row['itemPrice']?>">
                                         
                                            </tr>
                          
                                   
                          <?php      }
                          
                             
                          }   
                      }
                  
                                    
                    }
                    ?>

                    </table>
                    <br>
                    <input type="submit" name="confirm" value="Confirm Order">
                               </form>
                               <br>
            <hr>
            <br>
           
    

    <!-- stripe payment form -->

    <br>
  
    <!-- Payment Gateway (PayPal) -->
    <h3 style="text-align:center">Pay Now</h3>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container" class="aligncenter"></div>

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
