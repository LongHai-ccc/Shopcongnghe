<?php
    $open = "users";
    require_once __DIR__. "/../../autoload/autoload.php"; 

    $id = intval(getInput('id'));

    $DeleteUsers = $db->fetchID("users" ,$id);
    if(empty($DeleteUsers))
    {
        $_SESSION['error'] ="Data does not exist";
        redirectAdmin("users");
    }
    
    $num = $db->delete("users",$id);
    if($num>0)
    {
        $_SESSION['success']="Delete users successfully !";
        redirectAdmin("users");
    }
    else
    {
        //not successfuly
        $_SESSION['error']="Delete users NOT successfully !";
        redirectAdmin("users");
    }
    
?>