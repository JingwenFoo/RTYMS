<?php

session_start();

require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/data/itemModel.php';
require_once ('component.php');
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/orderController.php';

$item = new itemModel();
$data = $item->viewAll();

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['shopping_cart'] as $key => $value){
        if($value["itemID"] == $_GET['id']){
              unset($_SESSION['shopping_cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
        else if($value["id"] == $_GET['id']){
              unset($_SESSION['shopping_cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
        }
     }
  }
}
$order = new orderController();
if(isset($_POST['checkout'])){
    $orderItemQty= $_POST['count'];
    $orderTotalPrice= $_POST['total'];

    $order->addOrder();
    
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<?php
    require_once ('header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <hr/><hr/><hr/>
                <h6>My Cart</h6>
                <hr>

                <?php

                $total = 0;
                    if (isset($_SESSION["shopping_cart"])){
                        $itemID = array_column($_SESSION["shopping_cart"], "itemID");


                        foreach ($data as $row) {
                            
                            foreach ($itemID as $id){
                                if ($row['itemID'] == $id){
                                    cartElement($row['image'], $row['itemName'],$row['itemPrice'], $row['itemID']);
                                    $total = $total + (int)$row['itemPrice'];
                                }
                            }
                        
                        }
                    
                    }
                    else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <!--Summary Bill-->
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['shopping_cart'])){
                                $count  = count($_SESSION['shopping_cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>RM<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>RM<?php
                            echo $total;
                            ?></h6>
                    </div>
                    <!--Checkout button-->
                    <div class="col-md-6">
                    <form action="CheckoutCustomerDetails.php?total=<?php echo $total?>" method="POST">
                       <input type="submit" class="btn btn-danger mx-2" name="checkout" value="Continue to Checkout"></input>
                   </form>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>