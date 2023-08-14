<?php
    require_once __DIR__. "/autoload/autoload.php";

    // ======================ROW 1=========================
    $get_products = "select * from product";
        
    $run_products = mysqli_query($con,$get_products);
    
    $count_products = mysqli_num_rows($run_products);

    $get_users = "select * from users";
        
    $run_users = mysqli_query($con,$get_users);
    
    $count_users = mysqli_num_rows($run_users);

    $get_transaction = "select * from transaction";
        
    $run_transaction = mysqli_query($con,$get_transaction);
    
    $count_transaction = mysqli_num_rows($run_transaction);
    // =========================SUM TOTAL=================================

    $get_totaltransaction = "SELECT SUM(amount) as SUM FROM transaction";
    
    $run_totaltransaction = mysqli_query($con,$get_totaltransaction);

    $sum_totaltransaction = mysqli_fetch_assoc($run_totaltransaction)['SUM'];

    // =======================ROW 2====================================

    $get_ratings = "select * from ratings";
        
    $run_ratings = mysqli_query($con,$get_ratings);
    
    $count_ratings = mysqli_num_rows($run_ratings);

    $get_articles = "select * from articles";
        
    $run_articles = mysqli_query($con,$get_articles);
    
    $count_articles = mysqli_num_rows($run_articles);

    $get_contacts = "select * from contacts";
        
    $run_contacts = mysqli_query($con,$get_contacts);
    
    $count_contacts = mysqli_num_rows($run_contacts);



?>
<?php
    $open = "transaction";
    if(isset($_GET['page']))
    {
        $p=$_GET['page'];
    }
    else
    {
        $p=1;
    }
    $sql ="SELECT transaction.* , users.name as nameusers, users.phone as phoneusers  FROM transaction LEFT JOIN users on users.id = transaction.users_id ORDER BY created_at Desc ";

    $transaction=$db->fetchJone('transaction',$sql,$p,5,true);
    if(isset($transaction['page']))
    {
        $sotrang=$transaction['page'];
        unset($transaction['page']);
    }
?>
<?php require_once __DIR__. "/layouts/header.php" ;?>
<main>
<div class="col-md-12">
    <div class="row" style="padding: 10px;margin-left: 150px;margin-top: 20px;" >
        <div class="col-md-3" style="margin-right: 40px; color: #FFF; background: linear-gradient(to top left, #ff6600 -3%, #ffcc66 106%); padding: 10px;height: 80px;border-radius: 5px;">
            <div>
                <h4 style="font-size: 18px;">Total Order</h4>
                <p style="opacity: 0.8;">Last year expenses</p>
            </div>
            <div style="float: right; margin-top: -60px;">
                <h1><?php echo $count_transaction?></h1>
            </div>
        </div>
        <div class="col-md-3" style="margin-right: 40px; color: #FFF; background: linear-gradient(to left, #0066ff -3%, #33ccff 106%); padding: 10px;height: 80px;border-radius: 5px;">
            <div>
                <h4 style="font-size: 18px;">Total Product</h4>
                <p style="opacity: 0.8;">Last year expenses</p>
            </div>
            <div style="float: right; margin-top: -60px;">
                <h1><?php echo $count_products; ?></h1>
            </div>
        </div>
        <div class="col-md-3" style="margin-right: 40px; color: #FFF; background: linear-gradient(to right, #9900ff 0%, #000066 100%); padding: 10px;height: 80px;border-radius: 5px;">
            <div>
                <h4 style="font-size: 18px;">Total User</h4>
                <p style="opacity: 0.8;">Last year expenses</p>
            </div>
            <div style="float: right; margin-top: -60px;">
                <h1><?php echo $count_users ?></h1>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 10px; margin-left: 150px;" >
        <div class="col-md-3" style="margin-right: 40px; color: #FFF; background: linear-gradient(to left, #006600 0%, #66ff33 100%); padding: 10px;height: 80px;border-radius: 5px;">
            <div>
                <h4 style="font-size: 18px;">Total Rating</h4>
                <p style="opacity: 0.8;">Total rating for the year</p>
            </div>
            <div style="float: right; margin-top: -60px;">
                <h1><?php echo $count_ratings?></h1>
            </div>
        </div>
        <div class="col-md-3" style="margin-right: 40px; color: #FFF; background: linear-gradient(to left, #660066 0%, #ff66ff 100%); padding: 10px;height: 80px;border-radius: 5px;">
            <div>
                <h4 style="font-size: 18px;">Total Articles</h4>
                <p style="opacity: 0.8;">Last year expenses</p>
            </div>
            <div style="float: right; margin-top: -60px;">
                <h1><?php echo $count_articles; ?></h1>
            </div>
        </div>
        <div class="col-md-3" style="margin-right: 40px; color: #FFF; background: linear-gradient(to left, #ff3300 0%, #ff9900 100%); padding: 10px;height: 80px;border-radius: 5px;">
            <div>
                <h4 style="font-size: 18px;">Total Customer Inquiries</h4>
                <p style="opacity: 0.8;">Last year expenses</p>
            </div>
            <div style="float: right; margin-top: -60px;">
                <h1><?php echo $count_contacts ?></h1>
            </div>
        </div>
    </div>
<div class="row" style="margin-top: 30px;">
    <div class="container-fluid">
        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            New Transaction
        </div> 
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date created</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $Number = 1 ; foreach ($transaction as $item): ?>
                        <tr>
                            <td><?php echo $Number ?></td>
                            <td><?php echo $item['nameusers'] ?></td>
                            <td><?php echo $item['phoneusers'] ?></td>
                            <td><?php echo formatPrice($item['amount']) ?></td>
                            <td>
                                <a href="status.php?id=<?php echo $item['id']?>" class="btn btn-xs <?php echo $item['status']==0 ? 'btn-info':'btn-danger' ?>"><?php echo $item['status']==0 ? 'Not processed' : 'Processed' ?></a>
                            </td>
                            <td><?php echo $item['created_at'] ?></td>
                        </tr>
                    <?php $Number++; endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    </div>
</main>
<?php require_once __DIR__. "/layouts/footer.php" ;?>
