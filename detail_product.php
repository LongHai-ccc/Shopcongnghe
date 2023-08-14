<?php 
    $con = mysqli_connect("localhost","root","","shopcongnghe");
    require_once __DIR__. "/autoload/autoload.php"; 


    // Product Detail
    $id = intval(getInput('id'));
    $product = $db->fetchID("product" ,$id);

    
    // Get_category 
    $cateid = intval($product['category_id']);
    $sql="SELECT * FROM product ORDER BY ID DESC LIMIT 4  ";
    $productoffer = $db->fetchsql($sql);

    $ratings = "SELECT users.id ,users.name ,ratings.* FROM ratings , users WHERE users.id = ratings.ra_user_id and ra_product_id=$id  ORDER BY updated_at DESC";
    $run_ratings = mysqli_query($con,$ratings);

    $ratingsDashboardsql = "SELECT count(ra_number) as total ,sum(ra_number) as sum ,ra_number  FROM ratings Where ra_product_id=$id GROUP BY ra_number ";
    $ratingsDashboard = mysqli_query($con,$ratingsDashboardsql);

    $arrayRatings = [];
    if(!empty($ratingsDashboard))
    {
        for($i=1;$i<=5;$i++)
        {
            $arrayRatings[$i]=[
                "total"=>0,
                "sum"=>0,
                "ra_number"=>0
            ];
            foreach($ratingsDashboard as $item)
            {
                if($item['ra_number']==$i)
                {
                    $arrayRatings[$i]=$item;
                }
            }
        }
    }

?>

<!-- This is HEADER -->
<?php require_once __DIR__. "/layouts/header.php" ;?>
<?php require_once __DIR__. "/layouts/banner.php" ;?>
<!-- END HEADER -->
<style>
    .nametext {
    display: block;
    width: 180px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    }
    .product-tab-content
    {
        overflow: hidden;
        font-weight: normal;
    }
    .product-tab-content h2{ font-size: 20px ;font-weight: normal !important;}
    .product-tab-content h3{ font-size: 18px !important;}
    .product-tab-content h4{ font-size: 16px !important;}
    .product-tab-content img
    { 
        margin: 0 auto;
        text-align: center;
        max-width: 100%;
        display: block;
    }
    .list_start {
        cursor: pointer;
    }
    .list_text{
        display: inline-block;
        margin-left: 10px;
        position: relative;
        background: #52b858;
        color: #fff;
        padding: 2px 8px;
        box-sizing: border-box;
        font-size: 12px;
        border-radius: 2px;
        display: none;
    }
    .list_text::after{
        right: 100%;
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-color: rgba(82,184,88,0);
        border-right-color: #52b858;
        border-width: 6px;
        margin-top: -6px;
    }
    .list_start .rating_active {
        color: #ff9705 !important;
    }
    .pro-rating .active{
        color: #ff9705 !important;
    }
    .ra_comment .active {
        color: #ff9705 !important;
    }
</style>

<div class="col-md-9 bor" style="padding-bottom: 15px;">
<div style="text-align: right; padding-right: 135px; padding-bottom: 20px;" >
    <?php
        if($product['number'] < 1)
        {
            echo' <span style="position: absolute; text-align: center;width: 150px; background: #fbda00;color: #333;font-size: 18px;padding: 4px 6px;">The product is not available</span>';
        }
    ?>
