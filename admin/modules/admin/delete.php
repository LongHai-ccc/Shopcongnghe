<?php
    $open = "admin";
    require_once __DIR__. "/../../autoload/autoload.php"; 

    $id = intval(getInput('id'));

    $Deleteadmin = $db->fetchID("admin" ,$id);
    if(empty($Deleteadmin))
    {
        $_SESSION['error'] ="Data does not exist";
        redirectAdmin("admin");
    }
    
    $num = $db->delete("admin",$id);
    if($num>0)
    {
        $_SESSION['success']="Delete admin successfully !";
        redirectAdmin("admin");
    }
    else
    {
        //not successfuly
        $_SESSION['error']="Delete admin NOT successfully !";
        redirectAdmin("admin");
    }
    
?>