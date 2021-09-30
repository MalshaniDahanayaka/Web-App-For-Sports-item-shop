<?php 
include 'include/Connection.php';
include 'selectItem.php';
include 'include/cartReload.php';




?>

<!DOCTYPE html>
<html>
<head>
	<title>Sportsman.lk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="include/discount/discounted.css">
	<link rel="stylesheet" href="include/footer.css">
	<link rel="stylesheet" href="include/main.css">
    
	<style>
.center {
  text-align: center;
  
  background-color:rgb(84, 207, 59);
}

.btn:hover {
  background-color: blue;
}

.btn {
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: black;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

</style>


</head>
<body>
	<main class="page" >
        <?php include 'include/newheader.php';?>
		<?php include "include/slideshow.php"; ?>
	 	<section class="sportItemDetails dark" style="margin-top: 50px;">
	 			<div class="container">

				 <div class="center" style="margin-bottom: 50px;">
  									<h2>Sale</h2>
								</div>
     
		   			 <div class="content">
	 						<div class="row">
	 							<div class="col-md-12 col-lg-12">
	 								<div class="items">
				 						<?php include 'include/discount/discounted.php' ?>
				 					</div>
				 				
				 				</div>
			 				</div>
			 			
		 			</div> 

					 <div class="center" style="margin-bottom: 50px;">
  									<h2>Brands</h2>
								</div>

					<!-- Product Brands showing Bar -->
<div class="container my-4" style="margin-top: 100px;">
    <!--Grid row-->
    <div class="row text-center">
      <!--Grid column-->
      <div class="col-12 col-md-12" >
		<a href="itemAndCategory.php?categoryToshow=Puma"><img src="include/images/puma.jpg" class="img-fluid mb-4" alt="" style="height: auto; width: 12rem;border-radius: 50%;  border: 4px solid #965807;margin-left:20px;margin-top:20px;" ></a>
		<a href="itemAndCategory.php?categoryToshow=adidas"><img src="include/images/adidas.jpg" class="img-fluid mb-4" alt="" style="height: auto; width: 12rem;border-radius: 50%;  border: 4px solid #965807;margin-left:20px;margin-top:20px;" ></a>
		<a href="itemAndCategory.php?categoryToshow=nike"><img src="include/images/nike.jpg" class="img-fluid mb-4" alt="" style="height: auto; width: 12rem;border-radius: 50%;  border: 4px solid #965807;margin-left:20px;margin-top:20px;" ></a>
		<a href="itemAndCategory.php?categoryToshow=kappa"><img src="include/images/kappa.png" class="img-fluid mb-4" alt="" style="height: auto; width: 12rem;border-radius: 50%;  border: 4px solid #965807;margin-left:20px;margin-top:20px;" ></a>
        
         </div>
         <!--Grid column-->
    </div>
    <!--Grid row-->
</div>

		 		
	 			</div>
		</section>
	</main>

	<?php include 'include/footer.php' ?>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>