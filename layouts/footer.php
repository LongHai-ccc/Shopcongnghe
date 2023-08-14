                    </div>
                        <div class="container">
                            <div class="col-md-4 bottom-content">
                                <a href="voucher.php"><img src="<?php echo base_url() ?>public/frontend/images/free-shipping.png"></a>
                            </div>
                            <div class="col-md-4 bottom-content">
                                <a href="voucher.php"><img src="<?php echo base_url() ?>public/frontend/images/guaranteed.png"></a>
                            </div>
                            <div class="col-md-4 bottom-content">
                                <a href="voucher.php"><img src="<?php echo base_url() ?>public/frontend/images/deal.png"></a>
                            </div>
                        </div>
                        <div class="container-pluid">
                        <section id="footer">
                            <div class="container">
                                <div class="col-md-3" id="shareicon">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://mail.google.com/mail"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-8" id="title-block">
                                    <div class="pull-left">
                                        
                                    </div>
                                    <div class="pull-right">
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </section>
                        <section id="footer-button">
                            <div class="container-pluid">
                                <div class="container">
                                    <div class="col-md-3" id="ft-about">
                                        <p>Fortunately, writing effective homepage copy doesn’t need to be complicated. That’s why on this page, I’ll cover 11 tips you can use to design a page that’s interesting enough to make visitors want to learn more, and successful in driving them to take action.</p>
                                    </div>
                                    <div class="col-md-3 box-footer" >
                                        <h3 class="tittle-footer">My accout</h3>
                                        <ul>
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="introduce.php"><i></i>Introduce</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="product.php"><i></i>Product</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="contact.php"><i></i>Contact</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="login.php"><i></i>My Account</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="news.php"><i></i>News</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 box-footer">
                                        <h3 class="tittle-footer">my accout</h3>
                                        <ul>
                                        <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="introduce.php"><i></i>Introduce</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="product.php"><i></i>Product</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="contact.php"><i></i>Contact</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="/personal/index.php?id=<?php echo $_SESSION['name_id'] ?>"><i></i>My Account</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="news.php"><i></i>News</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3" id="footer-support">
                                        <h3 class="tittle-footer">Contact Us</h3>
                                        <ul>
                                            <li>
                                                
                                                <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i>Information technology university</p>
                                                <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i>0927888997</p>
                                                <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i>@gm.uit.edu.vn</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="ft-bottom">
                            <p class="text-center">Copyright by </p>
                        </section>
                    </div>
                </div>      
            </div>
        </div>      
    </div>
    <script  src="<?php echo base_url() ?>public/frontend/js/slick.min.js"></script>

    </body>
</html>

<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })

    $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e) {
            e.preventDefault();
            $qty = $(this).parents("tr").find(".qty").val();
            $key = $(this).attr("data-key");
            $.ajax({
                url: 'update_cart.php',
                type: 'GET',
                data: {'qty': $qty, 'key':$key},
                success:function(data)
                {
                    if (data == 1) 
                    {
                        alert('You have successfully updated your shopping cart!');
                        location.href='cart_product.php';
                    }
                    else
                    {
                        alert('Sorry! The quantity you buy exceeds the quantity of your stock!');
                        location.href='cart_product.php';
                    }
                }
            });
        })
    }) 
</script>