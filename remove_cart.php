<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $key=intval(getInput('key'));
    unset($_SESSION['cart'][$key]);
    $_SESSION['success']="Successfully deleted the product in the cart!";
    header("location:cart_product.php");
?>