</div>
    <section class="box-main1" >
        <div class="col-md-6 text-center">
            <img src="<?php echo uploads()?>product/<?php echo $product['thumbar']?>" class="img-responsive bor zoom" id="imgmain" width="100%" height="450px">
            <ul class="text-center bor clearfix" id="imgdetail" >
                <li>
                    <img src="<?php echo base_url() ?>public/frontend/images/detail_product/1.jpg" class="img-responsive pull-left zoom" width="70" height="80">
                </li>
                <li>
                    <img src="<?php echo base_url() ?>public/frontend/images/detail_product/2.jpg" class="img-responsive pull-left zoom" width="70" height="80">
                </li>
                <li>
                    <img src="<?php echo base_url() ?>public/frontend/images/detail_product/3.jpg" class="img-responsive pull-left zoom" width="70" height="80">
                </li>
                <li>
                    <img src="<?php echo base_url() ?>public/frontend/images/detail_product/4.jpg" class="img-responsive pull-left zoom" width="70" height="80">
                </li>
                <li>
                    <img src="<?php echo base_url() ?>public/frontend/images/detail_product/5.jpg" class="img-responsive pull-left zoom" width="70" height="80">
                </li>
            </ul>
        </div>
        <div class="col-md-6 "style="margin-top: 20px;padding: 30px;">
            <ul id="right">
                <li><h2 style="font-weight: bold; text-align: center;"><?php echo $product['name']?></h2></li>
                <?php 
                    $ageDetail=0;
                    if($product['pro_total_rating'])
                    {
                        $ageDetail = round($product['pro_total_number'] / $product['pro_total_rating'],2);
                    }
                ?>
                <div class="pro-rating" style="text-align: center;">
                    <?php for( $i=1; $i<=5 ; $i++) : ?>
                        <?php if( $i <= $ageDetail ) : ?>
                            <a href="#" style="color: #333; font-size: 20px; margin-left: 5px; text-align: center;" class="fa fa-star active"></a>
                        <?php else :?> 
                            <a href="#" style="color: #333; font-size: 20px; margin-left: 5px; text-align: center;" class="fa fa-star"></a>
                        <?php endif ;?>
                    <?php endfor ;?>
                </div>
                <?php if($product['bonus']!=''):?>
                    <li>
                        <h3 style="color:red;">Gifts include :</h3> 
                        <p style="margin-top: 10px; font-size: 15px;"> 
                            <?php echo $product['bonus']?>
                        </p>
                    </li>
                <?php else :?>
                    <li style="color:red;"> Products without gifts </li>
                <?php endif ?>
                <?php if($product['sale']>0):?>
                        <li style="font-size: 30px; text-align: center;"><p><strike style="font-size: 18px;" class="sale"><?php echo formatPrice($product['price']) ?></strike>
                        &emsp;<b class="price" style="font-size: 20px;"><?php echo formatPriceSale($product['price'],$product['sale']) ?></b</li>
                <?php else :?>
                    <li ><p><b class="price" style="font-size: 20px;"><?php echo formatPrice($product['price']) ?></b</li>
                <?php endif ?>
                <li style="text-align: center;">
                    <?php if($product['number'] > 0) :?>
                        <a href="addcart.php?id=<?php echo $product['id'] ?>"class="btn btn-default">Add To Cart</a>
                    <?php else : ?>
                        <p style="font-size: 18px; color:#59AAD9;">Please choose another product</p>
                    <?php endif ; ?>
                </li>
            </ul>
        </div>
    </section>
    <div class="col-md-12" id="tabdetail">
        <div class="row">
                
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Product Description</a></li>
                <li><a data-toggle="tab" href="#menu0">Product configuration</a></li>
                <li><a data-toggle="tab" href="#menu1">Product reviews</a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <p><?php echo $product['content'] ?></p>
                </div>
                <div id="menu0" class="tab-pane fade">
                    <h2 style="text-align: center;">Detailed specifications</h2>
                    <p><?php echo $product['cpu'] ?></p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="compoment_rating" style="margin-bottom: 20px">
                        <h3>Product reviews</h3>
                        <div class="compoment_rating_content" style="display:flex;align-items: center; border: 1px solid #dedede;border-radius: 5px;">
                            <div class="rating_item" style="width: 20%;position: relative;">
                                <span class="fa fa-star" style="font-size: 100px;display: block;margin: 0 auto;text-align: center ; color: #ff9705"></span>
                                <b style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;font-size: 20px;"> <?php echo $ageDetail ?> </b>
                            </div>
                            <div class="list_rating" style="width: 60%;padding: 20px;" >
                                <?php foreach ($arrayRatings as $key => $arrayRating):?>
                                    <?php if ($product['pro_total_rating']!=0) :?>
                                        <?php  $itemAge=round(($arrayRating['total']/$product['pro_total_rating'])*100,0); ?>
                                        <div class="item_rating" style="display:flex ;align-items: center">
                                            <div style="width: 10%; font-size: 14px">
                                                <?php echo $key ?><span style="margin-left: 5px" class=" fa fa-star"></span>
                                            </div>
                                            <div style="width: 60%; margin:0 20px">
                                                <span style="width:100%; height: 8px;display: block;border: 1px solid #dedede ; border-radius:5px; " >
                                                    <b style="width:<?php echo $itemAge?>%; background-color: #ff9705; display: block; border-radius: 5px;height: 100%; "></b>
                                                </span>
                                            </div>
                                            <div style="width:25%;">
                                                <a href=""><?php echo $arrayRating['total']?> đánh giá (<?php echo $itemAge?>%)</a>
                                            </div>
                                        </div>
                                    <?php else :?>
                                        <div class="item_rating" style="display:flex ;align-items: center">
                                            <div style="width: 10%; font-size: 14px">
                                                <?php echo $key ?><span style="margin-left: 5px" class=" fa fa-star"></span>
                                            </div>
                                            <div style="width: 60%; margin:0 20px">
                                                <span style="width:100%; height: 8px;display: block;border: 1px solid #dedede ; border-radius:5px; " >
                                                    <b style="width:0%; background-color: #ff9705; display: block; border-radius: 5px;height: 100%; "></b>
                                                </span>
                                            </div>
                                            <div style="width:25%;">
                                                <a href=""><?php echo $arrayRating['total']?> đánh giá </a>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                   
                                <?php endforeach ?>
                            </div>
                            <div>
                                <a class="js_rating_action" style=" width: 200px;background: #288ad6;padding: 10px;color: white;border-radius:5px ">Submit your review</a>
                            </div>
                        </div>
                            <?php 
                            $listRatingText = [
                                1=>'Dislike',
                                2=>'All right',
                                3=>'Normal',
                                4=>'Very good',
                                5=>'Excellent'
                            ];
                            ?>
                            <div class="form_rating hide">
                                <div style="display: flex;margin-top: 15px;font-size: 15px">
                                    <p style="margin-bottom:0">Choose your review:</p>
                                    <span style="margin: 0 15 px" class="list_start">
                                    <?php for($i=1;$i<=5;$i++) :?>
                                        <i class="fa fa-star" data-key="<?php echo $i ?>"></i>
                                    <?php endfor ?>
                                    </span>
                                    <span class="list_text"></span>
                                    <input type="hidden" value="" class="number_rating">
                                </div>
                                <div style="margin-top: 15px">
                                    <textarea name="" class="form-control" id="ra_content" cols="30" rows="3"></textarea>
                                </div>
                                <div style="margin-top: 15px;">
                                    <a href="" class="js_rating_product" style=" width: 200px;background: #288ad6;padding: 10px;color: white;border-radius:5px ">Submit a review</a>
                                </div>
                            </div>
                        <div class="component_list_rating" style="margin-top: 30px;">
                            <?php if(isset($run_ratings)) :?>
                                <?php foreach ($run_ratings as $rating) :?>
                                <div class="rating_item" style="margin:15px 0">
                                    <div>
                                        <span style="color: #333; font-weight: bold;text-transform: capitalize; font-size: 15px;"><?php echo $rating['name'] ?></span>
                                        <a href="" style="color: #2ba832 ;font-size: 14px;"><i class="fa fa-check-circle-o"></i> Purchased at the website </a>
                                    </div>
                                    <p style="margin-bottom: 0">
                                        <span class="ra_comment">
                                            <?php for($i = 1;$i<=5;$i++) :?>
                                                <?php if( $i <= $rating['ra_number'] ) : ?>
                                                    <i class="fa fa-star active"></i>
                                                <?php else :?> 
                                                    <i class="fa fa-star"></i>
                                                <?php endif ;?>
                                            <?php endfor ;?>
                                        </span>
                                        <span style="font-size: 14px;"><?php echo $rating['ra_content'] ?></span>
                                    </p>
                                    <div>
                                        <span style="font-size: 14px;"><i class="fa fa-clock-o"></i><?php echo $rating['created_at'] ?></span>
                                    </div>
                                </div>
                                <?php endforeach ;?>
                            <?php endif ;?>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top: 40px;">
        <h3 style="font-weight: bold; text-align: center; color: #cc0000; ">Recommended products for you</h3>
        <div class="showitem" style="margin-top: 10px; margin-bottom:10px;">
            <?php foreach($productoffer as $item): ?>
                <div class="col-md-3 item-product bor">
                    <a href="detail_product.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads()?>product/<?php echo $item['thumbar']?>" class="" width="100%" height="130px">
                    </a>
                    <div class="info-item">
                        <a class="nametext" href="detail_product.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']?></a>
                        <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatPriceSale($item['price'],$item['sale']) ?></b></p>
                    </div>
                    <div class="hidenitem">
                        <p><a href="detail_product.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                        <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                    </div>
                </div>
            <?php endforeach ; ?>
        </div>          
    </div>
