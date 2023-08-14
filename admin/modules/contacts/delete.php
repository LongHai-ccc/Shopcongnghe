<?php
    $open = "contacts";
    require_once __DIR__. "/../../autoload/autoload.php"; 

    $id = intval(getInput('id'));

    $Deletecontacts = $db->fetchID("contacts" ,$id);
    if(empty($Deletecontacts))
    {
        $_SESSION['error'] ="Data does not exist";
        redirectAdmin("contacts");
    }
    
    $num = $db->delete("contacts",$id);
    if($num>0)
    {
        $_SESSION['success']="Delete contacts successfully !";
        redirectAdmin("contacts");
    }
    else
    {
        //not successfuly
        $_SESSION['error']="Delete contacts NOT successfully !";
        redirectAdmin("contacts");
    }
    
?>