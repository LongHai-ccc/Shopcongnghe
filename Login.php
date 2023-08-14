<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    $data =
    [
        "email" => postInput("email"),
        "password" => postInput("password"),
    ];
    $error=[];
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(postInput('email')=='')
        {
            $error['email']="Please enter email";
        }
        if(postInput('password')=='')
        {
            $error['password']="Please enter password";
        }
        //The blank is not necessarily faulty
        if(empty($error))
        {
            $is_check = $db->fetchOne("users"," email = '".$data['email']."' AND password='".md5($data['password'])."'");
            if($is_check!= NULL)
            {
                $_SESSION['name_user']=$is_check['name'];
                $_SESSION['name_id']=$is_check['id'];
                echo "<script>alert('Login successfully !');location.href='index.php'</script>'";
            }
            else
            {
                $_SESSION['error']="Login NOT Successfully !";
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
            <h3 class="title-main"><a href="">Login</a></h3>
            <?php if(isset($_SESSION['success'])) :?>
                <div class="alert alert-success" style="margin-top:20px;">
                    <strong style="color:#155724;">SUCCESS ! </strong><?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                </div>
            <?php endif ?>
            <?php if(isset($_SESSION['error'])) :?>
                <div class="alert alert-danger" style="margin-top:20px;">
                    <strong style="color:#a94442;">ERROR ! </strong><?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                </div>
            <?php endif ?>
            
            <form class="form-horizontal" role="form" style="margin-top:30px" action="" method="POST">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">E-Mail Address</label>
                    <div class="col-sm-6">
                        <input type="email" id="email" placeholder="Email@gmail.com" class="form-control" name="email">
                        <?php if(isset($error['email'])):?>
                            <p class="text-danger">  <?php echo $error['email'] ?> </p>
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
                </div> <!-- /.form-group -->
                <button type="submit" class="btn btn-primary col-md-6 col-md-offset-3 ">Login</button>
                <a href="forgotpass.php" class= "col-md-2 col-md-offset-5 " style="margin-top:10px;" id="forgot_pswd">Forgot password?</a>
            </form> <!-- /form -->
        <!-- ----------MAIN-------------- -->
    </section>
</div>


<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/chatlive.php" ;?>
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->