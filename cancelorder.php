<?php
		ob_start();
		session_start();
		require_once 'config/connect.php';
	if (!isset($_SESSION['customer']) & !empty($_SESSION['customer']))
	 {
			header('location: login.php');
     }

include 'inc/header.php';
$uid = $_SESSION['customerid']; 
$cart = $_SESSION['cart']; 

	 
   

if (isset($_POST) & !empty($_POST)) {
	
	
	//$city = $_POST['city'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$company = $_POST['company'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$town = $_POST['town'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	
	
		  $usql = "UPDATE usersmeta SET firstname='$fname',lastname='$lname', company='$company',address1='$address1',address2='$address2',town='$town',state='$state',zip='$zip' WHERE uid=$uid ";
		 $ures = mysqli_query($connection, $usql) or die(mysqli_error($connection)) ;
		  if ($ures) {
		  		
		}				 
	
	
}

$sql = "SELECT * FROM usersmeta WHERE uid=$uid";
$res = mysqli_query($connection, $sql);
$r = mysqli_fetch_assoc($res);
?>
	

	
<div class="close-btn fa fa-times"></div>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
					<div class="page_header text-center">
						<h2>CANCEL ORDER</h2>
						<p>Do you want to cancel order?</p>
					</div>
<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Cancel Order</h3>
						<div class="clearfix space20"></div>
						<table class="cart-table account-table table table-bordered">
				<!--<thead>
					<tr>
						<th>Order ID</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment Mode</th>
						<th>Total</th>
						<th></th>
					</tr>
				</thead>-->
				<tbody>
					<?php 
						if(isset($_GET['id']) & !empty($_GET['id'])){
						$id = $_GET['id'];
					}
					else{
								//header('location: myaccount.php');
						}
						
						$ordsql = "SELECT * FROM orders WHERE id='$id'";
						$ordres = mysqli_query($connection, $ordsql);
						while($ordr = mysqli_fetch_assoc($ordres)) {

					?>
					<tr>
						<td>
							<?php echo $ordr['id']; ?>
						</td>
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
						<td>
							<?php echo $ordr['orderstatus']; ?>			
						</td>
						<td>
							<?php echo $ordr['paymentmode']; ?>
						</td>
						<td>
							INC<?php echo $ordr['totalprice']; ?>/-			
						</td>
						
					</tr>

					<?php } ?>
				</tbody>
			</table>
												
							<div class="clearfix space20"></div>
							<label>Reasons</label>
							<textarea class="form-control" name="cancel" cols="6"> </textarea>
							
							
				</div>
				<div class="space30"></div>
				<input type="submit" class="button btn-lg" value="Cancel Order">
				
				
			</div>
			
		</div>		
	</form>

	</section>
	
<div class="clearfix space70"></div>
<?php include 'inc/footer.php'; ?>
