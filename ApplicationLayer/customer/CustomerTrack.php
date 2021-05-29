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
			
			.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
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
<style>
table, th, td {
  border: 1px solid black;
}

table {
  width: 100%;
}
</style>
	<table class="styled-table">
			<thead>
				<tr>
					<th class="cart-romove item">#</th>
					
					
			
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Order Time</th>
					<th class="cart-total item">Order Status</th>
					<th class="cart-total item">Order Type</th>
					<th class="cart-description item">Total Price</th>
					
				</tr>
			</thead><!-- /thead -->
			
			<tbody>

				<tr>
					
					
					
					<td class="cart-product-quantity">
						<?php echo $qty=$row['orderID']; ?>   
		            </td>
					<td class="cart-product-sub-total"><?php echo $price=$row['orderItemQty']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $price=$row['orderTime']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $price=$row['orderStatus']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $price=$row['itemType']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $price=$row['orderTotalPrice']; ?>  </td>
					

				
					
					
					
				</tr>
<?php } } else { ?>
				<tr><td colspan="8">Either order id </td></tr>
				<?php } ?>
			</tbody><!-- /tbody -->
		</table><!-- /table -->

    </div>
    

</body>
</html>