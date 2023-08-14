<?php

{
    $id = intval(getInput('id'));
    $product = $db->fetchID("product" ,$id);

    if($request->ajax())
    {

        $product->pro_total_number += $request->number;
        $product->pro_total_rating += 1;
        $product->save();
    }
    
}
