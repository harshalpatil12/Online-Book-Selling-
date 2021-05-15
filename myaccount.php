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
 //$cart = $_SESSION['cart']; 
 ?>
	
	<div class="close-btn fa fa-times"></div>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>My Account</h2>
					</div>
					<div class="col-md-12">

			<h3> Recent Orders </h3>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order ID</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment Mode</th>
						<th>Total</th>
						<th>Details</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
						$ordsql = "SELECT * FROM orders WHERE uid='$uid'";
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
						<td>
							<P>Your order has been palced.<br>
								Our order id is <?php echo $ordr['id']; ?>.<br>
							It will be delivered with 4-5 days.</P>
						</td>
						
						<!--<td>
							
							<a href="cancelorder.php?=id=<?php echo $ordr['id']; ?>">Cancel</a>
						</td>-->

					</tr>
					<?php } ?>
				</tbody>
			</table>		

			<div class="ma-address">
				<h3>ADDRESS  </h3>
						
			<div class="row">
				<div class="col-md-6">
								<h4>My Address <a href="editaddress.php">Edit</a></h4>
					<?php 
						$csql = "SELECT u1.firstname,u1.lastname,u1.address1,u1.address2,u1.state,u1.town,u1.zip,u1.phone FROM bookself.user u JOIN bookself.usersmeta u1 WHERE u.id =u1.uid AND u.id=$uid";
						$cres = mysqli_query($connection, $csql);
						$cr = mysqli_fetch_assoc($cres);
							echo "<p>".$cr['firstname']."  ".$cr['lastname']."</p>";
							echo "<p>".$cr['address1']."</p>";
							echo "<p>".$cr['address2']."</p>";
							echo "<p>".$cr['town']."</p>";
							echo "<p>".$cr['state']."</p>";
							echo "<p>".$cr['zip']."</p>";
							echo "<p>".$cr['phone']."</p>";
						
					?>
					
				</div>

			</div>



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
	<div class="clearfix space70"></div>
<?php include 'inc/footer.php'; ?>