<?php
    $open = "ratings";
    $con = mysqli_connect("localhost","root","","shopcongnghe");
    require_once __DIR__. "/../../autoload/autoload.php";
    // $product = $db->fetchAll("product");
    $sql="SELECT users.id u_id,users.name AS u_name,product.name AS pro_name ,product.id AS pro_id,ratings.* FROM ratings , users ,product WHERE users.id = ratings.ra_user_id and product.id = ratings.ra_product_id ORDER BY updated_at DESC";
    $ratings = mysqli_query($con,$sql);
?>
<?php require_once __DIR__. "/../../layouts/header.php" ;?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">List transaction</h1>
        <!--  -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo base_url_admin() ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" >List Transaction</li>
        </ol>
        <div class="cleanfix"></div>

        <!-- Notification Error -->
        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>

        <!-- <div class="card mb-4">
            <div class="card-body">
                <p class="mb-0"></p>
            </div>
        </div> -->
        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Ratings
        </div> 
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên thành viên</th>
                        <th>Tên sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Rating</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $Number = 1 ; foreach($ratings as $rating) :?>
                            <tr>
                                <td><?php echo $Number ?></td>
                                <td><?php echo $rating['u_name'] ?></td>
                                <td><a href="#"><?php echo $rating['pro_name'] ?></a></td>
                                <td><?php echo $rating['ra_content'] ?></td>
                                <td><?php echo $rating['ra_number'] ?></td>
                                <td>
                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $rating['id'] ?>"><i  class="fa fa-times"></i> delete </a>
                                </td>
                               
                            </tr>
                        <?php $Number++; endforeach ;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__. "/../../layouts/footer.php" ;?>