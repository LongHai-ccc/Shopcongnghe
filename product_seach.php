<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    if(isset($_POST['keyword'])){
        $keyword = $_POST['keyword'];
        $sql_product = "SELECT * FROM Product  WHERE name LIKE '%$keyword%' ORDER BY id DESC";		
        $productsearch = $db->fetchsql($sql_product);
    }
?>
<?php require_once __DIR__. "/layouts/header.php" ;?>
<?php require_once __DIR__. "/layouts/banner.php" ;?>
<!-- END HEADER -->
<div class="col-md-9 bor" style="padding-bottom: 15px;">
    <section class="box-main1" >
        <div class="col-md-12">
            <div class="showitem" style="margin-top: 10px; margin-bottom:10px;">
                <?php  $Number = 1 ;  foreach($product as $item): ?>
                    <div class="col-md-3 item-product bor">
                        <a href="detail_product.php?id=<?php echo $item['id'] ?>">
                            <img src="<?php echo uploads()?>product/<?php echo $item['thumbar']?>" class="" width="100%" height="130px">
                        </a>
                        <div class="info-item">
                            <a href="detail_product.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']?></a>
                            <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatPriceSale($item['price'],$item['sale']) ?></b></p>
                        </div>
                        <div class="hidenitem">
                            <p><a href="detail_product.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                            <p><a href=""><i class="fa fa-heart"></i></a></p>
                            <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
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
    </section>
</div>
<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->