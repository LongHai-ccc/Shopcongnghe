<?php
    $open = "users";
    require_once __DIR__. "/../autoload/autoload.php";
    $id = intval(getInput('id'));
    $Editusers = $db->fetchID("users" ,$id);
    
    $get_ratings = "SELECT * FROM ratings WHERE ra_user_id = $id ";
        
    $run_ratings = mysqli_query($con,$get_ratings);
    
    $count_ratings = mysqli_num_rows($run_ratings);

    $get_transaction = "select * from transaction where users_id=$id";
        
    $run_transaction = mysqli_query($con,$get_transaction);
    
    $count_transaction = mysqli_num_rows($run_transaction);

    $get_totaltransaction = "SELECT SUM(amount) as SUM FROM transaction where users_id=$id";

    $run_totaltransaction = mysqli_query($con,$get_totaltransaction);

    $sum_totaltransaction = mysqli_fetch_assoc($run_totaltransaction)['SUM'];

    $get_totalqty = "SELECT SUM(orders.qty) as SUM FROM transaction, orders WHERE transaction.id = orders.transaction_id and users_id = $id";

    $run_totalqty = mysqli_query($con,$get_totalqty);

    $sum_totalqty = mysqli_fetch_assoc($run_totalqty)['SUM'];

    

?>
<?php require_once __DIR__. "/../layout-personal/headeruser.php" ;?>
<main>
<div class="col-md-12">
    <h2 style="margin-top: 30px; text-align: center;">TỔNG QUAN</h2>
    <div class="row" style="padding: 20px; margin-left: 140px;" >
        <div class="col-md-5" style="margin-right: 60px; color: #FFF; background: linear-gradient(to top left, #ff6600 -3%, #ffcc66 106%); padding: 10px;height: 180px;border-radius: 5px;">
            <div>
                <h4  style="font-size: 35px; text-align: center;">Total Amount</h4>
                <p style="opacity: 0.8; text-align: center;">Last year expenses</p>
            </div>
            <div>
                <h1 style="text-align: center;"><?php echo formatPrice($sum_totaltransaction); ?></h1>
            </div>
        </div>
        <div class="col-md-5" style="margin-right: 40px; color: #FFF; background: linear-gradient(to left, #0066ff -3%, #33ccff 106%); padding: 10px;height: 180px;border-radius: 5px;">
            <div>
                <h4  style="font-size: 35px; text-align: center;">Total Transaction</h4>
                <p style="opacity: 0.8; text-align: center;">Last year expenses</p>
            </div>
            <div>
                <h1 style="text-align: center;"><?php echo $count_transaction; ?></h1>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 20px; margin-left: 140px;" >
        <div class="col-md-5" style="margin-right: 60px; color: #FFF; background: linear-gradient(to right, #ff6600 0%, #cc0000 100%); padding: 10px;height: 180px;border-radius: 5px;">
            <div>
                <h4  style="font-size: 35px; text-align: center;">Total Comment</h4>
                <p style="opacity: 0.8; text-align: center;">Last year expenses</p>
            </div>
            <div>
                <h1 style="text-align: center;"><?php echo $count_ratings ?></h1>
            </div>
        </div>
        <div class="col-md-5" style="margin-right: 40px; color: #FFF; background: linear-gradient(to right, #00ff00 0%, #009933 100%); padding: 10px;height: 180px;border-radius: 5px;">
            <div>
                <h4  style="font-size: 35px; text-align: center;">Total QTY</h4>
                <p style="opacity: 0.8; text-align: center;">Last year expenses</p>
            </div>
            <div>
                <h1 style="text-align: center;"><?php echo $sum_totalqty; ?></h1>
            </div>
        </div>
    </div>
</div>
</main>
<?php require_once __DIR__. "/../layout-personal/footeruser.php" ;?>