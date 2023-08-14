<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    $sum=0;
    if(! isset($_SESSION['cart'])|| count($_SESSION['cart'])==0 )
    {
        echo "<script>alert('There are no items in your shopping cart !');location.href='index.php'</script>";
    }
?>

<!-- This is HEADER -->
<?php require_once __DIR__. "/layouts/header.php" ;?>
<?php require_once __DIR__. "/layouts/banner.php" ;?>
<!-- END HEADER -->


<div class="col-md-9 bor" style="padding-bottom: 15px;">
    <section class="box-main1" >

        <!-- NOTIFiCATION -->
        <?php if(isset($_SESSION['success'])) :?>
            <div class="alert alert-success" style="margin-top:20px;">
                <strong style="color:#155724;">SUCCESS ! </strong><?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
            </div>
        <?php endif ?>
        <?php if(isset($_SESSION['error'])) :?>
            <div class="alert alert-danger" style="margin-top:20px;">
                <strong style="color:#a94442;">ERROR ! </strong><?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
            </div>
        <?php endif ?>
        <!-- NOTIFiCATION -->
        <!-- ----------MAIN-------------- -->
            <h3 class="title-main"><a href="">shopping cart for you</a></h3>
            <table class="table table-hover" style="margin-bottom: 25px;" id="shoppingcart_info">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Product's name</th>
                    <th scope="col">Products images</th>
                    <th scope="col">Product number</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=1 ; foreach ($_SESSION['cart'] as $key =>$value): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td>
                                <img src="<?php echo uploads() ?>product/<?php echo $value['thumbar'] ?>" width="80px" height="60px">
                            </td>
                            <td style="text-align: center;">
                                <input type="number" class="qty" value="<?php echo $value['qty'] ?>" min="0" max="10" step="1" name="qty" /> 
                            </td>
                            <td><?php echo formatPrice($value['price'])?></td>
                            <td><?php echo formatPrice($value['qty']* $value['price'])?></td>
                            <td>
                                <a href="#" class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?> >
                                    <i class="fa fa-refresh"></i>
                                    update 
                                </a>
                                <a href="remove_cart.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger">
                                    <i class="fa fa-times"></i> 
                                    delete 
                                </a>
                            </td>
                        </tr>
                        <?php $sum += $value['price'] * $value['qty'];$_SESSION['total']=$sum; ?>
                    <?php $stt ++; endforeach ?>
                </tbody>
            </table>
            <div>
            <div class="col-md-6 pull-right">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>Your order information</h3>
                    </li>
                    <li class="list-group-item">
                        <span class=" badge"><?php echo formatPrice($_SESSION['total']) ?></span> Provisional Amount
                    </li>
                    <li class="list-group-item">
                        <span class=" badge">10%</span> VAT 
                    </li>
                    <li class="list-group-item">
                        <span class=" badge"><?php echo sale($_SESSION['total']) ?> % </span> Discount
                    </li>
                    <li class="list-group-item">
                        <span class=" badge"><?php $_SESSION['total_bill']=$_SESSION['total']*110/100; echo formatPrice($_SESSION['total_bill']) ?> </span> Mount payable
                    </li>
                    <li class="list-group-item">
                        <a href="index.php" class="btn btn-warning">Continue to buy</a>
                        <a href="payment.php" class="btn btn-success">Payment now</a>
                    </li>
                </ul>
            </div>
            </div>
        <!-- ----------MAIN-------------- -->
    </section>
</div>
<!-- <script>
    $(document).ready(function(){
        var qtyinput ;
        $( ".updatecart" ).click(function(event) {
            qtyinput=$(event.target).parent().parent().find(".qty");
            $.ajax({
            method: "POST",
            url: "ajax_check_qty.php",
            data: { 
                id: $(event.target).attr('data-key'),
                number:$(event.target).parent().parent().find(".qty").val(),
                }
            })
            .done(function(n) {
                qtyinput.val(n);
            });
        });
    }); 
</script> -->
<!-- This is Footer -->
<?php require_once __DIR__. "/layouts/footer.php" ;?>
<!-- END Footer -->