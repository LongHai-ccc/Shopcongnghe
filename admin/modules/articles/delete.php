<?php
    $open = "articles";
    require_once __DIR__. "/../../autoload/autoload.php"; 

    $id = intval(getInput('id'));

    $Deletearticles = $db->fetchID("articles" ,$id);
    if(empty($Deletearticles))
    {
        $_SESSION['error'] ="Data does not exist";
        redirectAdmin("articles");
    }
    
    $num = $db->delete("articles",$id);
    if($num>0)
    {
        $_SESSION['success']="Delete articles successfully !";
        redirectAdmin("articles");
    }
    else
    {
        //not successfuly
        $_SESSION['error']="Delete articles NOT successfully !";
        redirectAdmin("articles");
    }
    
?>