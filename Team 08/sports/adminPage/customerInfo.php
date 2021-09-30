<?php

include '../include/Connection.php';



//get all customer details from database
$GetCustomerDetails = "SELECT * FROM users";
$CustomerDetails = $con->query($GetCustomerDetails);


if(isset($_REQUEST['submitSortingMethod'])){


        if($_REQUEST['nameOfSortingMethod']=="registerDateASC"){
         //sort customers oreder by register date ACS order
              $GetCustomerDetails = "SELECT * FROM users ORDER by registerDate ASC";
              $CustomerDetails = $con->query($GetCustomerDetails);

        }


        if($_REQUEST['nameOfSortingMethod']=="registerDateDESC"){
           //sort customers oreder by register date ACS order
              $GetCustomerDetails = "SELECT * FROM users ORDER by registerDate DESC";
              $CustomerDetails = $con->query($GetCustomerDetails);
         }

         if($_REQUEST['nameOfSortingMethod'] == "topCustomer"){
                //sort customers oredered by top customers
                $GetCustomerDetails = "SELECT users.email,users.username,users.password,users.verifiedEmail,users.registerDate,SUM(sales.price) as no  FROM sales INNER JOIN users ON sales.email = users.email  group by users.email ORDER BY no DESC";
                $CustomerDetails = $con->query($GetCustomerDetails);
         }


        if($_REQUEST['nameOfSortingMethod']=="lastShopingDate"){
        //sort by last bought items
              $GetCustomerDetails = "SELECT u.* FROM users u WHERE EXISTS(SELECT DISTINCT email FROM sales s WHERE u.email = s.email)";
              $CustomerDetails = $con->query($GetCustomerDetails);

        }

}
//find users searching by name
if(isset($_REQUEST['findSearchedName'])){

        $searchName = $_REQUEST['searchName'];
        $searchingvalue = '%'.$searchName.'%';

        //show matching details for searched name
        $GetCustomerDetails = "SELECT * FROM users WHERE username LIKE '".$searchingvalue."' ";
        $CustomerDetails = $con->query($GetCustomerDetails);


}

//delete select user
if(isset($_REQUEST['DeleteUser'])){

    $deleteEmail = $_REQUEST['Deleteemail'];

    $deleteUserAccount = "DELETE FROM users WHERE email ='".$deleteEmail."'";

    $con->query($deleteUserAccount);

    //update table after deleting
    $GetCustomerDetails = "SELECT * FROM users";
    $CustomerDetails = $con->query($GetCustomerDetails);
}


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'include/csslinks.php'; ?>
    <title>Customers Informations</title>
</head>
<body>
<div class="d-flex" id="wrapper">
        <!-- include sidebar codes-->
        <?php include 'include/sideBar.php'?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
                 <!-- include upper navigation bar codes-->
                 <?php include 'include/headerNav.php'?>
        
    <nav style="background-color: green; text-align:center;width:100rem;margin-right: auto;margin-left: auto;"><h1>Customer Informations</h1>
        
        

        
        <!-- select sorting methods and search bar -->
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" style="float: right;">
             <ul class="nav">
                 <li class="nav-item">
                      <input type="text" name="searchName" id="searchName" for="search" placeholder="Enter Username" onkeyup="myFunction()">
                      <input type="submit" name="findSearchedName" id="findSearchedName" value="Search" style="margin-right:20px;">
                 </li>
                 <li class="nav-item">
                       <div class="dropdown">
                            
                            <select id="nameOfSortingMethod"  name="nameOfSortingMethod" style="height: 30px;">  
                                  <option value="" ></option>
                                  <option value="registerDateASC">Register Date(ASC)</option>
                                  <option value="registerDateDESC">Register Date(DESC)</option>
                                  <option value="topCustomer">Top Customers</option>
                                  <option value="lastShopingDate">Last Shoping Date</option>     
                             </select>
                             <input type="submit" name="submitSortingMethod" id="submitSortingMethod" value="Sort" >

                        </div>
                  </li>
             </ul>
        </form>
    </nav>

    <table class="table table-bordered table-dark" style="width: 100rem ; margin-right: auto;margin-left: auto;" >
             <thead>
                      <tr>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Email Verifying Status</th>
                            <th scope="col">Register Date</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>
                      </tr>
             </thead>
             <tbody>
                <?php
                    if($CustomerDetails ->num_rows >0){
                         while($row = $CustomerDetails->fetch_array()){

                          ?>
                 
             <!-- Show customers Details-->
                      <tr>
                            <th><?php echo $row['username']; ?></th>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['active']; ?></td>
                            <td><?php echo $row['registerDate']; ?></td>
                            <td>
                            <form method='POST' action="<?php $_SERVER['PHP_SELF']; ?>" >
                                    <input type=hidden name="Deleteemail" value=<?php echo $row['email']?> >
                                    <input type=submit value="Delete" name="DeleteUser" style="background-color: red;" >
                            </form>
                            </td>
                            <td> 
                            <form method='POST' action="userUpdate.php">
                                    <input type=hidden name="updateDetails" value=<?php echo $row['email']?> >
                                    <input type=submit value="Update" name="updateUser" style="background-color: blue;" >
                            </form>
                            </td>
                                 
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
           

<?php include 'include/jslinks.php'; ?>

</body>
</html>