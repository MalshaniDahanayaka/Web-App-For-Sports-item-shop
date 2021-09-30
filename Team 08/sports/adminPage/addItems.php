<?php
    
    include '../include/Connection.php';


     if(isset($_REQUEST['upload'])){ 

        //define the variable to store form values(For elements can be null)
        if($_REQUEST['sizeOfProduct']){
            $sizeOfProduct = $_REQUEST['sizeOfProduct'];
        }else{
            $sizeOfProduct = "-";
        }
      
        

      //identify the values passed by form
        $nameOfSport = $_REQUEST['nameOfSport'];
        $nameOfItem = $_REQUEST['nameOfItem'];
        $priceOfProduct = $_REQUEST['priceOfProduct'];
        $countOfProduct = $_REQUEST['CountOfProduct'];
        $brandOfProduct = $_REQUEST['brandOfProduct'];
        $category = $_REQUEST['category'];
        $description = $_REQUEST['descriptionOfProduct'];
        $id = substr($nameOfSport, 0, 3).substr($nameOfItem,0,3).substr($brandOfProduct,0,3).substr($sizeOfProduct,0,3);

       

        //make file location in server
        $upload_folder = "img/";
        $file_location = $upload_folder . basename($_FILES["uploadfile"]["name"]);

        echo $id." ".$nameOfSport." ".$nameOfItem." ".$brandOfProduct." ".$sizeOfProduct." ".$priceOfProduct." ".$category." ".$countOfProduct." ".$file_location;
        $newpath = $upload_folder."".$id."".".jpg";

        //Update the database                                                                                                                                        
        $InsertNewProductDetails = "INSERT INTO items (id,sportName,productType ,brand,size,prize,category,countOfItems,imagePath,description) VALUES ('".$id."','".$nameOfSport."','".$nameOfItem."','".$brandOfProduct."','".$sizeOfProduct."',$priceOfProduct,'".$category."',$countOfProduct,'".$newpath."','".$description."')";
        $con->query($InsertNewProductDetails);
        move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file_location);
        rename("$file_location","$newpath");


        

       
 }
 
 




?>



  
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title> 
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>  


<div id="content" style="text-align: center;">
  
  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<nav style="color: greenyellow; background-color:blue">

