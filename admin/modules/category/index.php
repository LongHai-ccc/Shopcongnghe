<?php
    $open = "category";
    require_once __DIR__. "/../../autoload/autoload.php";

    $category = $db->fetchAll("category");
?>
<?php require_once __DIR__. "/../../layouts/header.php" ;?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Categoty
            <a href="add.php" class="btn btn-success">Add Category</a>
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo base_url_admin() ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" >category</li>
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
            DataTable Category
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Home</th>
                            <th>Create</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $Number = 1 ; foreach ($category as $item): ?>
                            <tr>
                                <td><?php echo $Number ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['slug'] ?></td>
                                <td>
                                    <a href="home.php?id=<?php echo $item['id'] ?>"  class="btn <?php echo $item['home']== 1 ?'btn-success':'btn-warning' ?> ">
                                        <?php echo $item['home'] == 1 ? 'Show':'Hide ' ?>
                                    </a>
                                </td>
                                <td><?php echo $item['created_at'] ?></td>
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
            </div>
        </div>
    </div>
    </div>
</main>
<?php require_once __DIR__. "/../../layouts/footer.php" ;?>