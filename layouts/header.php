
<!DOCTYPE html>
<html>
    <head>
        <title>Shop công nghệ</title>
        <link rel="shortcut icon" type="image/x-icon" href="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/256/Ark-icon.png">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/laravo/main.css">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <style>
        #suggesstion-box{
            position: absolute;
            z-index: 9999999;   
            background: white;
            border: 1px solid #dedede;
            width: 60%;
            border-top: 0;
            height: 400px;
            overflow-y:auto ;
            display: none;
        }
        #suggesstion-box li {
            padding: 5px 10px; border-bottom: 1px solid #dedede;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#header-search").keyup(function(){
                debugger;
                if($(this).val() != ""){
                    $.ajax({
                        type:"get",
                        url:"/search.php",
                        data:'keyword='+$(this).val(),
                        beforeSend:function(){
                            $("#header-search").css("background","#fff url(LoaderIcon.gif) no-repeat 165");
                        },
                        success: function(data){
                            $("#suggesstion-box").show();
                            $("#suggesstion-box").html('').append(data);
                            $("#header-search").css("background","#FFF");
                        }
                    });
                }
                else{
                    $("#suggesstion-box").hide();
                }
                
            });
            $('#header-search').blur(function(){

            })
        });
        function selectContry(val){
            $("#header-search").val(val);
            $("#suggesstion-box").hide();
        }
    </script>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a style="background-color: #da1719;">LONG HAI</a><b>0927888997</b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if(isset($_SESSION['name_user'])):  ?>
                                            <li>Hi : <?php echo $_SESSION['name_user'] ?></li>
                                            <li>
                                                <a href=""><i class="fa fa-user"></i>My Account <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="/personal/index.php?id=<?php echo $_SESSION['name_id'] ?>">Personal</a></li>
                                                    <li><a href="cart_product.php">Cart</a></li>
                                                    <li><a href="logout.php"><i class="fa fa-share-square-o"></i>Log out</a></li>
                                                </ul>
                                            </li>
                                        <?php else : ?>
                                            <li>
                                                <a href="Login.php"><i class="fa fa-sign-in"></i>Login</a>
                                            </li>
                                            <li>
                                                <a href="Register.php"><i class="fa fa-unlock"></i>Register</a>
                                            </li>
                                        <?php endif ; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline" action="" method="POST">
                                <div class="form-group">
                                    <input type="text" name="keyword" id="header-search" placeholder="Search name product ... " class="form-control" style="width: 300px; ">
                                </div>
                            </form>
                            <div id="suggesstion-box"></div>
                        </div>
                        <div class="col-md-4">
                            <a href="index.php">
                                <img src="<?php echo base_url() ?>public/frontend/images/LOGO.png" style="margin-top: -15px; width: 280px; height: 70px;">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right" style="margin-right: 15px;">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <a id="callphone" href="tel:0927888997" style="color: black;">0927888997</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a class="menupading" href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="product.php">Product</a>
                            </li>
                            <li>
                                <a href="accessories.php">Accessories</a>
                            </li>
                            <li>
                                <a href="news.php">News</a>
                            </li>
                            <li>
                                <a href="introduce.php">Introduce</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact</a>
                            </li>
                        </ul>
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="cart_product.php"><i class="fa fa-shopping-basket"></i> My Cart </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            