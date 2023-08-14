<?php
    $open = "contacts";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));
    $Editcontacts = $db->fetchID("contacts" ,$id);
    if(empty($Editcontacts))
    {
        $_SESSION['error'] ="Data does not exist";
        redirectAdmin("Editcontacts");
    }
    $process=$Editcontacts['c_process']== 0 ? 1 : 1 ;
    

    $update =$db->update("contacts",array("c_process"=> $process),array("id"=>$id));

    if($update>0)
    {
        $_SESSION['success']="Update contacts successfully !";
        redirectAdmin("contacts");
    }
    else{
        $_SESSION['error']="You have handled customer inquiries!";
        redirectAdmin("contacts");
    }
?>