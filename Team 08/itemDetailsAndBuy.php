<?php 
include 'include/Connection.php';
include 'selectItem.php';
include 'include/cartReload.php';





//get details about selected Item............
$selectItemId = $_REQUEST['selectItemId'] ;



//get item details from datbase
$getselectedItemDetails = "SELECT * FROM items WHERE id = '".$selectItemId."' ";
$infoselectedItemDetails = $con->query($getselectedItemDetails);

//get item name
$selectedItemDetails = $infoselectedItemDetails->fetch_array(); 
$selectedItemName = $selectedItemDetails['brand']." ".$selectedItemDetails['sportName']." ".$selectedItemDetails['productType'];

//check available or not
if($selectedItemDetails['countOfItems'] > 0){
  $availability = "In Stock"; }else{ $availability = "Out Of Stock";}
//get brand name
$selectItemBrand = $selectedItemDetails['brand'];
//get item price
$selectItemPrice = $selectedItemDetails['prize'];
//get item description
$selectItemDescription = $selectedItemDetails['description'];
//get item image path
$selectItemImage = $selectedItemDetails['imagePath'];

//get selected options
$getselectedItemOptions = "SELECT size FROM items WHERE sportName='".$selectedItemDetails['sportName']."' AND brand='".$selectedItemDetails['brand']."' AND productType= '".$selectedItemDetails['productType']."'";
$infoselectedItemOptions = $con->query($getselectedItemOptions);





//get related items to selected item 
$GetItemsDetails = "SELECT * FROM items WHERE sportName = '".$selectedItemDetails['sportName']."' ";
$ItemsDetails = $con->query($GetItemsDetails);

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
    
    
    <!-- image zoom javascript part -->
  <script src="js/imagezoom.js"></script>

