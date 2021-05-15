<?php
session_start();
require_once 'config/connect.php';
if (!isset($_SESSION['customer']) & !empty($_SESSION['customer']))
	 {
			header('location: login.php');
     }
include 'inc/header.php';
$cart = $_SESSION['cart']; 
?>
	
	<div class="close-btn fa fa-times"></div>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Shop Cart</h2>
						<p></p>
					</div>
					<div class="col-md-12">

<table class="cart-table table table-bordered">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>Product</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$total = 0;
						//print_r($cart);
						foreach ($cart as $key => $value) {
							$cartsql = "SELECT * FROM products WHERE id=$key";
							$cartres = mysqli_query($connection,$cartsql);
							$cartr = mysqli_fetch_assoc($cartres);
						
					?>

					<tr>
						<td>
							<a class="remove" href="delcart.php?id=<?php echo  $key ;?>"><i class="fa fa-times"></i></a>
						</td>
						<td>
							<a href="#"><img src="admin/<?php echo $cartr['thumbnail'];?>" alt="" height="90" width="90"></a>					
						</td>
						<td>
							<a href="single.php?id=<?php echo $cartr['id'];?>"><?php echo substr($cartr['name'],0,30);?></a>					
						</td>
						<td>
							<span class="amount"><?php echo $cartr['price'];?>.00/-</span>					
						</td>
						<td>
							<div class="quantity"><?php echo $value['quantity'];?></div>
						</td>
						<td>
							<span class="amount"><?php echo ($cartr['price']*$value['quantity']);?>.00/-</span>					
						</td>
					</tr>
					<?php
						$total = $total + ($cartr['price']*$value['quantity']);

					 } ?>
					<tr>
						<td colspan="6" class="actions">
							<div class="col-md-6">
								
							</div>
							<div class="col-md-6">
								<div class="cart-btn">
									<!-- <button class="button btn-md" type="submit">Update Cart</button>  	SHOP CONTENT -->
									
									<button   class="button btn-md" type="submit">Checkout</button>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>		

			<div class="cart_totals">
				<div class="col-md-6 push-md-6 no-padding">
					<h4 class="heading">Cart Totals</h4>
					<table class="table table-bordered col-md-6">
						<tbody>
							<tr>
								<th>Cart Subtotal</th>
								<td><span class="amount"><?php echo $total; ?>.00/-</span></td>
							</tr>
							<tr>
								<th>Shipping and Handling</th>
								<td>
									Free Shipping				
								</td>
							</tr>
							<tr>
								<th>Order Total</th>
								<td><strong><span class="amount"><?php echo $total;?>.00/-</span></strong> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>			
							
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<div class="clearfix space70"></div>
	<?php include 'inc/footer.php'; ?>