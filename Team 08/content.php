

<nav><h1 style="font-weight: bold;">Related Products</h1></nav>



<!-- Showing related items  -->

<div class="tab-content" id="nav-tabContent">


 <!-- Top Sales Showing -->
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
                        <img src="<?php echo $imagePath ;?>" alt="" class="img-fluid pb-1" id="itemImage" style=" height: 10rem;width: 15rem; border-radius: 20px;">
                        <div class="figure-caption">
                            <h6 >product name : <?php echo $row['sportName']." ".$row['productType'] ;?></h6>
                            <h6 style="font-weight: bold;">Price Rs.<?php echo $row['prize'] ;?></h6>
                           
                            
                        </div>
                    </div>
                </div>
            
<?php }}?>    
           </div>
<!-- images load down limit-->
        </div>

</div>