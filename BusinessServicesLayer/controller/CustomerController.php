<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RTYMS/BusinessServicesLayer/data/CustomerModel.php';

class customerController{

    //insert customer detail
    function addCustomer(){
        $cust = new customerModel();
        $cust->customerName = $_POST['customerName'];
        $cust->customerAddress = $_POST['customerAddress'];
        $cust->customerEmail = $_POST['customerEmail'];
        $cust->customerPhone = $_POST['customerPhone'];

        if($cust->addCustomer() > 0){
            $_SESSION['customerName'] = $_POST['customerName'];
            $_SESSION['customerAddress'] = $_POST['customerAddress'];
            $_SESSION['customerPhone'] = $_POST['customerPhone'];
            $_SESSION['customerEmail'] = $_POST['customerEmail'];
            $message = "Customer Information Confirmed";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../customer/CustomerPayment.php';</script>";
        }
    }
   
   //view customer
    function viewAll(){
        $customer = new customerModel();
        return $customer->viewallCust();
    }
    
    //view customer specific
    function viewCust($Cust_Email){
        $customer = new customerModel();
        $customer->Cust_Email = $Cust_Email;
        return $customer->viewCust();
    }

}
?>