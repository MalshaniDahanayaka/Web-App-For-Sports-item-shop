<?php

$_SESSION['selectedItemCount'] =0;
if(isset($_SESSION['cart'])){
  


$UserId =  $_SESSION['usermail']; 
 //get item details from datbase
$getselectedItemscount = "SELECT SUM(count) FROM cart WHERE email = '".$UserId."' ";
$TotalCountOfItems = $con->query($getselectedItemscount);
$CountValue = $TotalCountOfItems->fetch_array(); 
$_SESSION['selectedItemCount'] = $CountValue['SUM(count)']; 



}

?>