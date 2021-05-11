<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/data/orderModel.php';

$total=$_SESSION['total'];
?>
<html>
    <head>
        <title>RTYMS | Checkout</title>
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

            .aligncenter {
                text-align: center;
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
    </div>
    <br>
    <!-- Payment Gateway (PayPal) -->
    <h3 style="text-align:center">Pay Now</h3>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container" style="padding-left: 570px"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AZtgi4JKNGstpcXVtVQHlc2rwZuZ8-2D43ImgD4TTzwLpcM82dUgnG4D4DdmGX_cMJAZoA3LVs859h6z&currency=USD"></script>

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
                            value: '10.00'
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
                    // Show a success message to the buyer
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
