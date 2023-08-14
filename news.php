<?php 
    $open = "articles";
    require_once __DIR__. "/autoload/autoload.php"; 
    if(isset($_GET['page']))
    {
        $p=$_GET['page'];
    }
    else
    {
        $p=1;
    }

    $sql="SELECT * FROM articles ";

    $article=$db->fetchJone('articles',$sql,$p,7,true);
    if(isset($article['page']))
    {
        $sotrang=$article['page'];
        unset($article['page']);
    }
?>
<style>
    .name_article:hover{
        color: #CC0000;
    }
    .img_article:hover{
        opacity: 0.9;
    }
</style>
<!-- This is HEADER -->
<?php require_once __DIR__. "/layouts/header.php" ;?>
<?php require_once __DIR__. "/layouts/articlehot.php" ;?>
<!-- END HEADER -->
<div class="col-md-9 bor" style="padding-bottom: 15px;">
    <section class="box-main1" >
        <!-- ITEM PRODUCT -->
        <div class="col-md-12 ">
            <h2 style="text-align: center; margin-top: 10px;margin-bottom: 10px; font-weight: bolder;">News</h2>
            <div class="col-md-12 bor">
                <?php  $Number = 1 ;  foreach($article as $article): ?>
                    <div class="article" style=" padding: 10px 0 ; margin: 10px 0 ; border-bottom:1px solid #f2f2f2; display: flex; ">
                        <div class="article_avatar">
                            <a class="img_article" href="detail_news.php?id=<?php echo $article['id'] ?>">
                                <img src="<?php echo uploads()?>articles/<?php echo $article['a_avatar']?>" class="" style="width: 200px; height: 120px;">
                            </a>
                        </div>
                        <div class="article_avatar" style="width: 80%;margin-left: 20px;">	
                            <a href="detail_news.php?id=<?php echo $article['id'] ?>" style="color: black;">
                                <h3 class="name_article" style="font-size: 18px ;font-weight: bold;"> <?php echo $article['a_name'] ?></h3>
                            </a>
                            <p style="font-size: 15px;color: #808080; margin-top: 5px;"><?php echo $article['a_description'] ?></p>
                            <p style="font-size: 15px ; margin-top: 5px ;margin-bottom: 5px;">Author : Long Hải </p>
                            <span style="font-size: 15px; margin-top: 15px;"><?php echo $article['updated_at'] ?></span>
                        </div>
                    </div>
                <?php $Number++; endforeach ?>
            </div>
            <div class="pull-right" style="float: right;">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                        </li>
                        <?php for($i = 1 ; $i <= $sotrang ; $i++ ):?> 
                            <?php 
                                if(isset($_GET['page']))
                                {
                                    $p=$_GET['page'];
                                }
                                else
                                {
                                    $p=1;
                                }
                            ?>
                            <li class="page-item <?php echo ($i==$p) ?'active': '' ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php endfor; ?>

                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- ITEM PRODUCT -->
    </section>
</div>
<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/chatlive.php" ;?>
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->