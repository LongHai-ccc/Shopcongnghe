<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    // articles Detail
    $id = intval(getInput('id'));
    $articles = $db->fetchID("articles" ,$id);

?>
<!-- This is HEADER -->
<?php require_once __DIR__. "/layouts/header.php" ;?>
<?php require_once __DIR__. "/layouts/articlehot.php" ;?>
<!-- END HEADER -->
<div class="col-md-9 bor" style="padding-bottom: 15px;">
    <section class="box-main1" >
        <!-- ITEM PRODUCT -->
        <div class="col-md-12 ">
            <h2 style="text-align: center; margin-top: 10px;margin-bottom: 10px; font-weight: bolder;">DETAILED BEST WRITING</h2>
            <div class="col-md-12 bor">
                <div class="article_content" style="margin-bottom: 20px">
                    <h1 style="text-align: center;"><?php echo $articles['a_name'] ?></h1>
                    <p style="font-size: 12px;margin-top: 40px;"><?php echo $articles['a_content'] ?></p>
                </div>
            </div>
            </div>
        </div>
        <!-- ITEM PRODUCT -->
    </section>
</div>
<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->