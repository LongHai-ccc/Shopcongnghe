<?php
    $open = "users";
    require_once __DIR__. "/../autoload/autoload.php";

    $id = intval(getInput('id'));
    $Editusers = $db->fetchID("users" ,$id);
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        $data =
        [
            "name" => postInput('name'),
            "email" => postInput("email"),
            "phone" => postInput("phone"),
            "address" => postInput("address"),
            "avatar" => postInput("avatar"),
        ];
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
            if(postInput("email") != $Editusers['email'])
            {
                $is_check = $db->fetchOne("users","email='".$data['email']."' ");
                if($is_check!=NULL)
                {
                    $error['email']="Email already exists";
                }
            }
        }
        if(postInput('phone')=='')
        {
            $error['phone']="Please enter phone";
        }
        if(postInput('address')=='')
        {
            $error['address']="Please enter address";
        }
        if(! isset($_FILES['avatar']))
        {
            $error['avatar']="Please choose images product";
        }
        //The blank is not necessarily faulty
        if(empty($error))
        {
            if(isset($_FILES['avatar']))
            {
                $file_name = $_FILES['avatar']['name'];
                $file_tmp = $_FILES['avatar']['tmp_name'];
                $file_type = $_FILES['avatar']['type'];
                $file_erro = $_FILES['avatar']['error'];

                if($file_erro == 0)
                {
                    $part = ROOT ."avatar/";
                    $data['avatar'] = $file_name;
                }
            }
            $updated =$db->update("users",$data,array("id"=>$id));
            if($updated>0)
            {
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success']="Update product successfully !";
            }
            else{
                $_SESSION['error']="Update product NOT successfully !";
            }
        }
    }
?>
<?php require_once __DIR__. "/../layout-personal/headeruser.php" ;?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Update users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">users</a></li>
            <li class="breadcrumb-item active">Update users</li>
        </ol>
        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-folder-plus mr-1"></i>
            <b> Update users</b>
        </div>
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
        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Full Name</b></label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Nguyễn Văn A" name="name" value="<?php echo $Editusers['name'] ?>">
                    <?php if(isset($error['name'])):?>
                        <p class="text-danger">  <?php echo $error['name'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Email</b></label>
                <div class="col-sm-8">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email@gmail.com" name="email" value="<?php echo $Editusers['email'] ?>">
                    <?php if(isset($error['email'])):?>
                        <p class="text-danger">  <?php echo $error['email'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Phone</b></label>
                <div class="col-sm-8">
                <input type="number" class="form-control" id="inputEmail3" placeholder="099666999" name="phone" value="<?php echo $Editusers['phone'] ?>">
                    <?php if(isset($error['phone'])):?>
                        <p class="text-danger">  <?php echo $error['phone'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Address</b></label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Khu phố X - Phường Y - Quận Z - TP HCM" name="address" value="<?php echo $Editusers['address'] ?>">
                    <?php if(isset($error['address'])):?>
                        <p class="text-danger">  <?php echo $error['address'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Images</b></label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" id="inputEmail3" placeholder="15%" name="avatar">
                    <?php if(isset($error['avatar'])):?>
                        <p class="text-danger">  <?php echo $error['avatar'] ?> </p>
                    <?php endif ?>
                    <img src="<?php echo uploads()?>avatar/<?php echo $Editusers['avatar'] ?>" width="250px" height="250px">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-2 col-sm-8">
                <button type="submit" class="btn btn-success">Update users</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</main>
<?php require_once __DIR__. "/../layout-personal/footeruser.php" ;?>