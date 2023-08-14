<?php
    $open = "articles";
    require_once __DIR__. "/../../autoload/autoload.php";
    $article=$db->fetchAll('articles');
?>
<?php require_once __DIR__. "/../../layouts/header.php" ;?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Article
            <a href="add.php" class="btn btn-success">Add Article</a>
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo base_url_admin() ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" >List Article</li>
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
            DataTable Article
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th style="width: 30%">Tên bài viết</th>
                            <th>Hình ảnh bài viết</th>
                            <th>Nỗi bật</th>
                            <th>Hiển thị</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $Number = 1 ; foreach ($article as $item): ?>
                            <tr>
                                <td><?php echo $Number ?></td>
                                <td><?php echo $item['a_name'] ?></td>
                                <td>
                                    <img src="<?php echo uploads()?>articles/<?php echo $item['a_avatar']?>" width="160px" height="100px">
                                </td>
                                <td>
                                    <a href="hot.php?id=<?php echo $item['id'] ?>"  class="btn <?php echo $item['a_hot']== 1 ?'btn-success':'btn-warning' ?> ">
                                        <?php echo $item['a_hot'] == 1 ? 'Show':'Hide ' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="home.php?id=<?php echo $item['id'] ?>"  class="btn <?php echo $item['a_home']== 1 ?'btn-success':'btn-warning' ?> ">
                                        <?php echo $item['a_home'] == 1 ? 'Show':'Hide ' ?>
                                    </a>
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
            </div>
        </div>
    </div>
    </div>
</main>

<?php require_once __DIR__. "/../../layouts/footer.php" ;?>