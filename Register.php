<?php 
    require_once __DIR__. "/autoload/autoload.php"; 

    $open = "users";
    
    $data =
    [
        "name" => postInput('name'),
        "email" => postInput("email"),
        "phone" => postInput("phone"),
        "address" => postInput("address"),
        "password" => MD5(postInput("password")),
    ];
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $error=[];
        if(postInput('name')=='')
        {
            $error['name']="Please enter the full name of the";
        }
        if(postInput('email')=='')
        {
            $error['email']="Please enter email";
        }
        else
        {
            $is_check = $db->fetchOne("users","email='".$data['email']."' ");
            if($is_check!=NULL)
            {
                $error['email']="Email already exists";
            }
        }
        if(postInput('phone')=='')
        {
            $error['phone']="Please enter phone";
        }
        if(postInput('password')=='')
        {
            $error['password']="Please enter password";
        }
        if(postInput('address')=='')
        {
            $error['address']="Please enter address";
        }
        if($data['password']!= MD5(postInput("re_password")))
        {
            $error['re_password']="Password incorrect";
        }
        //The blank is not necessarily faulty
        if(empty($error))
        {
            $id_insert =$db->insert("users",$data);
            if($id_insert>0)
            {
                header("location: login.php");
                $_SESSION['success']="Add user Successfully !";
            }
            else
            {
                $_SESSION['error']="Add user NOT Successfully !";
            }
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
            <h3 class="title-main"><a href="">New Member Registration</a></h3>
            <form class="form-horizontal" action="" method="POST" role="form" style="margin-top:30px">
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Full Name</label>
                    <div class="col-sm-6">
                        <input type="text" id="firstName" placeholder="Nguyễn Văn A" class="form-control" name="name" value="<?php echo $data['name']?>">
                        <?php if(isset($error['name'])):?>
                            <p class="text-danger">  <?php echo $error['name'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email </label>
                    <div class="col-sm-6">
                        <input type="email" id="email" placeholder="Email@gmail.com" class="form-control" name= "email" value="<?php echo $data['email']?>">
                        <?php if(isset($error['email'])):?>
                            <p class="text-danger">  <?php echo $error['email'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                    <div class="col-sm-6">
                        <input type="phoneNumber" id="phoneNumber" placeholder="099999999" class="form-control" name="phone" value="<?php echo $data['phone']?>">
                        <?php if(isset($error['phone'])):?>
                            <p class="text-danger">  <?php echo $error['phone'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-6">
                        <input type="text" id="lastName" placeholder="Khu phố X - Phường Y - Quận Z - TP HCM" class="form-control" name="address" value="<?php echo $data['address']?>">
                        <?php if(isset($error['address'])):?>
                            <p class="text-danger">  <?php echo $error['address'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" id="password" placeholder = "*************" class="form-control" name="password" >
                        <?php if(isset($error['password'])):?>
                            <p class="text-danger">  <?php echo $error['password'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-6">
                        <input type="password" id="password" placeholder = "*************" class="form-control"name="re_password" >
                        <?php if(isset($error['re_password'])):?>
                            <p class="text-danger">  <?php echo $error['re_password'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>
                <!-- /.form-group -->
                <button type="submit" class="btn btn-primary col-md-6 col-md-offset-3 " style="margin-bottom:50px">Register</button>
            </form> <!-- /form -->
        <!-- ----------MAIN-------------- -->
    </section>
</div>


<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->