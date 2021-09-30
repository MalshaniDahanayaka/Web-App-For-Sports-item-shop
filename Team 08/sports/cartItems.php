	<?php
	include 'include/Connection.php';
	session_start();
	include 'include/cartReload.php';


	//remove items
	if (isset($_REQUEST['action1']) && $_REQUEST['action1']=="Remove item"){
		$user = $_SESSION['usermail'] ;
		$deleteItem = $_REQUEST['removeItem'];

		//find delelte item count
		$count = "SELECT * FROM cart WHERE id = '".$deleteItem."' AND email= '".$user."' ";
		$getcount = $con->query($count);
		$deletedCount = $getcount->fetch_array();

		//find now data base have item count
		$count1 = "SELECT countOfItems FROM items WHERE id = '".$deleteItem."' ";
		$countresult = $con->query($count1);
		$nowCount = $countresult->fetch_array();
		$updateCount = $nowCount['countOfItems'] + $deletedCount['count'];


		//item delete from cart page
		$sqldelete = "DELETE FROM cart WHERE  id = '".$deleteItem."' AND email= '".$user."' ";
		$con->query($sqldelete);


		//item adding to database
		$updateStoreSql = "UPDATE items SET countOfItems = $updateCount WHERE id = '".$deleteItem."' ";
		$con->query($updateStoreSql);


		unset($_SESSION['cart'][$deleteItem]);
		header('Location: cartItems.php');

	}



//change item count and rearrange the page
if (isset($_REQUEST['updateCart'])){
	$user = $_SESSION['usermail'] ;
    $itemId = $_REQUEST['selectItemID'];
    $newCount =  $_REQUEST['countOfItems'];
	//update cart
	$UpdateCartSql = "UPDATE cart SET count = $newCount WHERE id = '".$itemId."' AND email= '".$user."' ";
	$con->query($UpdateCartSql);

	//update item database
	$newDbCount =   $_SESSION['cart'][$itemId]['OriginalCount'] - $newCount;
    $updateStoreSql = "UPDATE items SET countOfItems = $newDbCount WHERE id = '".$itemId."' ";
    $con->query($updateStoreSql);

    header('Location: cartItems.php');
	       
	
	  }


$unsetsql = "SELECT * FROM cart WHERE email= '".$_SESSION['usermail']."'";
$resToUnset  = $con->query($unsetsql);
if($resToUnset->num_rows == 0){unset($_SESSION['cart']);} 

 
	
 


?>

<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="itemDetailsAndBuy.css">
    <link rel="stylesheet" href="include/discount/discounted.css">
	<link rel="stylesheet" href="include/footer.css">
	<link rel="stylesheet" href="include/main.css">
