<?php
    
    include 'include/Connection.php';


     if(isset($_REQUEST['upload'])){ 

        //define the variable to store form values(For elements can be null)
        if($_REQUEST['sizeOfProduct']){
            $sizeOfProduct = $_REQUEST['sizeOfProduct'];
        }else{
            $sizeOfProduct = "0";
        }
      
        

      //identify the values passed by form
        $nameOfSport = $_REQUEST['nameOfSport'];
        $nameOfItem = $_REQUEST['nameOfItem'];
        $priceOfProduct = $_REQUEST['priceOfProduct'];
        $countOfProduct = $_REQUEST['CountOfProduct'];
        $brandOfProduct = $_REQUEST['brandOfProduct'];
        $category = $_REQUEST['category'];
        $id = substr($nameOfSport, 0, 3).substr($nameOfItem,0,3).substr($brandOfProduct,0,3).substr($sizeOfProduct,0,3);

       

        //make file location in server
        $upload_folder = "img/";
        $file_location = $upload_folder . basename($_FILES["uploadfile"]["name"]);



        //Update the database                                                                                                                                        
        $InsertNewProductDetails = "INSERT INTO items (id,sportName,productType ,brand,size,prize,category,countOfItems,imagePath) VALUES ('".$id."','".$nameOfSport."','".$nameOfItem."','".$brandOfProduct."','".$sizeOfProduct."',$priceOfProduct,'".$category."',$countOfProduct,'".$file_location."')";
        if($con->query($InsertNewProductDetails) === TRUE){

            //Move image to correct file path
            if(file_exists($file_location)){
                echo 'file already exist';
            }
            else{
                if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file_location)){
                
                    echo "added new item succesfully";
                };
    
            }

        }else{
            echo "not added new item";

        }


        

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


<div id="content">
  
  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

   
  <!--Name of product field in admin page -->
  <div class="mb-3">
           
           <div class="dropdown">
                  <label for="nameOfSport" class="form-label">Name of Sport</label>
                  
                  <select id="nameOfSport"  name="nameOfSport">  
                         <option value="" ></option>
                         <option value="Cricket">Cricket</option>
                         <option value="Vball">Vball</option>
                         <option value="Basket Ball">Basket Ball</option>
                         <option value="Batminton">Batminton</option>     
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
                         <option value="Shirt">Shirts</option>     
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