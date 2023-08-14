<?php
    require_once __DIR__. "/autoload/autoload.php"; 
    if(!isset ($_SESSION['name_id']))
    {
        echo "<script>alert('You need to login before selecting the product !');location.href='index.php'</script>";
    }

    $id = intval(getInput('id'));
    // detail product
    $product = $db->fetchID("product" ,$id);


    // check if the number of products exists in the cart or not, if so, update the cart
    // otherwise, create a new shopping cart
    if( ! isset($_SESSION['cart'][$id]))
    {
        //create shoping cart
        $_SESSION['cart'][$id]['name']=$product['name'];
        $_SESSION['cart'][$id]['thumbar']=$product['thumbar'];
        $_SESSION['cart'][$id]['price']=((100-$product['sale'])*$product['price'])/100;
        //
        $_SESSION['cart'][$id]['qty']=1;
        
    }
    else
    {
        //Update product cart
        $_SESSION['cart'][$id]['qty'] += 1;
    }
    echo "<script>alert('Add Product Successfully !');location.href='cart_product.php'</script>";
    

?>