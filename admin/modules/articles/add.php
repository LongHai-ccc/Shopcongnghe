<?php
    $open = "articles";
    require_once __DIR__. "/../../autoload/autoload.php";
    
    $articles =$db->fetchAll("articles");
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $data =[
            "a_name" => postInput('a_name'),
            "a_slug" => to_slug(postInput("a_name")),
            "a_description" => postInput("a_description"),
            "a_content" => postInput("a_content"),
        ];
        $error=[];
        if(postInput('a_name')=='')
        {
            $error['a_name']="Please enter the full name of the articles";
        }
        if(postInput('a_description')=='')
        {
            $error['a_description']="Please choose name a_description";
        }
        if(postInput('a_content')=='')
        {
            $error['a_content']="Please enter price articles";
        }
        if(! isset($_FILES['a_avatar']))
        {
            $error['a_avatar']="Please choose images articles";
        }
        //The blank is not necessarily faulty
        if(empty($error))
        {
            if(isset($_FILES['a_avatar']))
            {
                $file_name = $_FILES['a_avatar']['name'];
                $file_tmp = $_FILES['a_avatar']['tmp_name'];
                $file_type = $_FILES['a_avatar']['type'];
                $file_erro = $_FILES['a_avatar']['error'];

                if($file_erro == 0)
                {
                    $part = ROOT ."articles/";
                    $data['a_avatar'] = $file_name;
                }
            }
            $id_insert =$db->insert("articles",$data);
            if($id_insert)
            {
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success']="Add articles Successfully !";
                redirectAdmin("articles");
            }
            else
            {
                $_SESSION['error']="Add articles NOT Successfully !";
                redirectAdmin("articles");
            }
            
        }
    }
?>
<?php require_once __DIR__. "/../../layouts/header.php" ;?>
<main>
    <!-- <?php _debug($data); ?> -->
    <div class="container-fluid">
        <h1 class="mt-4">Add New articles</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">articles</a></li>
            <li class="breadcrumb-item active">Add New articles</li>
        </ol>
        <div class="cleanfix"></div>

        <!-- Notification Error -->
        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>

        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-folder-plus mr-1"></i>
            <b> New articles</b>
        </div>
        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Articles Name</b></label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Articles Name ..." name="a_name">
                    <?php if(isset($error['a_name'])):?>
                        <p class="text-danger">  <?php echo $error['a_name'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Images</b></label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" id="inputEmail3" placeholder="15%" name="a_avatar">
                    <?php if(isset($error['a_avatar'])):?>
                        <p class="text-danger">  <?php echo $error['a_avatar'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Discription short</b></label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="a_description" rows="4"></textarea>
                    <?php if(isset($error['a_description'])):?>
                        <p class="text-danger">  <?php echo $error['a_description'] ?> </p>
                    <?php endif ?>

                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Discription</b></label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="a_content" rows="5"></textarea>
                    <?php if(isset($error['a_content'])):?>
                        <p class="text-danger">  <?php echo $error['a_content'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-2 col-sm-8">
                <button type="submit" class="btn btn-success">Add New articles</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</main>
<script src="/public/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('a_content');
</script>
<?php require_once __DIR__. "/../../layouts/footer.php" ;?>