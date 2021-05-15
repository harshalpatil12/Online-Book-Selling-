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
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total Price</th>
						<th>Total</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
						if(isset($_GET['id']) & !empty($_GET['id'])){
						$oid = $_GET['id'];
					}
					else{
								//header('location: myaccount.php');
						}
						
						$ordsql = "SELECT * FROM orders WHERE id='$oid'";
						$ordres = mysqli_query($connection, $ordsql);
						while($ordr = mysqli_fetch_assoc($ordres)) {

					?>
					<tr>
						<td>
							<?php echo $orditmr['pid']; ?>
						</td>
						<td>
							<?php echo $orditmr['pquantity']; ?>			
						</td>
						<td>
							INC<?php echo $orditmr['productprice']; ?>/-			
						</td>
						<td>
							INC<?php echo $orditmr['productprice'] * $orditmr['pquantity'] ; ?>/-			
						</td>
						
					</tr>
					<?php } ?>
					<tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td>
								Order Total
							</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td>
								Order Status
							</td>
							<td></td>
						</tr><tr>
							<td></td>
							<td></td>
							<td></td>
							<td>
								Order Placed on
							</td>
							<td></td>
						</tr>
					</tr>
					
				</tbody>
			</table>		

			<div class="ma-address">
						<h3>My Addresses</h3>
						<p>The following addresses will be used on the checkout page by default.</p>

			<div class="row">
				<div class="col-md-6">
								<h4>Billing Address <a href="#">Edit</a></h4>
					<p>
						Ranveer Singh<br>
						spyropress<br>
						karachi<br>
						karachi<br>
						TR05<br>
						342343<br>
						India 
					</p>
				</div>

				<div class="col-md-6">
								<h4>Shipping Address <a href="#">Edit</a></h4>
					<p>
						Ranveer Singh<br>
						spyropress<br>
						karachi<br>
						karachi<br>
						TR05<br>
						342343<br>
						India 
					</p>

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