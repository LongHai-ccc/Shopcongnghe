<?php
    $open = "product";
    require_once __DIR__. "/../../autoload/autoload.php";
    // $product = $db->fetchAll("product");
    if(isset($_GET['page']))
    {
        $p=$_GET['page'];
    }
    else
    {
        $p=1;
    }

    $sql ="SELECT product.*,category.name as namecate from product LEFT JOIN category on category.id = product.category_id ORDER BY update_at DESC";

    $product=$db->fetchJone('product',$sql,$p,5,true);
    if(isset($product['page']))
    {
        $sotrang=$product['page'];
        unset($product['page']);
    }
?>
<?php require_once __DIR__. "/../../layouts/header.php" ;?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Product
            <a href="add.php" class="btn btn-success">Add Product</a>
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo base_url_admin() ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" >List Product</li>
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
            DataTable Product
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>category</th>
                            <th>Slug</th>
                            <th>Thunbar</th>
                            <th>Info</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $Number = 1 ; foreach ($product as $item): ?>
                            <tr>
                                <td><?php echo $Number ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['namecate'] ?></td>
                                <td><?php echo $item['slug'] ?></td>
                                
                                <td>
                                    <img src="<?php echo uploads()?>product/<?php echo $item['thumbar']?>" width="100px" height="70px">
                                </td>
                                <td>
                                    <ul>
                                        <li>Price : <?php echo formatPrice($item['price']) ?></li>
                                        <li>Sale : <?php echo formatPriceSale($item['price'],$item['sale']) ?></li>
                                        <li>Amount : <?php echo $item['number'] ?>
                                            <?php if($item['number'] < 1) :?>
                                                <p style="font-size: 15px; color: red;">add or remove products</p>
                                            <?php else : ?>

                                            <?php endif ; ?>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>">
                                    <i  class="fa fa-edit"></i> edit </a>
                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">
                                    <i  class="fa fa-times"></i> delete </a>
                                </td>
                            </tr>
                        <?php $Number++; endforeach ?>
                    </tbody>
                </table>
                <div class="pull-right" style="float: right;">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                            </li>
                            <?php for($i = 1 ; $i <= $sotrang ; $i++ ):?> 
                                <?php 
                                    if(isset($_GET['page']))
                                    {
                                        $p=$_GET['page'];
                                    }
                                    else
                                    {
                                        $p=1;
                                    }
                                ?>
                                <li class="page-item <?php echo ($i==$p) ?'active': '' ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php endfor; ?>

                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<?php require_once __DIR__. "/../../layouts/footer.php" ;?>