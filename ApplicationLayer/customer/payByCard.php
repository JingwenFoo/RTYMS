<?php

include '../template/libs/config.php';

\Stripe\Stripe::setVerifySslCerts(false);

$token = $_POST['stripeToken'];
$token_card_type = $_POST['stripeTokenType'];

$amount = $_POST['total']; 
$charge = \Stripe\Charge::create(array(
	"amount"=>str_replace(",", "", $amount*100),
	"currency"=>"myr",
	"description"=>"RTYMS checkout",
	"source"=>$token,
	));


if($charge){
	echo "<script>alert('Payment Success!')</script>";
    echo "<script>window.location = 'SuccessPayment.php'</script>";
}
else
{
	echo "<script>alert('Payment Failed!')</script>";
    echo "<script>window.location = 'UnSuccessfulPayment.php'</script>";
}