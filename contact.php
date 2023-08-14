<?php 
    $open = "contacts";
    require_once __DIR__. "/autoload/autoload.php"; 
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $data =
        [
            "c_name" => postInput('c_name'),
            "c_email" => postInput("c_email"),
            "c_phone" => postInput("c_phone"),
            "c_title" => postInput("c_title"),
            "c_content" => postInput("c_content"),
        ];
        $error=[];

        if(empty($error))
        {
            $id_insert =$db->insert("contacts",$data);
            if($id_insert > 0)
            {

                $_SESSION['success']="Add contacts Successfully !";
            }
            else
            {
                $_SESSION['error']="Add contacts NOT Successfully !";
            }
            
        }
    }
?>

<!-- This is HEADER -->
<?php require_once __DIR__. "/layouts/header.php" ;?>
<?php require_once __DIR__. "/layouts/banner.php" ;?>
<!-- END HEADER -->
<div class="col-md-9 bor" style="padding-bottom: 15px;">
<div>
        <div class="row" >
            <div>
                <div class="contact-us-area">
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
                    <!-- google-map-area start -->
                    <div class="google-map-area">
                        <!--  Map Section -->
                        <div id="contacts" class="map-area">
                            <div id="map" class="map" data-lat="43.6532" data-lng="-79.3832">
                                <div id="contacts" class="map-area">
                                    <div id="map" class="map">
                                       <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3918.2392733889133!2d106.80145151428768!3d10.869397160444155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1suit!5e0!3m2!1sen!2s!4v1605444575058!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- google-map-area end -->
                    <!-- contact us form start -->
                    <div class="contact-us-form">
                    <form action="" method="POST">
                        <div class="sec-heading-area" style="margin-top: 50px; margin-bottom: 40px; text-align: center;">
                            <h2>Inquiries of customers</h2>
                        </div>
                        <div class="contact-form">
                                <div class="form-top">
                                    <div class="form-group col-sm-12">
                                        <label>Fullname<sup style="color:#BB0000 ;">*</sup></label>
                                        <input type="text" name="c_name" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Phone number<sup style="color:#BB0000 ;">*</sup></label>
                                        <input type="text" name="c_phone" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Email<sup style="color:#BB0000 ;">*</sup></label>
                                        <input type="email" name="c_email" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Subject <sup style="color:#BB0000 ;">*</sup></label>
                                        <input type="text" name="c_title" class="form-control" required>
                                    </div>												
                                    <div class="form-group col-sm-12">
                                        <label>Comment <sup style="color:#BB0000 ;">*</sup></label>
                                        <input type="text" name="c_content" class="form-control" required>
                                    </div>												
                                </div>
                                <div class="submit-form form-group col-sm-12 submit-review">
                                    <button type="submit" class="btn btn-success">Send your inquiry</button>
                                </div>
                        </div>
                        </form>
                    </div>
                    <!-- contact us form end -->
                </div>					
            </div>
        </div>
    </div>	
</div>
<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/chatlive.php" ;?>
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->