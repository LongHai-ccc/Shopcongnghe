<?php
    $open = "contacts";
    require_once __DIR__. "/../../autoload/autoload.php";
    $sql = "SELECT * FROM contacts ORDER BY create_at DESC";
    $contact = $db->fetchsql($sql);
?>
<?php require_once __DIR__. "/../../layouts/header.php" ;?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Contacts Customer</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo base_url_admin() ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" >contacts</li>
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
            DataTable contacts
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name Customer</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Title</th>
                            <th>Process</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $Number = 1 ; foreach ($contact as $item): ?>
                            <tr>
                                <td><?php echo $Number ?></td>
                                <td><?php echo $item['c_name'] ?></td>
                                <td><?php echo $item['c_phone'] ?></td>
                                <td><?php echo $item['c_email'] ?></td>
                                <td><?php echo $item['c_title'] ?></td>
                                <td>
                                    <a href="process.php?id=<?php echo $item['id'] ?>"  class="btn <?php echo $item['c_process']== 1 ?'btn-danger':'btn-warning' ?> ">
                                        <?php echo $item['c_process'] == 1 ? 'processed':'handle ' ?>
                                    </a>
                                </td>
                                <td><?php echo $item['create_at'] ?></td>
                                <td>
                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i  class="fa fa-times"></i> delete </a>
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