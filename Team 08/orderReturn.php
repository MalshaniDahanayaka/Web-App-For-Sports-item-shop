<?php 
include 'include/Connection.php';
session_start();

//delete items from cart table and move to sales table
$userEmail = $_SESSION['usermail'] ;

$sqlQuaryForUpdateSalesTable = "SELECT cart.id,cart.count,items.prize FROM cart INNER JOIN items ON cart.id=items.id WHERE email='".$userEmail."' ";
$resultSql = $con->query($sqlQuaryForUpdateSalesTable);

//update sales table
while($detailsForsales = $resultSql->fetch_array()){
    
    $total_price = ($detailsForsales['count']*$detailsForsales['prize']);
    $idTomoveSales = $detailsForsales['id'];
    $countTomoveSales = $detailsForsales['count'];

    $sendToSalesSql = "INSERT INTO sales (id,count,price,email) VALUES('".$idTomoveSales."',$countTomoveSales,$total_price,'".$userEmail."')";
    $con->query($sendToSalesSql);
}

//delete items from cart
$deleteFromCartSql = "DELETE FROM cart WHERE email= '".$userEmail."' ";
$con->query($deleteFromCartSql);

$unsetsql = "SELECT * FROM cart WHERE email= '".$_SESSION['usermail']."'";
$resToUnset  = $con->query($unsetsql);
if($resToUnset->num_rows == 0){unset($_SESSION['cart']);} 




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="include/footer.css">
    <title>ORDER RETURN</title>
</head>
<body>  

      <div class="content" style="text-align: center;">
          <nav style="background-color: greenyellow;height:80px;font-size:xx-large;">
             PAYMENT SUCCESSFUL
          </nav>
          <div class="container" >
              <img src="include/payment" alt="" style="height: 300px;">
            
          </div>
          <div style="margin-top: 100px;">
              <h1>Your Payment Was Successful</h1>
              <p>Thank you for your payment. We will <br>be in contact with more details shortly.</p>
          </div>
          <div >
          <a href="newhomepage.php">
                 <button style="margin-top: 10px;margin-bottom: 30px;background-color:blue;font-weight:bolder;">BACK TO HOME</button>
          </a>
          </div>

      </div>
      <?php include 'include/footer.php'; ?>
</body>
</html>