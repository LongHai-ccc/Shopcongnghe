<?php
    session_start();
    require_once __DIR__. "/../libraries/Database.php";
	require_once __DIR__. "/../libraries/Function.php";
	$db=new Database;
	$data =
    [
        "email" => postInput("email"),
        "password" => postInput("password"),
    ];
    $error=[];
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(postInput('email')=='')
        {
            $error['email']="Please enter email";
        }
        if(postInput('password')=='')
        {
            $error['password']="Please enter password";
        }
        //The blank is not necessarily faulty
        if(empty($error))
        {
            $is_check = $db->fetchOne("admin"," email = '".$data['email']."' AND password='".md5($data['password'])."'");
            if($is_check!= NULL)
            {
                $_SESSION['admin_name']=$is_check['name'];
                $_SESSION['admin_id']=$is_check['id'];
                echo "<script>alert('Login successfully !');location.href='/admin/'</script>'";
            }
            else
            {
                echo "<script>alert('Login NOT Successfully !');</script>";
            }
            
        }
        
    }

?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="padding-top:20px;">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="" method="POST">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>