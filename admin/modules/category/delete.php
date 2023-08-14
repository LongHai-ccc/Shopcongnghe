<?php
    $open = "category";
    require_once __DIR__. "/../../autoload/autoload.php"; 

    $id = intval(getInput('id'));

    $EditCategory = $db->fetchID("category" ,$id);
    if(empty($EditCategory))
    {
        $_SESSION['error'] ="Data does not exist";
        redirectAdmin("category");
    }
    //
    $is_product =$db->fetchOne("product"," category_id=$id ");
    if($is_product == NULL)
    {
        $num = $db->delete("category",$id);
        if($num>0)
        {
            $_SESSION['success']="Delete category successfully !";
            redirectAdmin("category");
        }
        else
        {
            //not successfuly
            $_SESSION['error']="Delete category NOT successfully !";
            redirectAdmin("category");
        }
    }
    else
    {
        $_SESSION['error']="This category cann't be deleted !";
        redirectAdmin("category");
    }

    
    
?>