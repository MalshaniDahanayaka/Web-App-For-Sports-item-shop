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
    

    <!-- image zoom javascript part -->
  <script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  img.parentElement.insertBefore(glass, img);
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    e.preventDefault();
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>




</head>
<body>
 
	<main class="page" >
  <?php include 'include/header.php' ?>
	 	<section class="sportItemDetails dark" style="margin-top: 200px;">
	 		<div class="container">
		        
		    <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-10">
	 						<div class="items">
				 				<div class="product">
				 					<div class="row">
					 					<div class="col-md-5  img-magnifier-container" style="margin-top: 20px;margin-left:5px;">
					 			  			  <img class="img-fluid mx-auto d-block image" src="https://observerbd.com/2021/09/16/observerbd.com_1631810420.jpg" id="myimage">
					 					</div>
					 					<div class="col-md-12 col-lg-5">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-12 product-name">
							 							<div class="product-name">
								 							<h2>ADIDAS FOOTBALL SOCCER BALL (EURO 2020)</h2>
								 							<div class="product-info">
									 				        	  Availability: In Stock
                                 <br> SKU: 14026-14
                                 <br> Training Balls made with Imported PVC, Machine Stitched, Soft Touch

                                 <br>  MADE-IN : CHINA
                                 <br> රු4,200.00
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
                                           
                                                      <select id="nameOfSortingMethod"  name="nameOfSortingMethod" style="height:25px;"> 
                                                              <option value="" >Choose Option</option>
                                                              <option value="registerDateASC">Register Date(ASC)</option>
                                                              <option value="registerDateDESC">Register Date(DESC)</option>
                                                              <option value="topCustomer">Top Customers</option>
                                                              <option value="lastShopingDate">Last Shoping Date</option>     
                                                      </select>
                                                     

                                              </div>
                                              
                                      </li>
                                              <input type="number" name="countOfItems" value="1" style="width: 40px;margin-right:5px;">
                                              <input type="submit" name="addToCart" value="ADD TO CART" style="background-color:rgb(228, 178, 42);width: 80%;font-weight:bold">
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
                                             <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                       </li>
                                       <li class="nav-item">
                                             <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                       </li>
                                       <li class="nav-item">
                                             <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                       </li>
                                  </ul>
                                  <div class="tab-content" id="myTabContent">
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">this is about this ball its is fucking orgasm and it contains many big bolls to fuck finally i want say  if you like to fuck balls bring this and make a hall and fuck this ball</div>
                                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">this is aobut this ball profile fucking orgasm guys iwant to say it is not to fucking orgasm bal because it some times takes big ball and lit of timess.</div>
                                          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">this row actually i does'nt have to say anything because it is not complete ting and i finally tried to fuck this all situatins and i am fucker of the <world></world></div>
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



<script>
magnify("myimage", 3);
</script>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
