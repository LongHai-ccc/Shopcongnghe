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
    
   
    
    //  EQUIVALEN
    
    // if($EditCategory['home']==0)
    // {
    //     $home=1;
    // }
    // else
    // {
    //     $home=0;
    // }


    $hot=$Editarticles['a_home']== 0 ? 1 : 0 ;
    $update =$db->update("articles",array("a_home"=> $hot),array("id"=>$id));
    
    if($update >0)
    {
        $_SESSION['success']="Update Home articles successfully !";
        redirectAdmin("articles");
    }
    else{
        $_SESSION['error']="Update Home articles NOT successfully !";
        redirectAdmin("articles");
    }

?>