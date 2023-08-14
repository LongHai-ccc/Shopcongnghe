<?php
    $open = "ratings";
    require_once __DIR__. "/../../autoload/autoload.php"; 

    $id = intval(getInput('id'));

    $Deletecontacts = $db->fetchID("ratings" ,$id);
    if(empty($Deletecontacts))
    {
        $_SESSION['error'] ="Data does not exist";
        redirectAdmin("ratings");
    }
    
    $num = $db->delete("ratings",$id);
    if($num>0)
    {
        $_SESSION['success']="Delete ratings successfully !";
        redirectAdmin("ratings");
    }
    else
    {
        //not successfuly
        $_SESSION['error']="Delete ratings NOT successfully !";
        redirectAdmin("ratings");
    }
    
?>