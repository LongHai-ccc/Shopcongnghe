<?php
    $open = "category";
    require_once __DIR__. "/../../autoload/autoload.php"; 


    // ------------GET ID---------------

    $id = intval(getInput('id'));
    $EditCategory = $db->fetchID("category" ,$id);
    if(empty($EditCategory))
    {
        $_SESSION['error'] ="Data does not exist";
        redirectAdmin("category");
    }

    // -----------------------------


    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $data =[
            "name" => postInput('name'),
            "slug" => to_slug(postInput("name"))
        ];
        $error=[];
        if(postInput('name')=='')
        {
            $error['name']="Please enter the full name of the category";
        }
        //The blank is not necessarily faulty
        if(empty($error))
        {
            $isset =$db->fetchOne("category","name='".$data['name']."'");
            if(count($isset)>0)
            {
                $_SESSION['error']="Category name already exists";
            }
            else
            {
                $id_update =$db->update("category",$data,array("id"=>$id));
                if($id_update>0)
                {
                    $_SESSION['success']="Update category successfully !";
                    redirectAdmin("category");
                }
                else{
                    $_SESSION['error']="Update category NOT successfully !";
                    redirectAdmin("category");
                }
            }
        }
        else
        {
            $id_update =$db->update("category",$data,array("id"=>$id));
            if($id_update>0)
            {
                $_SESSION['success']="Update category successfully !";
                redirectAdmin("category");
            }
            else{
                $_SESSION['error']="Update category NOT successfully !";
                redirectAdmin("category");
            }
        }

    }

?>
<?php require_once __DIR__. "/../../layouts/header.php" ;?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Update Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Category</a></li>
            <li class="breadcrumb-item active">Update Category</li>
        </ol>
        <div class="cleanfix"></div>
        <!-- Notification Error -->
        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>

        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-folder-plus mr-1"></i>
            <b> Update Category</b>
        </div>
        <div class="card-body">
        <form action="" method="POST">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Category Name</b></label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Category Name ..." name="name" 
                value="<?php echo $EditCategory['name'] ?>">
                    <?php if(isset($error['name'])):?>
                        <p class="text-danger">  <?php echo $error['name'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-2 col-sm-8">
                <button type="submit" class="btn btn-success">Update Category</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</main>
<?php require_once __DIR__. "/../../layouts/footer.php" ;?>