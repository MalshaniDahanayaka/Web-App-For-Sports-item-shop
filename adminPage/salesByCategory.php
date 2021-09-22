<?php

include '../include/Connection.php';
session_start();


//check set Date
if(isset($_REQUEST['submitDateRange'])){
   

  // Make dates format 'YYYY/MM/DD'
  $DateRange = $_REQUEST['datetimerange-input1'];
  $newdate =  $DateRange;
  $date1 = substr($newdate,0,10);
  $date2 = substr($newdate,13,22);
  $date1 = DateTime::createFromFormat('m/d/Y', $date1);
  $loverLimitDate =  $date1->format('Y-m-d');
  $date2 = DateTime::createFromFormat('m/d/Y', $date2);
  $upperLimitDate =  $date2->format('Y-m-d');
  $_SESSION['dayLover'] = $loverLimitDate;
  $_SESSION['dayUpper'] = $upperLimitDate;
 

  
  

}

//Main category compare
  if(isset($_REQUEST['mainCategoryCompare'])){

    $loverLimitDate= $_SESSION['dayLover'];
    $upperLimitDate = $_SESSION['dayUpper'] ;

    //get main category and count from selected date range
    $getCompareColumns = "SELECT items.category, SUM(sales.count) as no  FROM sales INNER JOIN items ON sales.id = items.id WHERE   DATE(soldDate) BETWEEN '".$loverLimitDate."' AND '".$upperLimitDate."' group by items.category" ;
    $columns = $con->query($getCompareColumns);

}




//Sport Category Compare
  
 if(isset($_REQUEST['sportsCategoryCompare'])){
  $data_points = array(); 
  $loverLimitDate= $_SESSION['dayLover'];
  $upperLimitDate = $_SESSION['dayUpper'] ;
  $getCompareColumns = "SELECT items.sportName, SUM(sales.count) as no  FROM sales INNER JOIN items ON sales.id = items.id WHERE   DATE(soldDate) BETWEEN '".$loverLimitDate."' AND '".$upperLimitDate."' group by items.sportName" ;
  $columns = $con->query($getCompareColumns);

  

  while($row = mysqli_fetch_array($columns))
         {        
              $point = array("label" => $row['sportName'] , "y" => $row['no']);
    
              array_push($data_points, $point);        
        }

        $_SESSION['data_points'] = $data_points;
       
        

}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/gh/alumuko/vanilla-datetimerange-picker@latest/dist/vanilla-datetimerange-picker.css">
    <?php include 'include/csslinks.php'; ?>
    <title>Sales by category</title>
</head>
<body>
          <div class="d-flex" id="wrapper">
                     <!-- include sidebar codes-->
                     <?php include 'include/sideBar.php'?>

                     <!-- Page Content -->
                     <div id="page-content-wrapper">


                     <!-- include upper navigation bar codes-->
                     <?php include 'include/headerNav.php'?>

                
                
                <!-- Date Range selector -->
                <form action="" method="POST">
                        <input type="text" id="datetimerange-input1" name="datetimerange-input1" size="24" style="text-align:center" value="">
                        <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" type="text/javascript"></script>
                        <script src="https://cdn.jsdelivr.net/gh/alumuko/vanilla-datetimerange-picker@latest/dist/vanilla-datetimerange-picker.js"></script>
                        <script>
                                 window.addEventListener("load", function (event) {
                                 new DateRangePicker('datetimerange-input1');
                                       });
                        </script>

                        <input type="submit" id="submitDateRange" name="submitDateRange" value="conformRange">
                </form>


                    
              <!-- Simple explaination about Category sales -->
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">  
                        <div class="container">
                                    <div class="row">
                                           <div class="col-sm">
                                                 <h4>Compare Sales with Our Main 5 Categories</h4>
                                                 <ul>
                                                 <li>Team Sports</li>
                                                 <li>Home Play</li>  
                                                 <li>Runing And Fitness</li>
                                                 </ul>
                                                 <input type="submit" id="mainCategoryCompare" name="mainCategoryCompare" value="Compare" style="background-color: greenyellow;">
                                                  
                                            </div>



                                            <div class="col-sm">
                                                 <h4>Compare Sports With Sales</h4>
                                                 <ul>
                                                 <li>Cricket</li>
                                                 <li>Volley Ball</li>  
                                                 <li>Swimming</li>
                                                 <li>etc...</li>
                                                 </ul>
                                                 <input type="submit" id="sportsCategoryCompare" onclick="barchart()" name="sportsCategoryCompare"  style="background-color: greenyellow;" value="compare">
                                            </div>
                                            <div class="col-sm">
                                                    One of three columns
                                             </div>
                                      
                                    </div>
                        </div>
                    </form>
                            
                            <!-- Barchart showing -->
                            <?php  if(isset($_REQUEST['sportsCategoryCompare'])){include 'charts/bargraph.php'; }?>
                            <!-- showing pie chart -->
                            <?php if(isset($_REQUEST['mainCategoryCompare'])){ include 'charts/piechart.php'; }?>
                          
                             <!-- include the footer -->
                             <?php include 'include/footer.php'; ?>
                    </div>
           </div>
  





    


<!-- include js link files -->
<?php include 'include/jslinks.php'; ?>   
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

