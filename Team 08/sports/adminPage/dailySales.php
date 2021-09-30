<?php
include '../include/Connection.php';



//bigining showin in Today sales details
$selectDate = date('Y-m-d');
$getDetailsOfSales = "SELECT * FROM sales WHERE soldDate LIKE '$selectDate%'";
$salesOfDate = $con->query($getDetailsOfSales);
$getSelectDateProfit = "SELECT SUM(price) FROM sales WHERE soldDate LIKE '$selectDate%'";
$selectDateProfit = $con->query($getSelectDateProfit);
$profit = $selectDateProfit->fetch_array();



//check set Date and show selected day data
if(isset($_REQUEST['Datesubmit'])){
    $selectDate = $_REQUEST['selectDate'];
    $Date = str_replace('/', '-', $selectDate);
    $selectDate = date('Y-m-d', strtotime($Date));
    $getDetailsOfSales = "SELECT sales.id, sales.count,sales.price,sales.email,sales.soldDate,items.productType FROM sales INNER  JOIN items ON sales.id = items.id WHERE soldDate LIKE '%{$selectDate}%' ";
    $salesOfDate = $con->query($getDetailsOfSales);


    // calculate select date profit
    $getSelectDateProfit = "SELECT SUM(price) FROM sales WHERE soldDate LIKE '$selectDate%'";
    $selectDateProfit = $con->query($getSelectDateProfit);
    $profit = $selectDateProfit->fetch_array();

   
}else{
    $selectDate = date("Y-m-d");
    $getDetailsOfSales = "SELECT sales.id, sales.count,sales.price,sales.email,sales.soldDate,items.productType FROM sales INNER  JOIN items ON sales.id = items.id WHERE soldDate LIKE '%{$selectDate}%' ";
    $salesOfDate = $con->query($getDetailsOfSales);


}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'include/csslinks.php'; ?>
    <title>Daily Sales</title>
</head>
<body>

<div class="d-flex" id="wrapper">
        <!-- include sidebar codes-->
        <?php include 'include/sideBar.php'?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
                 <!-- include upper navigation bar codes-->
                 <?php include 'include/headerNav.php'?>
                 <nav style="background-color: green; text-align:center;width:100rem;margin-right: auto;margin-left: auto;"><h1>Daily Sales</h1> </nav>
                 
              
       
              <!-- Calender -->
                 <div class="container">
                       <div class="row" style="margin-left: 60px;">
			            <h4>Date</h4>
	                   </div>
	              	   <div class="row">
	                            <div class='col-sm-3' style="width: 190px; border-radius: 25px;margin-left: 70px;">
	                                 	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		                                        <div class="form-group">
		                                                 <div class='input-group date' id='datepicker'>
		                                                 <input type='text' class="form-control" name="selectDate">
		                                                 <span class="input-group-addon" >
		                                                 <span class="glyphicon glyphicon-calendar"></span>
		                                                 </span>
		                                                 </div>        
		                                        </div>
                                                <input type="submit" name="Datesubmit" id="Datesubmit" value="View" style="margin-left: 0px;">
                                                 
		                                </form>
	                            </div>
	                   </div>
	             </div>


                 <!-- Date navigat-->
                 <nav style="background-color: blue; text-align:center;width:100rem;margin-right: auto;margin-left: auto;">
                              <h2>Date :
                                     <?php echo $selectDate; ?>
                              </h2> 
                              <h2>
                                    Total profit : <?php echo $profit['SUM(price)']; ?>
                              </h2>
                </nav>



                <!-- Showing details of selected Day -->
                 <table class="table table-bordered table-dark" style="width: 100rem ; margin-right: auto;margin-left: auto;">
                            <thead>
                                       <tr>
                                              <th scope="col">Item ID</th>
                                              <th scope="col">Item Name</th>
                                              <th scope="col">Sold Item Count</th>
                                              <th scope="col">Total Price</th>
                                              <th scope="col">Buyer Email</th>
                                              <th scope="col">Sold Date</th>
                                       </tr>
                            </thead>
                            <tbody>
                                <?php
                                     if($salesOfDate ->num_rows >0){
                                         while($row = $salesOfDate->fetch_array()){

                                 ?>
                 
                                <!-- Show customers Details-->
                                <tr>
                                         <td><?php echo $row['id']; ?></td>
                                         <td><?php echo $row['productType']; ?></td>
                                         <td><?php echo $row['count']; ?></td>
                                         <td><?php echo $row['price']; ?></td>
                                         <td><?php echo $row['email']; ?></td>
                                         <td><?php echo $row['soldDate']; ?></td>
                                </tr>


                               <?php           
                                    }

                                  }  ?>
                            </tbody>
                 </table>
            <!-- include the footer -->
            <?php include 'include/footer.php'; ?>

         </div>
        
</div>
                 
    <!-- include js link files -->
    <?php include 'include/jslinks.php'; ?>

	<script >
	    $(function () {
	        $('#datepicker').datepicker({
	            format: "dd/mm/yyyy",
	            autoclose: true,
	            todayHighlight: true,
		        showOtherMonths: true,
		        selectOtherMonths: true,
		        autoclose: true,
		        changeMonth: true,
		        changeYear: true,
		        orientation: "button"
	        });
	    });
	</script>


</body>
</html>














