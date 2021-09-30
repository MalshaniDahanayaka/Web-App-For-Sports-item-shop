<?php

include '../include/Connection.php';

//get showing images and details orderd by top sales 
$GetItemsDetails = "SELECT items.id,items.productType,items.prize,items.brand, items.size,items.sportName,items.imagePath,SUM(sales.count) as no  FROM sales INNER JOIN items ON sales.id = items.id  group by items.id ORDER BY no DESC LIMIT 12";
$ItemsDetais = $con->query($GetItemsDetails);



//get showng images and details orderd by minimum sales
$GetMinSale = "SELECT items.id,items.productType,items.prize,items.brand, items.size,items.sportName,items.imagePath,SUM(sales.count) as no  FROM sales INNER JOIN items ON sales.id = items.id  group by items.id ORDER BY no ASC LIMIT 12";
$MinSale = $con->query($GetMinSale);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://kit.fontawesome.com/806d29f551.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="adminHome.css" />
    <title>Dashboard for sport shop</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
            <!-- include sidebar codes-->
            <?php include 'include/sideBar.php'?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
        <!-- include upper navigation bar codes-->
        <?php include 'include/headerNav.php'?>
           

<nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
             <a class="nav-item nav-link active" id="nav-TopSales-tab" data-toggle="tab" href="#nav-TopSales" role="tab" aria-controls="nav-TopSales" aria-selected="true">Top Sales</a>
             <a class="nav-item nav-link" id="nav-MinimumSales-tab" data-toggle="tab" href="#nav-MinimumSales" role="tab" aria-controls="nav-MinimumSales" aria-selected="false">Minimum Sales</a>
            
      </div>
</nav>



<div class="tab-content" id="nav-tabContent">


 <!-- Top Sales Showing -->
    <div class="tab-pane fade show active" id="nav-TopSales" role="tabpanel" aria-labelledby="nav-TopSales-tab">
            
    <!-- images load upper limit-->
            <div class="row text-center" id="items">
    <?php 
if($ItemsDetais->num_rows >0){
  while($row = $ItemsDetais->fetch_array()){ 
    
      //make correct image path
      $imagePath = "../".$row['imagePath'] ?>

                <div class="col-md-3 col-6 py-2" id="itemDetails">
                    <div class="card" id="border">
                        <img src="<?php echo $imagePath ;?>" alt="" class="img-fluid pb-1" id="itemImage">
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








<!-- Minimum Sales Showing -->
<div class="tab-pane fade" id="nav-MinimumSales" role="tabpanel" aria-labelledby="nav-MinimumSales-tab">
        <!-- images load upper limit-->
        <div class="row text-center" id="items">
<?php 
if($MinSale->num_rows >0){
  while($row = $MinSale->fetch_array()){ 
      //make correct image path
      $imagePath = "../".$row['imagePath'] ?>

                <div class="col-md-3 col-6 py-2" id="itemDetails">
                    <div class="card" id="border">
                        <img src="<?php echo $imagePath ;?>" alt="" class="img-fluid pb-1" id="itemImage">
                        <div class="figure-caption">
                            <h6>product name : <?php echo $row['sportName']." ".$row['productType'] ;?></h6>
                            <h6>Price Rs.<?php echo $row['prize'] ;?></h6>
                            <h6>s</h6>
                            
                        </div>
                    </div>
                </div>

<?php }}?>    
             </div>
<!-- images load down limit-->
          </div>

             <!-- include the footer -->
              <?php include 'include/footer.php'; ?>
          
       </div> 
           
    </div>
    
 
 </div>
   


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>