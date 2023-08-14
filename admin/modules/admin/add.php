<?php
    $open = "admin";
    require_once __DIR__. "/../../autoload/autoload.php";

    $data =
    [
        "name" => postInput('name'),
        "email" => postInput("email"),
        "phone" => postInput("phone"),
        "password" => MD5(postInput("password")),
        "address" => postInput("address"),
        "level" => postInput("level"),
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
            $is_check = $db->fetchOne("admin","email='".$data['email']."' ");
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
        if(postInput('level')=='')
        {
            $error['level']="Please enter level";
        }
        if($data['password']!= MD5(postInput("re_password")))
        {
            $error['re_password']="Password incorrect";
        }
        //The blank is not necessarily faulty
        if(empty($error))
        {
            $id_insert =$db->insert("admin",$data);
            if($id_insert)
            {
                $_SESSION['success']="Add admin Successfully !";
                redirectAdmin("admin");
            }
            else
            {
                $_SESSION['error']="Add admin NOT Successfully !";
                redirectAdmin("admin");
            }
            
        }
    }
?>
<?php require_once __DIR__. "/../../layouts/header.php" ;?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Add New admin</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">admin</a></li>
            <li class="breadcrumb-item active">Add New admin</li>
        </ol>
        <div class="cleanfix"></div>

        <!-- Notification Error -->
        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>

        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-folder-plus mr-1"></i>
            <b> New admin</b>
        </div>
        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Full Name</b></label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Nguyễn Văn A" name="name" value="<?php echo $data['name'] ?>">
                    <?php if(isset($error['name'])):?>
                        <p class="text-danger">  <?php echo $error['name'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Email</b></label>
                <div class="col-sm-8">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email@gmail.com" name="email" value="<?php echo $data['email'] ?>">
                    <?php if(isset($error['email'])):?>
                        <p class="text-danger">  <?php echo $error['email'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Phone</b></label>
                <div class="col-sm-8">
                <input type="number" class="form-control" id="inputEmail3" placeholder="099666999" name="phone" value="<?php echo $data['phone'] ?>">
                    <?php if(isset($error['phone'])):?>
                        <p class="text-danger">  <?php echo $error['phone'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Password</b></label>
                <div class="col-sm-8">
                <input type="password" class="form-control" id="inputEmail3" placeholder="***********" name="password">
                    <?php if(isset($error['password'])):?>
                        <p class="text-danger">  <?php echo $error['password'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>ConfigPassword</b></label>
                <div class="col-sm-8">
                <input type="password" class="form-control" id="inputEmail3" placeholder="***********" name="re_password" required>
                    <?php if(isset($error['re_password'])):?>
                        <p class="text-danger">  <?php echo $error['re_password'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Address</b></label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Khu phố X - Phường Y - Quận Z - TP HCM" name="address" value="<?php echo $data['address'] ?>">
                    <?php if(isset($error['address'])):?>
                        <p class="text-danger">  <?php echo $error['address'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Level</b></label>
                <div class="col-sm-8">
                    <select class="form-control" name="level">
                        <option value="1" <?php echo isset($data['level']) && $data['level'] == 1 ? 
                        "selected='selected'":''?> > Admin </option>
                        <option value="2" <?php echo isset($data['level']) && $data['level'] == 2 ? 
                        "selected='selected'":''?> > CTV </option>
                    </select> 
                    <?php if(isset($error['level'])):?>
                        <p class="text-danger">  <?php echo $error['level'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-2 col-sm-8">
                <button type="submit" class="btn btn-success">Add New admin</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</main>
<?php require_once __DIR__. "/../../layouts/footer.php" ;?>