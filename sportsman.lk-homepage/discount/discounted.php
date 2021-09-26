<?php

include 'include/Connection.php';

//get showing images and details orderd by discounted items 
$GetItemsDetails = "SELECT 
d.id, 
d.discount,
i.productType, 
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
    
      $imagePath = "../".$row['imagePath']  ?>

                <div class="col-md-3 col-6 py-2" id="itemDetails">
                    <div class="card" id="border">
                        <img src="<?php echo $imagePath ;?>" alt="" class="img-fluid pb-1" id="itemImage" style="height:15rem;width: 25rem; border-radius:20px;">
                        <div class="figure-caption">
                            <h6><?php echo $row['sportName']." ".$row['productType'] ;?></h6>
                            <h6>Now Rs.<?php echo ($row['prize'] );?>.00</h6>
                            <h6><s>Was Rs.<?php echo ($row['prize']+($row['discount']*$row['prize']) );?>.00</s></h6>
                            <h6><?php echo ($row['discount']*100) ;?>% Discount</h6>
                            
                            
                            
                        </div>
                    </div>
                </div>
            
<?php }}?>    
           </div>
<!-- images load down limit-->
         </div>
  </div>
 



