<?php



//get showing images and details orderd by discounted items 
$GetItemsDetails = "SELECT 
d.id, 
d.discount,
i.productType,
i.countOfItems,  
i.prize, 
i.sportName,
i.imagePath
FROM
items i
INNER JOIN discounteditems d ON i.id = d.id";
$ItemsDetails = $con->query($GetItemsDetails);



?>




<div class="tab-content" id="nav-tabContent">


 <!-- Top Sales Showing -->
 <div class="tab-pane fade show active" id="nav-TopSales" role="tabpanel" aria-labelledby="nav-TopSales-tab">
        
 <!-- images load upper limit-->
        <div class="row text-center" id="items">
       
    
<?php 

if($ItemsDetails->num_rows >0){
  while($row = $ItemsDetails->fetch_array()){ 
      //make correct image path
    
      $imagePath = $row['imagePath']  ?>

                <div class="col-md-3 col-6 py-2" id="itemDetails">
                    <div class="card" id="border">
                        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" > 
                      
                            <a href="itemDetailsAndBuy.php?selectItemId=<?php echo $row['id']; ?>"><img src="<?php echo $imagePath ?>" class="img-fluid pb-1" style="height:15rem;width: 25rem; border-radius:20px;"/></a>
                        
                       
                            <div class="figure-caption" style="color:black">
                                      <h6><?php echo $row['sportName']." ".$row['productType'] ;?></h6>
                                      <h6>Now Rs.<?php echo ($row['prize'] );?>.00</h6>
                                      <h6><s>Was Rs.<?php echo ($row['prize']+($row['discount']*$row['prize']) );?>.00</s></h6>
                                      <h6><?php echo ($row['discount']*100) ;?>% Discount</h6>
                               
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

                           
                            
                            
                            </div>
                        </form>
                    </div>
                </div>
            
<?php }}?>    
           </div>
<!-- images load down limit-->
         </div>
  </div>
 



