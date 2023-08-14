<!--ENDMENUNAV-->
<?php 
    $sqlHotarticle = "SELECT * FROM articles WHERE a_hot = 1 ORDER BY updated_at LIMIT 6 ";
    $articleHot =$db->fetchsql($sqlHotarticle);
?>  
<style>
    .name_arthot{
        color: #777777;
    }
    .name_arthot:hover{
        color: #222222;
    }
    .img_arthot:hover{
        opacity: 0.8;
    }
</style>    
<div id="maincontent">
    <div class="container">
        <div class="col-md-3  fixside" >
            <div class="box-left box-menu">
                <h2 style="text-align: center; margin-top: 10px;margin-bottom: 10px; font-weight: bolder;">News</h2>
                <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                <ul>
                    <?php foreach ($articleHot as $artHot):?>
                        <li style="padding: 4px ;">
                            <a  class="img " href="detail_news.php?id=<?php echo $artHot['id'] ?>">
                                <img class="img_arthot" src="<?php echo uploads()?>articles/<?php echo $artHot['a_avatar']?>" class="" style="width: 270px; height: 150px;">
                            </a>
                            <a href="detail_news.php?id=<?php echo $artHot['id'] ?>">
                                <h3 class="name_arthot" style="font-size: 10px ;font-weight: bold; margin-top: 10px;margin-bottom: 10px;"> <?php echo $artHot['a_name'] ?></h3>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>

        </div>