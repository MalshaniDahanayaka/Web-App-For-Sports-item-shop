<?php 
include 'include/Connection.php';

//get showing images and details orderd by top sales 
$GetItemsDetails = "SELECT items.id,items.productType,items.prize,items.brand, items.size,items.sportName,items.imagePath,SUM(sales.count) as no  FROM sales INNER JOIN items ON sales.id = items.id  group by items.id ORDER BY no DESC LIMIT 12";
$ItemsDetais = $con->query($GetItemsDetails);

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
</head>
<body>
 
	<main class="page">
  <?php include 'include/header.php' ?>
	 	<section class="sportItemDetails dark" style="margin-top: 180px;">
	 		<div class="container">
		        
		    <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-10">
	 						<div class="items">
				 				<div class="product">
				 					<div class="row">
					 					
					 				</div>

                  

                   <nav><h1 style="font-weight: bold;">Team sport</h1></nav>

                   <nav class="col-md-12 col-lg-10" style="background-color: #6ef054; text-align:center;margin-top:20px;margin-bottom:20px;height:80px;" class="col-md-12 col-lg-10">
                            <!-- select sorting methods and search bar -->
                            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" style="float: right;">
                                 <ul class="nav">
                                      <li class="nav-item">
                                                        
                                             
                                              <div class="dropdown" style="margin-top: 20px;">
                                                     <p style="float: left;margin-right:40px;">showing 1-16 from of 40 results</p> 
                                           
                                                      <select id="nameOfSortingMethod"  name="nameOfSortingMethod" style="height: 30px;"> 
                                                              <option value="" ></option>
                                                              <option value="registerDateASC">Register Date(ASC)</option>
                                                              <option value="registerDateDESC">Register Date(DESC)</option>
                                                              <option value="topCustomer">Top Customers</option>
                                                              <option value="lastShopingDate">Last Shoping Date</option>     
                                                      </select>
                                                      <input type="submit" name="submitSortingMethod" id="submitSortingMethod" value="Sort" >

                                              </div>
                                      </li>
                                 </ul>
                            </form>
                    </nav>



                   <!-- Showing related items  -->

                  <div class="tab-content" id="nav-tabContent">


                      <!-- suggestion items showing -->
                      <div class="tab-pane fade show active" id="nav-TopSales" role="tabpanel" aria-labelledby="nav-TopSales-tab">
            
                              <!-- images load upper limit-->
                              <div class="row text-center" id="items">
                                <?php 
   
                                     if($ItemsDetais->num_rows >0){
                                     while($row = $ItemsDetais->fetch_array()){ 
   
                                      //make correct image path
                                      $imagePath = $row['imagePath'] ?>

                                     <div class="col-md-3 col-6 py-2" id="itemDetails">
                                          <div class="card" id="border" >
                                               <img src="<?php echo $imagePath ;?>" alt="" class="img-fluid pb-1" id="itemImage" style=" height: 13rem;width: 15rem; border-radius: 20px;">
                                               <div class="figure-caption">
                                                    <h6 >product name : <?php echo $row['sportName']." ".$row['productType'] ;?></h6>
                                                    <h6 >Size : <?php echo $row['size'];?></h6>
                                                    <h6 >Brand : <?php echo $row['brand'];?></h6>
                                                    <h6 style="font-weight: bold;">Price Rs.<?php echo $row['prize'] ;?></h6>
                                                    <input type="submit" name="addToCart" value="ADD TO CART" style="background-color:rgb(228, 178, 42);width: 90%;font-weight:bold">
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

</body>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