</head>
<body>
	<main class="page">
    <?php include 'include/newheader.php';?>

	 	<section class="sportItemDetails dark" style="margin-top: 200px;">
	 		<div class="container">
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">



							 <?php
                               if(isset($_SESSION['cart'])){
                               $total_price = 0;
							   //get cart details
							   $getCartDetails = "SELECT cart.email,cart.id,cart.count,items.sportName,items.productType,items.brand,items.size,items.prize,items.imagePath FROM cart INNER JOIN items ON cart.id = items.id ";
                               $CartItems = $con->query($getCartDetails);
                              
                             

							 $itemsarray = "";
							 while ($product = $CartItems->fetch_array()){
								 
								 $productName = $product['sportName']." ".$product['productType']." ,";
								 $itemsarray .= $productName;
								;
                             ?>

							    
				 				<div class="product" style="margin-left:10px;">
				 					<div class="row">
					 					<div class="col-md-2" style="margin-top: 50px;">
					 						<img class="img-fluid mx-auto d-block image" src="<?php echo $product['imagePath']; ?>">
					 					</div>
					 					<div class="col-md-10">
					 						<div class="info">
											 <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
						 						<div class="row">
							 						<div class="col-md-4 product-name" style="margin-top: 20px;">
							 							<div class="product-name">
								 							<a href="#">Item Details</a>
								 							<div class="product-info">
                                                                

									 							<div>Product name: <span class="name" style="color:green;"><?php echo $product['sportName']." ".$product['productType']; ?></span></div>
									 							<div>Brand:<span class="size" style="color:green"><?php echo $product['brand']; ?></span></div>
									 							<div>size: <span class="size" style="color:green"><?php echo $product['size']; ?></span></div>
																<input type="text" value="<?php echo $product['id']; ?>" name="removeItem" hidden >
																<input type="submit" value="Remove item" id="removeItem" name="action1">
									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-2 quantity" style="margin-top: 20px;">
							 							<label for="quantity">Quantity:</label>

                                                              <input type="text" name="selectItemID" value="<?php echo $product['id']; ?>" hidden>

                                                              <?php $maxcount = $_SESSION['cart'][$product['id']]['OriginalCount'];  ?>
				                                              <input type="number" min="1" max="<?php echo $maxcount ?>" name="countOfItems" value="<?php echo $product['count']; ?>" style="width: 42px;margin-right:5px;">
                                                              

                                                    </div>
							 						<div class="col-md-2 price" style="margin-top: 0px;">
                                                         <label for="price">Price</label>
							 							<span><?php echo $product['prize']; ?></span>
							 						</div>
                                                     <div class="col-md-2 price" style="margin-top: 0px;">
                                                        <label for="Total">Total</label>
							 							<span><?php echo "$".$product['prize']*$product['count']; ?></span>
							 						</div>
													
                                                     <div class="col-md-2 " style="margin-top: 0px;">
													 <input type="submit" name="updateCart" value="UPDATE" style="background-color:rgb(228, 178, 42);width: 80%;font-weight:bold;margin-top:20px;">
							 						</div>
							 					</div>
											  </form>
							 				</div>
					 					</div>
					 				</div>
				 				</div>
								 <?php
                                      $total_price += ($product['prize']*$product['count']);
                                  }
                                ?>

                            </div>
							
						</div>
			 			
						
						
						
						
						
						 <div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Final Details</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price"><?php echo $total_price; ?></span></div>
								 <?php $shiping=300;$discount = 0;  ?>
			 					<div class="summary-item"><span class="text">Discount</span><span class="price"><?php echo $discount; ?></span></div>
								<?php $shiping=300;  ?>
			 					<div class="summary-item"><span class="text">Shipping</span><span class="price"><?php echo $shiping; ?></span></div>
			 					<div class="summary-item"><span class="text">Total</span><span class="price"><?php echo ($total_price+$discount+$shiping); ?></span></div>
								
								<!-- Set values for cart -->
								<?php
								
								$getuserId = "SELECT id FROM users WHERE email= '".$_SESSION['usermail']."' ";
								$idvalue = $con->query($getuserId);
								$ordernum = $idvalue->fetch_array(); 
								$_SESSION['order_id'] = $ordernum['id'];
								$_SESSION['itemsList']  = $itemsarray;
								$_SESSION['amount'] = $total_price+$discount+$shiping;

								
								
								?>
			 					
								 <a href="payment.php">
                                          <button type="button"  class="btn btn-primary btn-lg btn-block" >
										  Checkout</button>
                                 </a>

								 <?php
                                   }else{
                                     	echo "<h3>Your cart is empty!</h3>";
                              	}
                                ?>
                                 <h3 >Categories</h3>
								 <ul>
                                     <li> <a href="itemAndCategory.php?categoryToshow=Vball">Volley Ball</a></li>
                                     <li> <a href="itemAndCategory.php?categoryToshow=Cricket">Cricket</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=Basket Ball">Basket Ball</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=NetBall">Net Ball</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=FootBall">Foot Ball</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=Batminton">Badminton</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=Carrom">Carrom</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=Chess">Chess</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=Scrabble">Scrabble</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=Dart Game">Dart Game</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=Yoga">Yoga</a></li>
                                     <li> <a href="itemAndCategory.php?categoryToshow=Karate">Karate</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=Swiming">Swimming</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=Boxing">Boxing Items</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=Athlatic">Athlatic</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=Golf">Golf</a></li>
                                     <li><a href="itemAndCategory.php?categoryToshow=archery">archery</a></li>
                                    </ul>
				 			
				 			</div>
				 			
			 	 </div>
			 			</div>
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
    <?php include 'include/footer.php' ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
