<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/foodController.php';

require_once ('component.php');
include "header.php";
if($_GET['itemID']){
$itemID = $_GET['itemID'];

$item = new foodController();
$data = $item->viewItemDetail($itemID);

if(isset($_POST["add"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "itemID");
		if(!in_array($_POST["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'itemID'			=>	$_POST["id"]				
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'itemDetail.php?itemID=$itemID'</script>";
		}
	}
	else
	{
		$item_array = array(
			'itemID'			=>	$_POST["itemID"]			
		);
		$_SESSION["shopping_cart"][0] = $item_array;
		print_r($_SESSION["shopping_cart"]);
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Item Detail</title>

		 <!-- Font Awesome -->
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    	<!-- Bootstrap CDN -->
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    	<link rel="stylesheet" href="style.css">
	</head>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<body>
	
	<div class="sidebar">
        <div class="sidebar_inner">
        <ul>
            <li>
                <a href="FoodItem.php">
                    <span class="text">Food</a></li></span>
            <li><a href="PetItem.php" >
                    <span class="text">Pet Assist</a></li></span>
            <li><a href="GoodItem.php">
                    <span class="text">Goods</a></li></span>
            <li><a href="MedicineItem.php">
                    <span class="text">Medical</a></li></span>
        </ul>
        </div>
    </div>  
    <?php

    foreach($data as $row)  
    {
        $itemID    = $row['itemID'];
        $itemType   = $row['itemType'];
        $itemName = $row['itemName'];
        $itemDesc = $row['itemDesc'];
        $itemPrice = $row['itemPrice'];
        $image = $row['image'];
        $itemQty = $row['itemQty'];
        $servProvID = $row['servProvID'];
        $spName = $row['spName'];
        $spPhone = $row['spPhone'];

     echo "<div style='margin-left:25%;padding:70px;height:1000px;'>"; 
     echo "<form action='' method='post'>
     <div class='row justify-content-md-center'>
     ";
					echo	"<div class='col-4'>";
					echo		"<img class='product-large' src='../template/image/". $image ."'>";
					echo		"<span class='badge badge-pill badge-secondary float-right'>".$itemQty." items remaining</span>";
					echo	"</div>";
					echo	"<div class='col-3'>";
					echo		"<p class='lead font-weight-bold'>".$itemName."</p>";
					echo		"<p class='lead pt-3'>Service Provider: ".$spName."</p>";
					echo		"<p class='lead pt-3'>Contact: ".$spPhone."</p>";

					echo		"<p class='lead pt-3'>".$itemDesc."</p>";

					echo		"<p class='lead text-success font-weight-bold'>RM ". $itemPrice ."</p>";					
					echo		"<input type='hidden' name='id' value='".$itemID."'>";
					echo		"<input type='hidden' name='servprov_id' value='".$servProvID."'>";
					echo		"<input type='hidden' name='descrip' value='".$itemDesc."'>";
					echo		"<input type='hidden' name='price' value='".$itemPrice."'>";
					echo		"<input type='hidden' name='pic' value='".$image."'>";
					echo		"<input type='hidden' name='item_type' value='".$itemType."'>";
					echo		"<input type='hidden' name='qty_left' value='".$itemQty."'>";
					echo		"<input type='number' value='1' class='form-control w-25 d-inline'>";
					echo		"<button type='submit' class='btn btn-warning my-3' name='add'>Add to Cart <i class='fas fa-shopping-cart'></i></button>";
					echo		"</form>";
					echo		"</div>";
					echo 	"</div>";
					echo "</div>";
 	};

      
}
?>

