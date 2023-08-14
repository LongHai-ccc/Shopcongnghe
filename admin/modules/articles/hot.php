<?php
    $open = "articles";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));
    $Editarticles = $db->fetchID("articles" ,$id);

    if(empty($Editarticles))
    {
        $_SESSION['error'] ="Data does not exist";
        redirectAdmin("articles");
    }
    
    $a_home=$Editarticles['a_hot']== 0 ? 1 : 0 ;

    $updatea_home =$db->update("articles",array("a_hot"=> $a_home),array("id"=>$id));
    if($updatea_home >0)
    {
        $_SESSION['success']="Update Hot articles successfully !";
        redirectAdmin("articles");
    }
    else{
        $_SESSION['error']="Update Hot articles NOT successfully !";
        redirectAdmin("articles");
    }
?>