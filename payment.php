<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    if(! isset($_SESSION['name_id']))
    {
        header("location:/login.php");
    }
    $users =$db->fetchID("users",intval($_SESSION['name_id']));
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $data=
        [
            'amount' => $_SESSION['total_bill'],
            'users_id' => $_SESSION['name_id'],
            'note' => postInput("note")
        ];
        $id_trans =$db->insert("transaction",$data);
        if($id_trans>0)
        {
            foreach($_SESSION['cart'] as $key =>$value)
            {
                $data2 =
                [
                    'transaction_id'=>$id_trans,
                    'product_id'=>$key,
                    'qty'=>$value['qty'],
                    'price'=>$value['price'],
                ];

                $id_insert =$db->insert("orders",$data2);
            }
            

            $_SESSION['success']="Save In For Order Successfully! We will contact you as soon as possible .";
            header("location:notification.php");
        }
        else
        {
            $_SESSION['error']="Your order has not been processed ! please try again !";
        }


    }

?>


<!-- This is HEADER -->
<?php require_once __DIR__. "/layouts/header.php" ;?>
<?php require_once __DIR__. "/layouts/banner.php" ;?>
<!-- END HEADER -->


<div class="col-md-9 bor" style="padding-bottom: 15px;">

    <section class="box-main1" >
        <!-- ----------MAIN-------------- -->
            <h3 class="title-main"><a href=""></a>PAYMENT</h3>
            <form class="form-horizontal" action="" method="POST" role="form" style="margin-top:30px">
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Full Name</label>
                    <div class="col-sm-6">
                        <input type="text" readonly="" id="firstName" placeholder="Nguyễn Văn A" class="form-control" name="name" value="<?php echo $users['name']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email </label>
                    <div class="col-sm-6">
                        <input type="email" readonly="" id="email" placeholder="Email@gmail.com" class="form-control" name= "email" value="<?php echo $users['email']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                    <div class="col-sm-6">
                        <input type="phoneNumber" readonly="" id="phoneNumber" placeholder="099999999" class="form-control" name="phone" value="<?php echo $users['phone']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-6">
                        <input type="text" readonly="" id="lastName" placeholder="Khu phố X - Phường Y - Quận Z - TP HCM" class="form-control" name="address" value="<?php echo $users['address']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Amount Pay</label>
                    <div class="col-sm-6">
                        <input type="text" readonly="" id="lastName" placeholder="" class="form-control" name="total_bill" value="<?php echo formatPrice($_SESSION['total_bill']) ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Note</label>
                    <div class="col-sm-6">
                        <input type="note" id="lastName" placeholder="Delivery address" class="form-control" name="note" value="">
                    </div>
                </div>
                <!-- /.form-group -->
                <button type="submit" class="btn btn-success col-md-6 col-md-offset-3 " style="margin-bottom:50px">Order confirmation</button>
            </form> <!-- /form -->

        <!-- ----------MAIN-------------- -->
    </section>
</div>
<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->