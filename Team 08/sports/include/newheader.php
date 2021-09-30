
<?php 



?>

<link rel="stylesheet" type="text/css" href="main.css">
 <style>
        
        .container {
            position: relative;
            text-align: center;
          
            } 


        
        .top-right {
            position: absolute;
            top: -8px;
            right: -4px;
            font-weight: bold;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            background: yellow;
            border: 3px solid blue;
  
            }
    </style>

<header class="header">
<nav class="navbar navbar-style">
	<div class="container">
		<div class="navbar-header">
			<a href="newhomepage.php"> <img class="img-fluid" src="include/Sportsman1.png" ></a>
		</div>
    <a href="logout.php" style="float: right;color:red;font-weight:bold;font-size:larger ">Logout</a>
        <ul class ="nav navbar-nav navbar-right container">
            <li><a href="cartItems.php"><img class="img-fluid"src="include/cart2.png" ></a></li>
            <div class="top-right"><?php echo $_SESSION['selectedItemCount']; ?></div>
            
        </ul>

	</div>
</nav>

<style>


.navbar2 {
  overflow: hidden;
  background-color: #333;
  
}

.navbar2 a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: left 20px;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown2 {
  float: left;
  overflow: hidden;
  
}

.dropdown2 .dropbtn2 {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar2 a:hover, .dropdown2:hover .dropbtn2 {
  background-color: blue;
}

.dropdown-content2 {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content2 a {
  float: none;
  color: black;
  padding: 14px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content2 a:hover {
  background-color:  #ADD8E6;
}

.dropdown2:hover .dropdown-content2 {
  display: block;
}

.navbar2 .dropbtn2{
    text-transform: uppercase;

}


</style>



<form >
<div class="navbar2" >

  <div class="dropdown2" >
          <button class="dropbtn2" > 
                   <a href="itemAndCategory.php?categoryToshow=Team Sports  ">Team Sports</a>
                   <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content2" >
                   <a href="itemAndCategory.php?categoryToshow=Vball">Volley Ball</a>
                   <a href="itemAndCategory.php?categoryToshow=Cricket">Cricket</a>
                   <a href="itemAndCategory.php?categoryToshow=Basket Ball">Basket Ball</a>
                   <a href="itemAndCategory.php?categoryToshow=NetBall">Net Ball</a>
                   <a href="itemAndCategory.php?categoryToshow=FootBall">Foot Ball</a>
                   <a href="itemAndCategory.php?categoryToshow=Batminton">Badminton</a>
          </div>
  </div> 
  <div class="dropdown2">
          <button class="dropbtn2">
                   <a href="itemAndCategory.php?categoryToshow=Home Play">home play</a>
                   <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content2">
                   <a href="itemAndCategory.php?categoryToshow=Carrom">Carrom</a>
                   <a href="itemAndCategory.php?categoryToshow=Chess">Chess</a>
                   <a href="itemAndCategory.php?categoryToshow=Scrabble">Scrabble</a>
                   <a href="itemAndCategory.php?categoryToshow=Dart Game">Dart Game</a>
                   <a href="itemAndCategory.php?categoryToshow=Yoga">Yoga</a>
          </div>
  </div> 
  <div class="dropdown2">
          <button class="dropbtn2"> 
                   <a href="itemAndCategory.php?categoryToshow=Running and Fitness">running and fitness</a>
                   <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content2">
                   <a href="itemAndCategory.php?categoryToshow=Gym items">Gym Items</a>
                   <a href="itemAndCategory.php?categoryToshow=Karate">Karate</a>
                   <a href="itemAndCategory.php?categoryToshow=Swiming">Swimming</a>
                   <a href="itemAndCategory.php?categoryToshow=Boxing">Boxing Items</a>
                   <a href="itemAndCategory.php?categoryToshow=Athlatic">Athlatic</a>
              
          </div>
  </div> 
  <div class="dropdown2">
          <button class="dropbtn2"> 
                   <a href="#">wearings</a>       
                   <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content2">
                   <a href="itemAndCategory.php?categoryToshow=Shoes">Shoes</a>
                   <a href="itemAndCategory.php?categoryToshow=Jersey">Jersies</a>
                   <a href="itemAndCategory.php?categoryToshow=Shorts">Shorts</a>
          </div>
  </div> 

  <div class="dropdown2">
          <button class="dropbtn2"> 
                   <a href="itemAndCategory.php?categoryToshow=Other">other sports</a>
                   <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content2">
                   <a href="itemAndCategory.php?categoryToshow=Golf">Golf</a>
                   <a href="itemAndCategory.php?categoryToshow=archery">archery</a>
          </div>
  </div> 

  <div class="dropdown2">
          <button class="dropbtn2"> 
                   <a href="#">brands</a>
                   <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content2">
                   <a href="itemAndCategory.php?categoryToshow=nike">nike</a>
                   <a href="itemAndCategory.php?categoryToshow=Puma">PUMA</a>
                   <a href="itemAndCategory.php?categoryToshow=adidas">adidas</a>
                   <a href="itemAndCategory.php?categoryToshow=kappa">Kappa</a>
          </div>
  </div> 
</div>

</form>


</header>

