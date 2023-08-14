<?php
    session_start();
    require_once __DIR__. "/../libraries/Database.php";
    require_once __DIR__. "/../libraries/Function.php";
    $con = mysqli_connect("localhost","root","","shopcongnghe");
    $db =new Database;
    //create address save Images 
    define("ROOT",$_SERVER['DOCUMENT_ROOT'] ."/public/uploads/" );
    // Load Category On page
    $category =$db->fetchcate("category");
    // Get list Product NEW
    $sqlNEW ="SELECT * FROM product WHERE category_id <> 14 ORDER BY ID DESC LIMIT 5";
    $productNEW = $db->fetchsql($sqlNEW);
    // Get list Product PAY
    $sqlPAY ="SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 5";
    $productPAY = $db->fetchsql($sqlPAY);
    //
?>