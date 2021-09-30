<?php 

include 'include/Connection.php';
session_start();

?>


      <link rel="stylesheet" type="text/css" href="include/footer.css">
      <div class="content" style="text-align: center;">
          <nav style="background-color: greenyellow;height:80px;">
              <h1 style="font-size:xx-large;">Payment Here</h1>
          </nav>
          <div class="container" >
              <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    			<input type="hidden" name="merchant_id" value="1218751">    <!-- Replace your Merchant ID -->
    			<input type="hidden" name="return_url" value="http://localhost/Team%2008/orderReturn.php">
    			<input type="hidden" name="cancel_url" value="http://localhost/Team%2008/orderCancel.php">
    			<input type="hidden" name="notify_url" value="http://localhost/Team%2008/orderNotify.php">  
    			
                <input type="hidden" name="order_id" value="<?php echo $_SESSION['order_id']; ?>">
    			<input type="hidden" name="items" value="<?php echo $_SESSION['itemsList']; ?>"><br>
    			<input type="hidden" name="currency" value="LKR">
    			<input type="hidden" name="amount" value="<?php echo $_SESSION['amount']; ?>">  

                <?php 

                $getDetailsForPaymentSql = "SELECT * FROM users WHERE email = '".$_SESSION['order_id']."' ";
                $UserDetails = $con->query($getDetailsForPaymentSql);
                $person = $UserDetails->fetch_array();
                ?>
    	<table style="margin-left: 250px;margin-top:100px;">
			<tr>
				<td>First name</td>
				<td>
					<input type="text" name="first_name"  class="inputbox" value="<?php echo $person['first_name'] ?>">
				</td>
				<td>
					&emsp;Last name:
				</td>
				<td>
					<input type="text" name="last_name"  class="inputbox" value="<?php echo $person['last_name'] ?>">
				</td>
			</tr>
			<tr><td colspan="4">&emsp;</td></tr>
			<tr>
				<td>
					E-mail:
				</td>
				<td>
					<input type="email" name="email"  class="inputbox" value="">
				</td>
				<td>
					&emsp;Mobile:
				</td>
				<td>
					<input type="text" name="phone"  class="inputbox" value="">
				</td>
			</tr>
			<tr><td colspan="4">&emsp;</td></tr>
			<tr>
				<td>
					Adress:
				</td>
				<td>
					<input type="text" name="address"  class="inputbox" value="University Of kelaniya, kelanya">
				</td>
				<td>
					&emsp;City:
				</td>
				<td>
					<input type="text" name="city"  class="inputbox" value="kelaniya">
				</td>
			</tr>
		</table>
    			
    			
    			
    	<input type="hidden" name="country" value="Sri Lanka"><br><br><br> 
    			
    	<div class="d-grid gap-2">
  			<input type="submit" value="Buy Now" class="btn btn-primary">
		</div>
    			
    			   
</form> 
          </div>
          

      </div>
      <?php include 'include/footer.php'; ?>