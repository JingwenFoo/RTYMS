<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/data/orderModel.php';

class orderController{

    function addOrder(){
        $order = new orderModel();
        $order->orderItemQty  = $_POST['orderItemQty'];
        $order->orderStatus = 'Pending';
        $order->orderTotalPrice  = $_POST['orderTotalPrice'];
        $order->servProvID = $_POST['servProvID'];
        $order->customerID  = $_POST['customerID'];
        $order->itemType = $_POST['itemType'];
        $order->itemID = $_POST['itemID'];
        if($order->addOrder() > 0){
        $message = "Add order successfully!";
        echo "<script type='text/javascript'>alert('$message');
              window.location = '../../ApplicationLayer/customer/CheckoutCustomerDetails.php'; 
                </script>"; 
        }
    }
    //calling all order
    function viewAllOrder(){
        $order = new orderModel();
        return $order->viewallOrder();
    }
//1  view med order pending
    function viewAllMedOrder(){
        $order = new orderModel();
        return $order->viewallMedOrder();
    }
    //View med order ready to shipped
    function viewAllMedOrdered(){
        $order = new orderModel();
        return $order->viewallMedOrdered();
    }

//2  view pet order pending
    function viewAllPetOrder(){
        $order = new orderModel();
        return $order->viewallPetOrder();
    }
    //View pet order ready to shipped
    function viewAllPetOrdered(){
        $order = new orderModel();
        return $order->viewallPetOrdered();
    }

//3  view food order pending
    function viewAllFoodOrder(){
        $order = new orderModel();
        return $order->viewallFoodOrder();
    }
    //View food order ready to shipped
    function viewAllFoodOrdered(){
        $order = new orderModel();
        return $order->viewallFoodOrdered();
    }
//4  view good order pending
    function viewAllGoodOrder(){
        $order = new orderModel();
        return $order->viewallGoodOrder();
    }
    //View good order ready to shipped
    function viewAllGoodOrdered(){
        $order = new orderModel();
        return $order->viewallGoodOrdered();
    }

    //runner view order
    function runnervieworder(){
        $order = new orderModel();
        return $order->runnervieworder();
    }

    //runner specific view order
    function runnerViewOrders($orderID){
        $order = new orderModel();
        $order->orderID = $orderID;
        return $order->runnerViewOrders();
    }

    //sp calling specific order
    function viewOrders($orderID){
        $order = new orderModel();
        $order->orderID = $orderID;
        return $order->viewOrder();
    }

//1  edit med order
    function editMedOrder(){
        $order = new orderModel();
        $order->orderID = $_POST['orderID'];
        $order->orderStatus = 'Ready for delivery';
        $order->itemID = $_POST['itemID'];
        if($order->modifyOrder()){
            $message = "Order Updated!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'medViewOrder.php?view=".$_POST['orderID']."';</script>";
        }
    }

//2  edit pet order
    function editPetOrder(){
        $order = new orderModel();
        $order->orderID = $_POST['orderID'];
        $order->orderStatus = 'Ready for delivery';
        $order->itemID = $_POST['itemID'];
        if($order->modifyOrder()){
            $message = "Order Updated!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'petViewOrder.php?view=".$_POST['orderID']."';</script>";
        }
    }
    
//3  edit food order
    function editFoodOrder(){
        $order = new orderModel();
        $order->orderID = $_POST['orderID'];
        $order->orderStatus = 'Ready for delivery';
        $order->itemID = $_POST['itemID'];
        if($order->modifyOrder()){
            $message = "Order Updated!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'foodViewOrder.php?view=".$_POST['orderID']."';</script>";
        }
    }

//4  edit good order
    function editGoodOrder(){
        $order = new orderModel();
        $order->orderID = $_POST['orderID'];
        $order->orderStatus = 'Ready for delivery';
        $order->itemID = $_POST['itemID'];
        if($order->modifyOrder()){
            $message = "Order Updated!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'goodViewOrder.php?view=".$_POST['orderID']."';</script>";
        }
    }

//5  edit runner order
    function editRunnerOrder(){
        $order = new orderModel();
        $order->orderID = $_POST['orderID'];
        $order->orderStatus = 'Delivered';
        $order->itemID = $_POST['itemID'];
        if($order->modifyOrder()){
            $message = "Order Updated!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'runnerMain.php?view=".$_POST['orderID']."';</script>";
        }
    }

}
?>