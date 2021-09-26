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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="main.css">
    



</head>
<body>

        <?php include 'header.php';?>
		<?php include 'slideshow.php' ; ?>
		
	 	<section class="sportItemDetails dark">
	 		<div class="container">
     
		    <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-12">
	 						<div class="items" style="margin-top: 300px;">
				 				                  
                               <nav><h1 style="font-weight: bold;text-align:center;background-color:green;">Related Products</h1></nav>

                               <?php include 'shopping/discount/discounted.php' ?>


				 				</div>
				 				
				 			</div>
			 			</div>
			 			
		 			</div> 
		 		</div>
		</section>
	


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
