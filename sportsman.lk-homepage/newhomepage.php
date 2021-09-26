<?php 
include 'include/Connection.php';



?>

<!DOCTYPE html>
<html>
<head>
	<title>Sportsman.lk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="discount/discounted.css">
	<link rel="stylesheet" href="newheader/main.css">
    
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
        <?php include 'newheader/newheader.php';?>
		<?php include "slideshow.php"; ?>
	 	<section class="sportItemDetails dark" style="margin-top: 50px;">
	 			<div class="container">

				 <div class="center" style="margin-bottom: 50px;">
  									<h2>Sale</h2>
								</div>
     
		   			 <div class="content">
	 						<div class="row">
	 							<div class="col-md-12 col-lg-12">
	 								<div class="items">
				 						<?php include 'discount/discounted.php' ?>
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
        <img src="https://www.hoopsstation.com/image/hoopsstation/image/data/2020/KET%202020/SBjo48jz1602506811.jpg" class="img-fluid mb-4" alt="" style="height: auto; width: 17rem;border-radius: 50%;  border: 4px solid #965807;margin-left:20px;margin-top:20px;" >
        <img src="https://sonaesierracms-v2.cdnpservers.net/wp-content/uploads/sites/14/2019/04/e0e2edc1-1068-49a1-81ea-9eeb17845c68.adidas.jpg" class="img-fluid mb-4" alt="" style="height:auto; width: 17rem;border-radius: 50%;border: 4px solid #965807;margin-left:40px;margin-top:20px;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXdQaUfo8-Kplmi7KF_kYi8UtzKf3WY_Fk0CYhCcTd9xEb6qwCXJBsBISAM3-83otUaN0&usqp=CAU" class="img-fluid mb-4" alt="" style="height: auto; width: 17rem;border-radius: 50%;border: 4px solid #965807;margin-left:40px;margin-top:20px;">
        <img src="https://i.pinimg.com/originals/37/94/4a/37944a16706ed101106abe314cba5051.jpg" class="img-fluid mb-4" alt="" style="height:auto; width: 17rem;border-radius: 50%;border: 4px solid #965807;margin-left:40px;margin-top:20px;">
        <img src="https://i.pinimg.com/originals/37/94/4a/37944a16706ed101106abe314cba5051.jpg" class="img-fluid mb-4" alt="" style="height: auto; width: 17rem;border-radius: 50%;border: 4px solid #965807;margin-left:40px;margin-top:20px;">
        
         </div>
         <!--Grid column-->
    </div>
    <!--Grid row-->
</div>

		 		
	 			</div>
		</section>
	</main>

	<?php include 'footer.php' ?>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>