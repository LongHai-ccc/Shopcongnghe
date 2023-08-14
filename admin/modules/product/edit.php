<?php
    $open = "product";
    require_once __DIR__. "/../../autoload/autoload.php";
    $category =$db->fetchAll("category");
    
    $id = intval(getInput('id'));
    $Editproduct = $db->fetchID("product" ,$id);
    if(empty($Editproduct))
    {
        $_SESSION['error'] ="Product does not exist";
        redirectAdmin("product");
    }
    $product =$db->fetchAll("product");
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $data =[
            "name" => postInput('name'),
            "slug" => to_slug(postInput("name")),
            "category_id" => postInput("category_id"),
            "price" => postInput("price"),
            "number" => postInput("number"),
            "cpu" => postInput("cpu"),
            "short_content" => postInput("short_content"),
            "content" => postInput("content"),
            "sale" => postInput("sale"),
            "bonus" => postInput("bonus"),
        ];
        $error=[];
        if(postInput('name')=='')
        {
            $error['name']="Please enter the full name of the product";
        }
        if(postInput('category_id')=='')
        {
            $error['category_id']="Please choose name category";
        }
        if(postInput('price')=='')
        {
            $error['price']="Please enter price product";
        }
        if(postInput('number')=='')
        {
            $error['number']="Please enter number product";
        }
        if(postInput('short_content')=='')
        {
            $error['short_content']="Please enter discription short product";
        }
        if(postInput('content')=='')
        {
            $error['content']="Please enter discription product";
        }
        if(postInput('cpu')=='')
        {
            $error['cpu']="Please enter discription cpu product";
        }
        if(! isset($_FILES['thumbar']))
        {
            $error['thumbar']="Please choose images product";
        }
        //The blank is not necessarily faulty
        if(empty($error))
        {
            if(isset($_FILES['thumbar']))
            {
                $file_name = $_FILES['thumbar']['name'];
                $file_tmp = $_FILES['thumbar']['tmp_name'];
                $file_type = $_FILES['thumbar']['type'];
                $file_erro = $_FILES['thumbar']['error'];

                if($file_erro == 0)
                {
                    $part = ROOT ."product/";
                    $data['thumbar'] = $file_name;
                }
            }
            $update =$db->update("product",$data,array("id"=>$id));
            if($update>0)
            {
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success']="Update product successfully !";
                redirectAdmin("product");
            }
            else{
                $_SESSION['error']="Update product NOT successfully !";
                redirectAdmin("product");
            }
        }
    }
?>
<?php require_once __DIR__. "/../../layouts/header.php" ;?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Update New Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php">Product</a></li>
            <li class="breadcrumb-item active">Update New Product</li>
        </ol>
        <div class="cleanfix"></div>

        <!-- Notification Error -->
        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>

        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-folder-plus mr-1"></i>
            <b> New Product</b>
        </div>
        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Category Name</b></label>
                <div class="col-sm-8">
                    <select class="form-control" name="category_id">
                        <option value="">--Please select a product category--</option>
                        <?php foreach ($category as $item): ?>
                            <option value="<?php echo $item['id'] ?>" <?php echo $Editproduct['category_id'] == $item['id'] ? "selected = 'select'" : ' '?>>
                                <?php echo $item['name']?> 
                            </option>
                        <?php endforeach ?>
                    </select>
                    <?php if(isset($error['category_id'])):?>
                        <p class="text-danger">  <?php echo $error['category_id'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Product Name</b></label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="product Name ..." name="name" value="<?php echo $Editproduct['name'] ?>">
                    <?php if(isset($error['name'])):?>
                        <p class="text-danger">  <?php echo $error['name'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Product Price</b></label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="9.000.000" name="price" value="<?php echo $Editproduct['price'] ?>">
                    <?php if(isset($error['price'])):?>
                        <p class="text-danger">  <?php echo $error['price'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Product Number</b></label>
                <div class="col-sm-8">
                <input type="number" class="form-control" id="inputEmail3" placeholder="15" name="number" value="<?php echo $Editproduct['number'] ?>">
                    <?php if(isset($error['number'])):?>
                        <p class="text-danger">  <?php echo $error['number'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Product Sale</b></label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="15%" name="sale" value="<?php echo $Editproduct['sale'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Images</b></label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" id="inputEmail3" placeholder="15%" name="thumbar">
                    <?php if(isset($error['thumbar'])):?>
                        <p class="text-danger">  <?php echo $error['thumbar'] ?> </p>
                    <?php endif ?>
                    <img src="<?php echo uploads()?>product/<?php echo $Editproduct['thumbar'] ?>" width="250px" height="220px">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Bonus</b></label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" placeholder="product bonus ..." name="bonus" value="<?php echo $Editproduct['bonus'] ?>">
            </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Discription CPU</b></label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="cpu" rows="5"><?php echo $Editproduct['cpu'] ?></textarea>
                    <?php if(isset($error['cpu'])):?>
                        <p class="text-danger">  <?php echo $error['cpu'] ?> </p>
                    <?php endif ?>

                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Discription short</b></label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="short_content" rows="4"><?php echo $Editproduct['short_content'] ?></textarea>
                    <?php if(isset($error['short_content'])):?>
                        <p class="text-danger">  <?php echo $error['short_content'] ?> </p>
                    <?php endif ?>

                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align: right;"><b>Discription</b></label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="content" rows="5"><?php echo $Editproduct['content'] ?></textarea>
                    <?php if(isset($error['content'])):?>
                        <p class="text-danger">  <?php echo $error['content'] ?> </p>
                    <?php endif ?>

                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-2 col-sm-8">
                <button type="submit" class="btn btn-success">Update Product</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</main>
<script src="/public/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
    CKEDITOR.replace('cpu');
</script>
<?php require_once __DIR__. "/../../layouts/footer.php" ;?>