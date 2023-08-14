<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    $sqlHomecate = "SELECT name , id FROM category WHERE home = 1 ORDER BY update_at ";
    $categoryHome =$db->fetchsql($sqlHomecate);
    $sqlHomearticle = "SELECT * FROM articles WHERE a_home = 1 ORDER BY updated_at ";
    $articleHome =$db->fetchsql($sqlHomearticle);
    $data = [];
    $product = $db->fetchAll('product');
    foreach ($categoryHome as $item)
    {
        $cateId=intval($item['id']);
        $sql="SELECT * FROM product WHERE category_id = $cateId LIMIT 4";
        $productHome=$db->fetchsql($sql);
        $data[$item['name']]=$productHome;
    }
?>
<style>
    .nametext {
    display: block;
    width: 180px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    }
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
    <section id="slide" class="text-center" >
        
        <div class="slideshow-container">
        <div class="mySlides ">
            <img src="<?php echo base_url() ?>public/uploads/slide/banner1.jpg" width="100%">
        </div>
        <div class="mySlides ">
            <img src="<?php echo base_url() ?>public/uploads/slide/banner2.jpg" width="100%">
        </div>
        <div class="mySlides ">
            <img src="<?php echo base_url() ?>public/uploads/slide/banner.jpg" width="100%">
        </div>
        <div class="mySlides ">
            <img src="<?php echo base_url() ?>public/uploads/slide/banner3.jpg" width="100%">
        </div>
        <div class="mySlides ">
            <img src="<?php echo base_url() ?>public/uploads/slide/banner4.jpg" width="100%">
        </div>
            </div>
            <br>

            <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
            </div>

            <script>
            var slideIndex = 0;
            showSlides();

            function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 2 seconds
            }
            </script>
    </section>
    
    <section class="box-main1" >
        <!-- ITEM PRODUCT -->
        <?php foreach($data as $key => $value): ?>
            <div class="col-md-12">
                <h3 class="title-main"><a href=""><?php echo $key ?></a></h3>
                <div class="showitem" style="margin-top: 10px; margin-bottom:10px;">
                    <?php foreach($value as $item): ?>
                        <div class="col-md-3 item-product bor">
                            <?php
                                if($item['number'] < 1)
                                {
                                    echo' <span style="position: absolute; background: #fbda00;color: #333;font-size: 12px;padding: 2px 6px;margin-left: 63px;">product not available</span>';
                                }
                                if($item['sale'] > 0)
                                {
                                    echo' <span style="position: absolute; background: red;color: #FFF;font-size: 12px;padding: 2px 6px;">'.$item['sale'].' %</span>';
                                }
                            ?>
                            <a href="detail_product.php?id=<?php echo $item['id'] ?>">
                                <img src="<?php echo uploads()?>product/<?php echo $item['thumbar']?>" class="" width="100%" height="140px">
                            </a>
                            <div class="info-item">
                                <a class="nametext" href="detail_product.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']?></a>
                                <?php

                                    if($item['sale'] < 1)
                                    {
                                        echo' <b style="color: #999;"> '.formatPrice($item['price']).'</b>';
                                    }
                                    if($item['sale'] > 0)
                                    {
                                        echo' <p><strike class="sale"> '.formatPrice($item['price']).'</strike><b class="price"> '.formatPriceSale($item['price'],$item['sale']).'</b></p> ';
                                    }
                                ?>
                            </div>
                            <div class="hidenitem">
                                <?php if($item['number'] > 0) :?>
    
                                    <p><a href="detail_product.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                                    <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                
                                <?php else : ?>
                                
                                    <p><a href="detail_product.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                                
                                <?php endif ; ?>
                            </div>
                        </div>

                    <?php endforeach ?>
                </div>
            </div>
        <?php endforeach ; ?>
        <!-- ITEM PRODUCT -->
    </section>
</div>
<div>
<div class="latest-post-area" style="margin-top: 35px;" >
        <div class="container">
            <div class="row">
                <div class="all-singlepost " style=" margin-top: 40px;">
                <h2 style="text-align: center; font-weight: bold;">News</h2>
                    <!-- single latestpost start -->
                    <?php foreach($articleHome as $article): ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-post">
                            <div class="post-thumb">
                                <a href="detail_news.php?id=<?php echo $article['id'] ?>">
                                    <img src="<?php echo uploads()?>articles/<?php echo $article['a_avatar']?>" class="" style="width: 370px; height: 200px;">
                                </a>
                            </div>
                            <div class="post-thumb-info">
                                <div class="postexcerpt" >
                                    <p style="font-size: 15px; margin-top: 5px;margin-bottom: 10px;"><?php echo $article['a_name'] ?></p>
                                    <a href="detail_news.php?id=<?php echo $article['id'] ?>" class="read-more">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ; ?>
                    <!-- single latestpost end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/chatlive.php" ;?>
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->