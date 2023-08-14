<?php
    $open = "users";
    require_once __DIR__. "/../autoload/autoload.php";

    $id = intval(getInput('id'));

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        $data =
        [
            "password" => MD5(postInput("password")),
        ];
        $error=[];

        if(postInput('password')!=NULL && postInput("re_password") != NULL)
        {
            if(postInput('password')!=postInput('re_password'))
            {
                $error['re_password']="password incorrect";
            }
            else
            {
                $data['password']=MD5(postInput('password'));
            }
        }

        //The blank is not necessarily faulty
        if(empty($error))
        {
            $id_update =$db->update("admin",$data,array("id"=>$id));
            if($id_update>0)
            {
                $_SESSION['success']="Update admin Successfully !";
                redirectAdmin("admin");
            }
            else
            {
                $_SESSION['error']="Update admin NOT Successfully !";
                redirectAdmin("admin");
            }
            
        }
    }
?>
<?php require_once __DIR__. "/../layout-personal/headeruser.php" ;?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Update Password</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">user</a></li>
            <li class="breadcrumb-item active">Update Password</li>
        </ol>
        <div class="cleanfix"></div>

        <!-- Notification Error -->

        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-folder-plus mr-1"></i>
            <b> Update password</b>
        </div>
        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
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
                <input type="password" class="form-control" id="inputEmail3" placeholder="***********" name="re_password">
                    <?php if(isset($error['re_password'])):?>
                        <p class="text-danger">  <?php echo $error['re_password'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-2 col-sm-8">
                <button type="submit" class="btn btn-success">Update password</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</main>
<?php require_once __DIR__. "/../layout-personal/footeruser.php" ;?>