</div>
<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function(){
            let listStart = $(".list_start .fa");

            listRatingText = {
                1 : 'Dislike',
                2 : 'All right',
                3 : 'Normal',
                4 : 'Very good',
                5 : 'Excellent',
            }
            listStart.mouseover( function(){
                let $this = $(this);
                let number =$this.attr('data-key');
                listStart.removeClass('rating_active');
                $(".number_rating").val(number);
                $.each(listStart,function(key,value){
                    if (key +1 <= number)
                    {
                        $(this).addClass('rating_active')
                    }
                });

                $(".list_text").text('').text(listRatingText[$this.attr('data-key')]).show();
            });
            $(".js_rating_action").click(function(event){
                event.preventDefault();
                if($(".form_rating").hasClass('hide'))
                {
                    $(".form_rating").addClass('active').removeClass('hide')
                }else
                {
                    $(".form_rating").addClass('hide').removeClass('active')
                }
            })
            $(".js_rating_product").click(function(e){
                event.preventDefault();
                let content = $("#ra_content").val();
                let number =$(".number_rating").val();
                let url = $(this).attr('href');
                if(content && number)
                {
                    $.ajax({
                        url : 'detail_product_ajax.php',
                        type : 'POST',
                        data : {
                            id:<?php echo $id ?>,
                            ra_number : number,
                            ra_content : content,
                        } 
                    }).done(function(result){

                        if(result==1){
                            alert("Thank you ! Your review has been submitted successfully.");
                            location.reload(true); 
                        }
                        else
                        {
                            alert("Sorry ! Your need Login after comment ! or Your review is experiencing errors.");
                            location.reload(true); 
                        }
                    });
                }
            });

            
            let idProduct = $("#content_product").attr('data-id');

            let products = localStorage.getItem('products');

            if(products == null)
            {
                arrayProduct = new Array();

                arrayProduct.push(idProduct)

                localStorage.setItem('products',JSON.stringify(arrayProduct))

            }
            else
            {
                // Chuyển về mảng
                products = $.parseJSON(products)

                if (products.indexOf(idProduct) == -1)
                {
                    products.push(idProduct);
                    localStorage.setItem('products',JSON.stringify(products))
                }
            }

        });
    </script>

<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/chatlive.php" ;?>
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->