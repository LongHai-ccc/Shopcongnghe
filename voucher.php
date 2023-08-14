<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    $sqlHomecate = "SELECT name , id FROM category WHERE home = 1 ORDER BY update_at ";
    $categoryHome =$db->fetchsql($sqlHomecate);
    $sqlHomearticle = "SELECT * FROM articles WHERE a_home = 1 ORDER BY updated_at ";
    $articleHome =$db->fetchsql($sqlHomearticle);
    $data = [];
    foreach ($categoryHome as $item)
    {
        $cateId=intval($item['id']);
        $sql="SELECT * FROM product WHERE category_id = $cateId LIMIT 4";
        $productHome=$db->fetchsql($sql);
        $data[$item['name']]=$productHome;
    }
?>
<style>
    .read-more {
        position: relative;
        font-size: 15px;
        text-transform: uppercase;
        font-family: 'Roboto', sans-serif;
        font-weight: 700;
        color: #3f3f3f;
        line-height: 27px;
        display: inline-block;
        margin-bottom: 10px;   
    }
    .post-thumb-info {
        background: #fff;
        font-family: 'Roboto', sans-serif;
        padding: 15px 20px;
    }
    .read-more:hover{
        color:#ea3a3c;
    }
    .post-thumb:hover{
        color: black;
        opacity: 0.7;
    }

</style>
<!-- This is HEADER -->
<?php require_once __DIR__. "/layouts/header.php" ;?>
<?php require_once __DIR__. "/layouts/banner.php" ;?>
<!-- END HEADER -->
<div class="col-md-9 bor" style="padding-bottom: 15px;">
        <h1 style="text-align: center; margin-top: 10px;">INFORMATION FREESHIP</h1>
        <p><br><br>
        <h4 style="text-align: center;"> Mô tả về ..............</h4>
<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/chatlive.php" ;?>
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->