<?php
session_start();

// If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE)
{
	header('Location:adminHome.php');
}

if(isset($_REQUEST['submitLogin'])){
    $enteredUsername = $_REQUEST['username'];
    $enterdPassword = $_REQUEST['passwd'];
    if($enteredUsername=="admin" && $enterdPassword == "admin"){
        header('Location: adminHome.php');
    }
    else{
        ?>
        <script>
            alert("Wrong User name or Password");
        </script>

        <?php
    }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'include/csslinks.php'; ?>
    <title>login page</title>
</head>
<body>


<div class="col-md-4 col-md-offset-4" id="wrapper" style="margin-top:0px;width:1510px;height: 736px; margin-left:0;" >
      <div id="page-content-wrapper">
           <form class="form loginform" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" style="margin-top:150px;width:500px;height:500px;margin-left:500px;" >
		          <div class="login-panel panel panel-default">
		      	      <div class="panel-heading">Please Sign in</div>
			          <div class="panel-body">
				            <div class="form-group">
				            	<label class="control-label">username</label>
				            	<input type="text" name="username" class="form-control" required="required">
				            </div>
				            <div class="form-group">
					            <label class="control-label">password</label>
					            <input type="password" name="passwd" class="form-control" required="required">
			             	</div>
				     <div class="checkbox">
				         	<label>
						           <input name="remember" type="checkbox" value="1">Remember Me
					        </label>
				     </div>
				     <input type="submit" class="btn btn-success loginField" value="Login" name="submitLogin">
	     		</div>
	     	</div>
	     </form>

       <!-- include the footer -->
       <?php include 'include/footer.php'; ?>
     </div>
</div>  



<!-- include js link files -->
<?php include 'include/jslinks.php'; ?> 

</body>
</html>