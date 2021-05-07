<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/ApplicationLayer/template/libs/database.php';

class customerModel{
    public $customerID, $customerName, $customerAddress, $customerEmail, $customerPhone;

    //insert database 
    function addCustomer(){

        $sql = "insert into customer( customerName, customerAddress, customerEmail, customerPhone) values(:customerName, :customerAddress, :customerEmail, :customerPhone)";

        $args = [':customerName'=>$this->customerName, ':customerAddress'=>$this->customerAddress, ':customerEmail'=>$this->customerEmail, ':customerPhone'=>$this->customerPhone];

        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
        }
    
    //view customer
    function viewCust(){
        $sql = "SELECT * FROM customer WHERE customerID=:customerID";
        $args = [':CustomerID'=>$this->CustomerID];
        return DB::run($sql,$args);
    }

    //view customer specific
    function viewallCust(){
        $sql = "SELECT * FROM customer";
        $stmt = customerModel::connect()->prepare($sql);
        return DB::run($sql);
    }


}
?>