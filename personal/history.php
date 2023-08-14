<?php
    $open = "transaction";
    require_once __DIR__. "/../autoload/autoload.php";
    $id = intval(getInput('id'));
    $sql ="SELECT users.* ,transaction.* FROM transaction , users WHERE users.id = transaction.users_id and users.id=$id ORDER BY transaction.update_at Desc ";
    $transaction = mysqli_query($con,$sql);
?>
<?php require_once __DIR__. "/../layout-personal/headeruser.php" ;?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Update admin</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active">History transaction</li>
        </ol>
        <div class="cleanfix"></div>

        <!-- Notification Error -->

        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-folder-plus mr-1"></i><b> History transaction</b>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date created</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $Number = 1 ; foreach ($transaction as $item): ?>
                        <tr>
                            <td><?php echo $Number ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['phone'] ?></td>
                            <td><?php echo formatPrice($item['amount']) ?></td>
                            <td>
                                <p  class=""><?php echo $item['status']==0 ? 'Not processed' : 'Processed' ?></p>
                            </td>
                            <td><?php echo $item['created_at'] ?></td>
                            <td>
                                <a class="js_order_item btn btn-xs btn-success" data-id="<?php echo $item['id'] ?>"  href="view.php?id=<?php echo $item['id'] ?>" ><i class="ace-icon fa fa-eye"> </i>view</a>
                            </td>
                        </tr>
                    <?php $Number++; endforeach ?>
                </tbody>
            </table>
            <div id="myModelOrder" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Chi tiết mã đơn hàng : #<b class='transaction_id'></b></h4>
                        </div>
                        <div class="modal-body" id="md_content">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<script>
   $(function(){
     $(".js_order_item").click(function(event){
      event.preventDefault();
      let $this = $(this);
      let url =$this.attr('href');
      $(".transaction_id").text($this.attr('data-id'));
      $("#myModelOrder").modal('show');

      $.ajax({
        url: url,
      }).done(function(result){
        console.log(result);
        if(result)
        {
          $("#md_content").html('').append(result);
        }
      });
   });
  })
 </script>
<?php require_once __DIR__. "/../layout-personal/footeruser.php" ;?>