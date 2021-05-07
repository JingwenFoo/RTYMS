<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/ApplicationLayer/template/libs/database.php';

class orderModel{
    public $orderID, $servProvID, $orderItemQty, $orderTime, $orderStatus, $orderTotalPrice, $customerID, $paymentID, $runnerID, $itemType, $itemID;

//Add order
    function addOrder(){     
         $sql = "insert into orders( orderItemQty, orderStatus, orderTotalPrice, servProvID, customerID, itemType, itemID) values(:orderItemQty, :orderStatus, :orderTotalPrice, :servProvID, :customerID, :itemType, :itemID)";

        $args = [':orderItemQty'=>$this->orderItemQty, ':orderStatus'=>$this->orderStatus, ':orderTotalPrice'=>$this->orderTotalPrice, ':servProvID'=>$this->servProvID, ':customerID'=>$this->customerID, ':itemType'=>$this->itemType, ':itemID'=>$this->itemID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

//view all order
    function viewallOrder(){     
        $sql = "SELECT * FROM orders";
        return DB::run($sql);
    }

//view order status pending Good
    function viewallGoodOrder(){     
        $sql = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID AND orders.itemType = 'Good' AND orders.orderStatus = 'Pending'";
        return DB::run($sql);
    }
//view order status history Good
    function viewallGoodOrdered(){     
        $sql = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID AND orders.itemType = 'Good' AND (orders.orderStatus = 'Ready for delivery' OR orders.orderStatus = 'Delivered')";
        return DB::run($sql);
    }

//view order status pending Medical
    function viewallMedOrder(){     
        $sql = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID AND orders.itemType = 'Medical' AND orders.orderStatus = 'Pending'";
        return DB::run($sql);
    }
//view order status history Medical
    function viewallMedOrdered(){     
        $sql = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID AND orders.itemType = 'Medical' AND (orders.orderStatus = 'Ready for delivery' OR orders.orderStatus = 'Delivered')";
        return DB::run($sql);
    }

//view order status pending pet
    function viewallPetOrder(){     
        $sql = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID AND  orders.itemType = 'Pet' AND orders.orderStatus = 'Pending'";
        //$sql = "SELECT * FROM orders WHERE itemType='Pet' AND orderStatus='Pending'";
        return DB::run($sql);
    }

//view order status history pet
    function viewallPetOrdered(){     
        $sql = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID AND orders.itemType = 'Pet' AND (orders.orderStatus = 'Ready for delivery' OR orders.orderStatus = 'Delivered')";
        return DB::run($sql);
    }

//view order status pending Food
    function viewallFoodOrder(){     
        $sql = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID AND orders.itemType = 'Food' AND orders.orderStatus = 'Pending'";
        return DB::run($sql);
    }
//view order status history Food
    function viewallFoodOrdered(){     
        $sql = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID AND orders.itemType = 'Food' AND (orders.orderStatus = 'Ready for delivery' OR orders.orderStatus = 'Delivered')";
        return DB::run($sql); ;
    }

    //view specific order for sp
    function viewOrder(){        
        $sql = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID WHERE orders.orderID=:orderID";
        $args = [':orderID'=>$this->orderID];
        return DB::run($sql,$args);
    }

    //runner View All Order
    function runnervieworder(){     
        $sql = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID AND orders.orderStatus = 'Ready for delivery'";

        return DB::run($sql);
    }

    //vieworderdetailsrunnerspecific
    function runnerViewOrders(){     
        $sql = "SELECT * FROM orders INNER JOIN serviceprovider ON orders.itemType = serviceprovider.spType INNER JOIN customer ON orders.customerID = customer.customerID AND orders.orderStatus = 'Ready for delivery'";
        return DB::run($sql);
    }

    //update order status
    function modifyOrder(){
        $sql = "UPDATE orders SET orderStatus=:orderStatus, itemID=:itemID WHERE orderID=:orderID";
        $args = [':orderID'=>$this->orderID, ':orderStatus'=>$this->orderStatus, ':itemID'=>$this->itemID];
        return DB::run($sql,$args);
    }

    //update order status
    function modifyOrderRunner(){
        $sql = "UPDATE orders SET orderStatus=:orderStatus, itemID=:itemID WHERE orderID=:orderID";
        $args = [':orderID'=>$this->orderID, ':orderStatus'=>$this->orderStatus, ':itemID'=>$this->itemID];
        return DB::run($sql,$args);
    }

}
?>
