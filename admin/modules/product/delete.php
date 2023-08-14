<?php
    $open = "product";
    require_once __DIR__. "/../../autoload/autoload.php"; 

    $id = intval(getInput('id'));

    $Editproduct = $db->fetchID("product" ,$id);
    if(empty($Editproduct))
    {
        $_SESSION['error'] ="Data does not exist";
        redirectAdmin("product");
    }
    
    $num = $db->delete("product",$id);
    if($num>0)
    {
        $_SESSION['success']="Delete product successfully !";
        redirectAdmin("product");
    }
    else
    {
        //not successfuly
        $_SESSION['error']="Delete product NOT successfully !";
        redirectAdmin("product");
    }
    
?>