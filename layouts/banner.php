<!--ENDMENUNAV-->
            
<div id="maincontent">
    <div class="container">
        <div class="col-md-3  fixside" >
            <div class="box-left box-menu" >
                <h3 class="box-title"><i class="fa fa-list"></i>  Category</h3>
                <ul>
                    <?php foreach($category as $item ) :?>
                        <li><a href="category_product.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="box-left box-menu">
                <h3 class="box-title"><i class="fa fa-bullhorn"></i>  Products new </h3>
                <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                <ul>
                    <?php foreach ($productNEW as $item):?>
                        <li class="clearfix">
                            <a href="detail_product.php?id=<?php echo $item['id'] ?>">
                                <img src="<?php echo uploads()?>product/<?php echo $item['thumbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                <div class="info pull-right">
                                    <p class="name"> <?php echo $item['name'] ?> </p >
                                    <b class="price"><?php echo formatPriceSale($item['price'],$item['sale']) ?></b><br>
                                    <b class="sale"><?php echo formatPrice($item['price']) ?></b><br>
                                </div>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <!-- **************************************** -->
            <div class="box-left box-menu">
                <h3 class="box-title"><i class="fa fa-thumbs-up"></i>  Products PAY</h3>
                <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                <ul>
                    <?php foreach ($productPAY as $item):?>
                        <li class="clearfix">
                            <a href="detail_product.php?id=<?php echo $item['id'] ?>">
                                <img src="<?php echo uploads()?>product/<?php echo $item['thumbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                <div class="info pull-right">
                                    <p class="name"> <?php echo $item['name'] ?> </p >
                                    <b class="price"><?php echo formatPriceSale($item['price'],$item['sale']) ?></b><br>
                                    <b class="sale"><?php echo formatPrice($item['price']) ?></b><br>
                                </div>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>

        </div>