<h1>Item Data</h1>
</nav>
   
  <!--Name of product field in admin page -->
  <div class="mb-3">
           
           <div class="dropdown">
                  <label for="nameOfSport" class="form-label">Name of Sport</label>
                  
                  <select id="nameOfSport"  name="nameOfSport">  
                         <option value="" ></option>
                         <option value="Cricket">Cricket</option>
                         <option value="Athlatic">Athlatic</option>
                         <option value="Vball">Volley ball</option>
                         <option value="Bowing">Bowing</option>
                         <option value="Basket Ball">Basket Ball</option>
                         <option value="Batminton">Batminton</option> 
                         <option value="FootBall">Foot Ball</option>  
                         <option value="NetBall">Netball</option> 
                         <option value="Rugby">Rugby</option> 
                         <option value="Water Polo">water polo</option> 
                         <option value="HandBall">Hand Ball</option> 
                         <option value="Swiming">swiming</option> 
                         <option value="Gym items">Gym items</option> 
                         <option value="Boxing">boxing</option> 
                         <option value="Karate">karate</option> 
                         <option value="Chess">chess</option> 
                         <option value="Carrom">carrom</option> 
                         <option value="Dart Game">Dart Game</option> 
                         <option value="Yoga">Yoga</option> 
                         <option value="Scrabble">Scrabble</option> 
                         <option value="Board Game">Board Game</option>
                         <option value="archery">archery</option>
                         <option value="Golf">Golf</option>
                         <option value="Board Game">Board Game</option>   
                 </select>

            
          </div>
  </div>



  <!--Name Of Product Type -->
  <div class="mb-3">
           
           <div class="dropdown">
                  <label for="nameOfItem" class="form-label">Product Type</label>
                  <select id="nameOfItem"  name="nameOfItem">  
                         <option value="" ></option>
                         <option value="Ball">Ball</option>
                         <option value="Bat">Bat</option>
                         <option value="Shoes">Shoes</option>
                         <option value="Jersey">jersey</option>
                         <option value="Gloves" >gloves</option>
                         <option value="Shin Guards" >shin gaurds</option>
                         <option value="Shorts" >shorts</option>
                         <option value="Helmet" >helmet</option>
                         <option value="Batting Gloves" >batting gloves</option>
                         <option value="Thigh Pads" >thigh pads</option>
                         <option value="Grips" >grips</option>
                         <option value="Chest Guard" >chest guard</option>
                         <option value="Keeping Gloves" >keeping gloves</option>
                         <option value="Net" >net</option>
                         <option value="Racket" >racket</option>
                         <option value="Shuttlecock" >shuttlecock</option>
                         <option value="Knee Gaurd" >knee gaurds</option>
                         <option value="Chess Board" >chess board</option>
                         <option value="Carrom Board" >carrom board</option>
                         <option value="Dart Game Board" >dart game board</option>
                         <option value="Yoga Mat" >yoga mat</option>
                         <option value="Scrabble Board" >scrabble board</option>
                         <option value="Weight Plate" >Weight plate</option> 
                         <option value="Bow and Arrows" >Bow and Arrows</option>  
                 </select>

          </div>
  </div>





  <!-- Brand of product  -->
  <div class="mb-3">
           
           <div class="dropdown">
                  <label for="brandOfProduct" class="form-label">Brand of Product</label>
                  <select id="brandOfProduct"  name="brandOfProduct">  
                         <option value="" ></option>
                         <option value="nike">nike</option>
                         <option value="Mikasa">Mikasa</option>
                         <option value="Puma">Puma</option>
                         <option value="adidas">adidas</option> 
                         <option value="kappa" >kappa</option>
                         <option value="Reebok" >reebok</option>
                         <option value="Molten" >Molten</option>
                         <option value="kookaburra" >kookaburra</option>
                         <option value="vilson" >vilson</option>
                         <option value="Franklin" >Franklin</option>        
                         <option value="Masuri" >Masuri</option>
                         <option value="Other">Other</option>     
                 </select>

          </div>
  </div>






  <!--Size of product  -->
  <div class="mb-3">
         
          <div class="dropdown">
                  <label for="sizeOfProduct" class="form-label">Size Of Item</label>
                  
                  <select id="sizeOfProduct"  name="sizeOfProduct">  
                         <option value="" ></option>
                         <option value="small">small</option>
                         <option value="medium">medium</option>
                         <option value="large">large</option>
                         <option value="extra large">extra large</option>
                         <option value="4" >4</option>
                         <option value="5" >5</option>
                         <option value="6" >6</option>
                         <option value="7" >7</option>
                         <option value="8" >8</option>
                         <option value="9" >9</option>
                         <option value="10" >10</option>
                         <option value="5kg" >5kg</option>
                         <option value="10kg" >10kg</option>
                         <option value="20kg" >20kg</option>     
                 </select>

            
          </div>
          
  </div>



<!-- Price of one item-->
  <div>  
          <label for="priceOfProduct" class="form-label">Price Of product</label>
          <input type="number" name="priceOfProduct" id="priceOfProduct" value=""  />
          
  </div>




  <!--Count of items -->
  <div>  
          <label for="CountOfProduct" class="form-label">Count of product items</label>
          <input type="number" name="CountOfProduct" id="CountOfProduct" value=""  />
          
  </div>




  <!--Category  -->
  <div class="mb-3">
           
           <div class="dropdown">
                  <label for="category" class="form-label">Category of Product</label>
                  <select id="category"  name="category">  
                         <option value="" ></option>
                         <option value="Team Sports">Team Sports</option>
                         <option value="Running and Fitness">Running and Fitness</option>
                         <option value="Home Play">Home Play</option>
                         <option value="Other">Other</option>     
                 </select>

          </div>
  </div>






<!--Upload image file -->
  <div>  
          <label for="uploadfile" class="form-label">Upload image file</label>
          <input type="file" name="uploadfile" value="" id="uploadfile" />
  </div>


  <!--Description Of items -->
  <div>  
          <label for="descriptionOfProduct" class="form-label">Count of product items</label>
          <input type="text" name="descriptionOfProduct" id="descriptionOfProduct" value=""  />
          
  </div>


  <!--Upload details -->
  <div>  
          <button type="submit" name="upload" id="upload">UPLOAD</button>
  </div>
  </form>


</div>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>