</head>
<body>
 
	<main class="page" >
  <?php include 'include/newheader.php';?>
	 	<section class="sportItemDetails dark" style="margin-top: 200px;">
	 		<div class="container">
		        
		    <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-10">
	 						<div class="items">
				 				<div class="product">
				 					<div class="row">
					 					<div class="col-md-5  img-magnifier-container" style="margin-top: 20px;margin-left:5px;">
					 			  			  <img class="img-fluid mx-auto d-block image" src="<?php echo $selectItemImage; ?>" id="myimage">
					 					</div>
					 					<div class="col-md-12 col-lg-5">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-12 product-name">
							 							<div class="product-name">
								 							<h2><?php echo $selectedItemName; ?></h2>
								 							<div class="product-info">
									 				        	  Availability:    <?php echo $availability; ?>

                                                                                            <br> brand: <?php echo $selectItemBrand; ?>
                                                                                             <br> price: රු <?php echo $selectItemPrice; ?>.00
                                                                                              <br><br>About: <?php echo $selectItemDescription; ?>
                                     
									 						</div>
									 					</div>
							 						</div>


                      <!-- select option and add to cart bar -->
                      <nav class="col-md-12 col-lg-10">
                            <!-- select sorting methods and search bar -->
                            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" style="float: right;">
                                 <ul class="nav">
                                      <li class="nav-item" style="text-align:center;margin-top:10px;margin-bottom:20px;height:40px;background-color: #d0d2d4;">
                                                        
                                             
                                              <div class="dropdown" style="margin-top: 7px; ">
                                                     <p style="float: left;margin-right:50px;">Select</p> 
                                           
                                                      <select id="nameOfSortingMethod"  name="nameOfSortingMethod" style="height:25px;margin-left: 10px;"> 
                                                              <option value="" >Choose Option</option>
                                                        <?php 
                                                               if($infoselectedItemOptions->num_rows >0){
                                                                while($row = $infoselectedItemOptions->fetch_array()){   ?>
                                                              <option value="<?php echo $row['size'] ?>" > <?php echo $row['size'] ?> </option>
                                                             
                                                              <?php }}?>

                                                      </select>
                                                     

                                              </div>
                                              
                                      </li>   
                                              <input type="text" name="selectItemID" value="<?php echo $selectItemId; ?>" hidden>
                                        

                                                  <?php   $sqlfindcount = "SELECT count from cart WHERE email ='".$_SESSION['usermail']."' AND id='".$selectItemId."' " ;
                                                    $getdetails = $con->query($sqlfindcount);
                                                    $itemscountForItem = $getdetails->fetch_array();   ?>                                           


                                              <!-- add to cart button  -->
                                              <?php if(isset($_SESSION['cart'][$selectItemId]['OriginalCount'])){
                                                          $maxcount = $_SESSION['cart'][$selectItemId]['OriginalCount'];
                                                     ?>     <input type="number" min="1" max="<?php echo $maxcount ?>" name="countOfItems" value="<?php echo $itemscountForItem['count'] ?>" style="width: 42px;margin-right:5px;">
                                              
                                                          <?php if($maxcount+1> 0){     ?>
                                                                 <input type="submit" name="addToCart" value="ADD TO CART" style="background-color:rgb(228, 178, 42);width: 90%;font-weight:bold">
                                                                <?php } else{ ?>
                                                                  <input type="text"   value="OUT OF STOCK" style="background-color:red;width: 90%;font-weight:bold;color:white;">
                                                                  <?php }  
                                                        
                                                        }
                                                    else{ 
                                                           $maxcount= $selectedItemDetails['countOfItems'] ; ?>
                                                                <input type="number" min="1" max="<?php echo $maxcount ?>" name="countOfItems" value="<?php echo $itemscountForItem['count'] ?>" style="width: 42px;margin-right:5px;">
                                              
                                                          <?php if( $maxcount > 0){     ?>
                                                               <input type="submit" name="addToCart" value="ADD TO CART" style="background-color:rgb(228, 178, 42);width: 90%;font-weight:bold">
                                                          <?php } else{ ?>
                                                                <input type="text"   value="OUT OF STOCK" style="background-color:red;width: 90%;font-weight:bold;color:white;">
                                                          <?php } 
                                                           
                                                          
                                                          
                                                          } 
                                              ?>
                                              
                                             
                                   </ul>
                            </form>
                    </nav>



							 						
							 					</div>
							 				</div>
					 					</div>
					 				</div>

                  
                  <div class="row" style="margin-top: 50px;margin-bottom:50px;margin-left:20px;">
	                         <div class="col-md-12 col-lg-8">
                                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                                       <li class="nav-item">
                                             <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About Item</a>
                                       </li>
                                       <li class="nav-item">
                                             <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Details</a>
                                       </li>
                                       <li class="nav-item">
                                             <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">special note</a>
                                       </li>
                                  </ul>
                                  <div class="tab-content" id="myTabContent">
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><?php echo $selectItemDescription; ?></div>
                                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
                                                                      Availability:    <?php echo $availability; ?>
                                                                      <br> brand: <?php echo $selectItemBrand; ?>
                                                                      <br> price: රු <?php echo $selectItemPrice; ?>.00
                                                                      <br><br>About: <?php echo $selectItemDescription; ?></div>
                                          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><?php echo $selectItemDescription; ?></div>
                                  </div>

                           </div>
                   </div>

                   <nav><h1 style="font-weight: bold;">Related Products</h1></nav>



                   <!-- Showing related items  -->

                  <div class="tab-content" id="nav-tabContent">


                      <!-- suggestion items showing -->
                      <div class="tab-pane fade show active" id="nav-TopSales" role="tabpanel" aria-labelledby="nav-TopSales-tab">
            
                              <!-- images load upper limit-->
                              <div class="row text-center" id="items">
                                <?php 
   
                                     if($ItemsDetails->num_rows >0){
                                     while($row = $ItemsDetails->fetch_array()){ 
   
                                      //make correct image path
                                      $imagePath = $row['imagePath'] ?>
                                  
                                     <div class="col-md-3 col-6 py-2" id="itemDetails">
                                          <div class="card" id="border" >
                                               
                                               <a href="itemDetailsAndBuy.php?selectItemId=<?php echo $row['id']; ?>"><img src="<?php echo $imagePath ;?>" alt="" class="img-fluid pb-1" id="itemImage" style=" height: 13rem;width: 15rem; border-radius: 20px;"></a>
                                               <div class="figure-caption">
                                                    <h6 >product name : <?php echo $row['sportName']." ".$row['productType'] ;?></h6>
                                                
                                                    <h6 >Brand : <?php echo $row['brand'];?></h6>
                                                    <h6 style="font-weight: bold;">Price Rs.<?php echo $row['prize'] ;?></h6>
                                               <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" >    
                                                    <input type="text" name="selectItemID" value="<?php echo $row['id']; ?>" hidden>
                                                    <input type="number" name="countOfItems" value="1" hidden>



                                              <!-- add to cart button  -->
                                              <?php if(isset($_SESSION['cart'][$row['id']]['OriginalCount'])){
                                                          $maxcount = $_SESSION['cart'][$row['id']]['OriginalCount'];
                                                          if($maxcount> 0){     ?>
                                                                <input type="text" name="addToCart" value="ALREADY ADDED" style="background-color:green;width: 90%;font-weight:bold">
                                                                <?php } else{ ?>
                                                                  <input type="text"   value="OUT OF STOCK" style="background-color:red;width: 90%;font-weight:bold;color:white;">
                                                                  <?php }  
                                                        
                                                        }
                                                    else{ 
                                                           $maxcount= $row['countOfItems'] ; 
                                                            if( $maxcount > 0){     ?>
                                                               <input type="submit" name="addToCart" value="ADD TO CART" style="background-color:rgb(228, 178, 42);width: 90%;font-weight:bold">
                                                          <?php } else{ ?>
                                                                <input type="text"   value="OUT OF STOCK" style="background-color:red;width: 90%;font-weight:bold;color:white;">
                                                          <?php } 
                                                           
                                                          
                                                          
                                                          } 
                                              ?>

                                              
                                               </form>
                                                </div>
                                           </div>
                                     </div>
                                  
            
                                <?php }}?>    
                              </div>
                   <!-- images load down limit-->
                     </div>

                  </div>

				 			</div>
				 				
				 		</div>
			 	</div>
         
			 	<?php include 'include/rightsideCategoriesbar.php' ?>
		 	</div> 
	 </div>
</div>
</section>
</main>



<script>
magnify("myimage", 3);
</script>

<?php include 'include/footer.php' ?>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
