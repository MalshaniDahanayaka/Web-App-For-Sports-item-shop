<?php

include '../include/Connection.php';
session_start();
               

if(isset($_REQUEST['updateUser'])){
  
    $wantToupdateUserEmail = $_REQUEST['updateDetails'];
    $_SESSION['wantToupdateUserEmail']=$wantToupdateUserEmail;

   //show user details before updating
   $getUserDetails = "SELECT * FROM users WHERE email = '".$wantToupdateUserEmail."' ";
   $userDetails = $con->query($getUserDetails);
   $row = $userDetails->fetch_array();
  
}


//update new details to user table
if(isset($_REQUEST['submitUpadates'])){

    $wantToupdateUserEmail = $_SESSION['wantToupdateUserEmail'];

    $newUserName = $_REQUEST['updateUserName'];
    $newEmail = $_REQUEST['updateEmail'];
    $newPassword = $_REQUEST['updatePassword'];

    $updateUserDetails = "UPDATE users SET  email='".$newEmail."', username='".$newUserName."',  password='".$newPassword."' WHERE email = '".$wantToupdateUserEmail."' ";
    $con->query($updateUserDetails);

    header("Location: customerInfo.php");

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'include/csslinks.php'; ?>
    <title>Update User Information</title>
</head>
<body>
<div class="d-flex" id="wrapper">
        <!-- include sidebar codes-->
        <?php include 'include/sideBar.php'?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
                 <!-- include upper navigation bar codes-->
                 <?php include 'include/headerNav.php'?>
                 <nav style="background-color: green; text-align:center;width:100rem;margin-right: auto;margin-left: auto;"><h1>Update User Information</h1> </nav>
                 
            
                 <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" style="background:rgb(197, 196, 193); width:100rem;height: 590px;border-radius: 20px;margin:auto;text-align:center;">
                    <div>
                        <label for="updateUserName" style="margin-left:-100px;margin-top:100px;font-size:x-large;margin-right:50px;">User Name</label>
                        <input type="text" id="updateUserName" value="<?php echo $row['username']; ?>" name ="updateUserName">
                    </div>
                    <div>
                        <label for="updateEmail" style="margin-left:-100px;margin-top:50px;font-size:x-large;margin-right:50px;">User Email</label>
                        <input type="text" id="updateEmail" value="<?php echo $row['email']; ?>" name="updateEmail">
                    </div>
                    <div>
                        <label for="updatePassword" style="margin-left:-100px;margin-top:50px;font-size:x-large;margin-right:55px;">Password</label>
                        <input type="text" id="updatePassword" value="<?php echo $row['password'];?>" name="updatePassword">
                    </div>
                    <div>
                        
                        <input type="submit" id="submitUpadates" name="submitUpadates" style="margin-left:0px;margin-top:50px;font-size:x-large;margin-left:30px;background-color:blue;margin-bottom:100px;" value="Update">
                    </div>
                
                <!-- include the footer -->
                 <?php include 'include/footer.php'; ?>
                
                </form>
       


                
                
                
        </div>
       
</div>










<?php include 'include/jslinks.php'; ?>
</body>
</html>