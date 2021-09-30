<?php
session_start();
include 'include/Connection.php';



//befor logout clear cart database and data send to item database
$userEmail = $_SESSION['usermail'] ;


$sqlQuaryForUpdateItemTable = "SELECT cart.id,cart.count FROM cart WHERE email='".$userEmail."' ";
$resultSql = $con->query($sqlQuaryForUpdateItemTable);

//update items table
while($detailsForItemsTable = $resultSql->fetch_array()){

   //find now data base have item count
		$count1 = "SELECT countOfItems FROM items WHERE id = '".$detailsForItemsTable['id']."' ";
		$countresult = $con->query($count1);
		$nowCount = $countresult->fetch_array();
		$updateCount = $nowCount['countOfItems'] + $detailsForItemsTable['count'];

        
		//item adding to item tabel
		$updateStoreSql = "UPDATE items SET countOfItems = $updateCount WHERE id = '".$detailsForItemsTable['id']."' ";
		$con->query($updateStoreSql);

}


//clear cart table
$userEmail = $_SESSION['usermail'] ;
$deleteFromCartSql = "DELETE FROM cart WHERE email= '".$userEmail."' ";
$con->query($deleteFromCartSql);




session_destroy();



header("Location: UserAccount/login.php");

?>