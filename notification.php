<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    unset($_SESSION['cart']);
    unset($_SESSION['total_bill']);

?>


<!-- This is HEADER -->
<?php require_once __DIR__. "/layouts/header.php" ;?>
<?php require_once __DIR__. "/layouts/banner.php" ;?>
<!-- END HEADER -->


<div class="col-md-9 bor" style="padding-bottom: 15px;">
    <section class="box-main1" >
        <!-- ----------MAIN-------------- -->
            <h3 class="title-main"><a href="">Notification</a></h3>
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
            <a href="index.php" class="btn btn-success"> Go back to Home page </a>
        <!-- ----------MAIN-------------- -->
    </section>
</div>


<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->