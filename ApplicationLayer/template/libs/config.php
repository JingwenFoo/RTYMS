<?php
// define a constant variable to store our database settings
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'rtyms');
define('DB_USER', 'root');
define('DB_PASS', '');

require_once "stripe-php-master/init.php";

$publishableKey="pk_test_51IvExWD5UVlVX4fhvLGu61AlRC1WSu3yt5OXpDAdZlZZj8ycK7rLqEtVVVbUmIEHfNPpiZXKpZpkIhuGnU0AktlL00Xa9DYVmm";
$secretKey="sk_test_51IvExWD5UVlVX4fhZXWXvJP2edoI0uwigPqoybMue76zp1Frz0CBsMufvA7o0vfufy6pu1qsxGjXforOLVYDkoyF00x4RWywGd";

\Stripe\Stripe::setApiKey($secretKey);
?>