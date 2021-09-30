<?php
include 'include/Connection.php';
session_start();
//session_destroy();


if(isset($_REQUEST['Usermail'])){
$_SESSION['usermail']  = $_REQUEST['Usermail'] ;
}
elseif(isset($_REQUEST['usermail'])){
    $_SESSION['usermail']  = $_REQUEST['usermail'] ;
}

$_SESSION['totalCount'] = 0;


// $_SESSION['itemCount'] = 0;

$user = $_SESSION['usermail'];





if (isset($_REQUEST['addToCart']) && $_REQUEST['addToCart']=="ADD TO CART"){
  

if($user != "null"){
 
 $selectItemId = $_REQUEST['selectItemID'];
 $quantity = $_REQUEST['countOfItems'];


//get item details from datbase
$getselectedItemDetails = "SELECT * FROM items WHERE id = '".$selectItemId."' ";
$infoselectedItemDetails = $con->query($getselectedItemDetails);
$selectedItemDetails = $infoselectedItemDetails->fetch_array(); 
 
if(isset($_SESSION['cart'][$selectItemId]['OriginalCount'])){
    //update items database
    $newDbCount =   is_numeric($_SESSION['cart'][$selectItemId]['OriginalCount']) - $quantity;
    $updateStoreSql = "UPDATE items SET countOfItems = $newDbCount WHERE id = '".$selectItemId."' ";
    $con->query($updateStoreSql);

     //add to cart
     $addtoCartSql = "INSERT INTO cart(email,id,count) VALUES('".$user."','".$selectItemId."',$quantity)";
     $con->query($addtoCartSql);

}else{
    //update item database
    $_SESSION['cart'][$selectItemId]['OriginalCount'] = $selectedItemDetails['countOfItems'];
    $newCount =  (int)$selectedItemDetails['countOfItems'] - $quantity;
    $sqlForChangeItemCount = "UPDATE items SET countOfItems = $newCount WHERE id = '".$selectItemId."' ";
    $con->query($sqlForChangeItemCount);

     //add to cart
     $addtoCartSql = "INSERT INTO cart(email,id,count) VALUES('".$user."','".$selectItemId."',$quantity)";
     $con->query($addtoCartSql);
}

   
} else{
    header('Location: UserAccount/login.php');
  
}

    }
   




?>