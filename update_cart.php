<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $key=intval(getInput('key'));
    $qty=intval(getInput('qty'));
    $_SESSION['cart'][$key]['qty'] = $qty;


    $con = mysqli_connect("localhost","root","","shopcongnghe");

    $get_products = "select number from product where id = {$key} ";

    $run_products = mysqli_query($con,$get_products);

    $qty_products = mysqli_fetch_assoc($run_products)['number'];
    
    $n=(int)$qty_products;
    if($n<$qty)
    {
        $_SESSION['cart'][$key]['qty'] = $n;
        echo 0;
    }
    else
    {
        echo 1;
    }

?>