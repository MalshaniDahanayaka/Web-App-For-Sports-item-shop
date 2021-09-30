<?php 
include 'include/Connection.php';
include 'selectItem.php';
include 'include/cartReload.php';

$NameOfCategory = $_REQUEST['categoryToshow'];
//get showing images and details orderd by top sales 
if(($NameOfCategory=="Team Sports") || ($NameOfCategory=="Running and Fitness") || ($NameOfCategory=="Home Play") || ($NameOfCategory=="Other")){
     $GetItemsDetails = "SELECT * FROM items WHERE category = '".$NameOfCategory."' ";
     $ItemsDetais = $con->query($GetItemsDetails);
}
elseif(($NameOfCategory=="Shoes") || ($NameOfCategory=="Jersey") || ($NameOfCategory=="Shorts")){
     $GetItemsDetails = "SELECT * FROM items WHERE productType = '".$NameOfCategory."' ";
     $ItemsDetais = $con->query($GetItemsDetails);
}
elseif(($NameOfCategory=="nike") || ($NameOfCategory=="Puma") || ($NameOfCategory=="adidas") || ($NameOfCategory=="kappa")){
     $GetItemsDetails = "SELECT * FROM items WHERE brand = '".$NameOfCategory."' ";
     $ItemsDetais = $con->query($GetItemsDetails);
}else{
    
     $GetItemsDetails = "SELECT * FROM items WHERE sportName = '".$NameOfCategory."' ";
     $ItemsDetais = $con->query($GetItemsDetails);

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>selected Category</title>
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
	 	<section class="sportItemDetails dark" style="margin-top: 180px;">
	 		<div class="container">
		        
		    <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-10">
	 						<div class="items">
				 				<div class="product">
				 					<div class="row">
					 					
					 				</div>

                  

                   <nav><h1 style="font-weight: bold;"><?php echo $NameOfCategory; ?></h1></nav>

                   <nav class="col-md-12 col-lg-12" style="background-color: #6ef054; text-align:center;margin-top:20px;margin-bottom:20px;height:80px;" class="col-md-12 col-lg-10">
                           

                                 <ul class="nav">
                                      <li class="nav-item">
                                             <p style="float: left;margin-right:40px;margin-top:10px;"><?php echo $NameOfCategory ?> items you can buy our shop and also we provide dilevery services.</p>   
                                      </li>
                                 </ul>
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



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php include 'include/footer.php' ?>
</body>
</html>
