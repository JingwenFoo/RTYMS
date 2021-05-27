<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/controller/foodController.php';
require_once ('component.php');

$item = new foodController();
$data = $item->viewAll();

if(isset($_POST['add']))
{
	
	

	if(isset($_SESSION["shopping_cart"]))
	{

		$item_array_id = array_column($_SESSION["shopping_cart"], "itemID");
		if(!in_array($_POST["itemID"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'itemID'			=>	$_POST["itemID"]				
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
			$itemID=$_POST['itemID'];
	$itemPrice=$_POST['itemPrice'];
			$con = new mysqli("localhost","root","","rtyms");
    		$query="INSERT INTO cart values ('$itemID',1,'$itemPrice');";
    		if ($con->query($query)) {

    		echo "<script>alert('Product is added successfully in the cart..!')</script>";
            echo "<script>window.location = 'FoodItem.php'</script>";

    }
		}
		else
		{
			echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'FoodItem.php'</script>";
		}
	}
	else
	{
		$item_array = array('itemID'=>$_POST["itemID"]			
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

		<title>Food Item</title>

		 <!-- Font Awesome -->
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    	<!-- Bootstrap CDN -->
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    	<link rel="stylesheet" href="style.css">
	</head>
	
<body>
	<?php require_once ("header.php"); ?>
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
                    <span class="text">Medicine</a></li></span>
        </ul>
        </div>
    </div>    
      
<div class="container">
	<div style="margin-left:25%;padding:70px;height:1000px;">
		<h4>Food</h4>
        <div class="row text-center py-5">
            <?php
                
                foreach($data as $row){
					component($row['itemName'], $row['itemPrice'], $row['image'], $row['itemDesc'], $row['itemID']);
                }
            ?>
        </div>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
			