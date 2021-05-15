<?php
		ob_start();
		session_start();
		require_once 'config/connect.php';
	if (!isset($_SESSION['customer']) & !empty($_SESSION['customer']))
	 {
			header('location: login.php');
     }


	 $uid = $_SESSION['customerid']; 
	 $cart = $_SESSION['cart']; 

	 include 'inc/header.php';


if (isset($_POST) & !empty($_POST)) {
	
	
	//$city = $_POST['city'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	//$company = $_POST['company'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$town = $_POST['town'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	
	
		  $usql = "UPDATE usersmeta SET firstname='$fname',lastname='$lname',address1='$address1',address2='$address2',town='$town',state='$state',zip='$zip' WHERE uid=$uid ";
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
						<h2>Shop - Checkout</h2>
						<p></p>
					</div>
<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Update Address Details</h3>
						


						<div class="space30"></div>
						
							<label class="">City </label>
							<select name="city" class="form-control">
								<option value="">Select City</option>
								<option value="AX">Mumbai</option>
								<option value="AF">Pune</option>
								<option value="AL">Thane</option>
								<option value="DZ">Nagpur</option>
								<option value="AD">Nashik</option>
								<option value="AO">Sangli</option>
								<option value="AI">Kolhapur</option>
								<option value="AQ">Solapur</option>
								<option value="AG">Dhule</option>
								<option value="AR">Nanded</option>
								<option value="AM">Aurangabad</option>
								<option value="AW">Latur</option>
								<option value="AU">Jalgaon</option>
								<option value="AT">Amaravati</option>
								<option value="AZ">Yavatmal </option>
								
							</select>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input name="fname" class="form-control" placeholder="" value="<?php if(!empty($r['firstname'])){echo $r['firstname']; }elseif(isset($fname)) { echo $fname ;} ?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input name="lname" class="form-control" placeholder="" value="<?php if(!empty($r['lastname'])){echo $r['lastname']; }elseif(isset($lname)){ echo $lname ;} ?>" type="text">
								</div>
							</div>
							<!--<div class="clearfix space20"></div>
							<label>Company Name</label>
							<input name="company" class="form-control" placeholder="" value="<?php if(!empty($r['company'])){echo $r['company']; }elseif(isset($company)){ echo $company;} ?>" type="text">-->
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input name="address1" class="form-control" placeholder="Street address" value="<?php if(!empty($r['address1'])){echo $r['address1']; }elseif(isset($address1)) echo $address1; ?>" type="text">
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input name="address2" class="form-control" placeholder="Apartment, suite, unit etc. (optional)" value="<?php if(!empty($r['address2'])){echo $r['address2']; }elseif(isset($address2)) {echo $address2;} ?>" type="text">
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-4">
									<label>Town / City </label>
									<input name="town" class="form-control" placeholder="Town / City" value="<?php if(!empty($r['town'])){echo $r['town']; }elseif(isset($town)){ echo $town; }?>" type="text">
								</div>
								<div class="col-md-4">
									<label>State/Province</label>
									<select name="state" class="form-control" placeholder="State" value="<?php if(!empty($r['state'])){echo $r['state']; }elseif(isset($state)) {echo $state; }?>">
										<option></option>
										<option>Maharashtra</option>
									</select>
								</div>
								<div class="col-md-4">
									<label>Postcode </label>
									<input name="zip" class="form-control" placeholder="Postcode / Zip" value="<?php if(!empty($r['zip'])){ echo $r['zip'];}elseif(isset($zip)){echo $zip;} ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>	
							<div class="row">					
							<div class="col-md-4">
								<label> Phone </label>
								<input name="phone" class="form-control" id="billing_phone" placeholder="" value="<?php if(!empty($r['phone'])){echo $r['phone']; }elseif(isset($phone)){ echo $phone;} ?>" type="text">
							</div>
					</div>
				</div>
				<div class="space30"></div>
				<input type="submit" class="button btn-lg" value="Update Address">
				
				
			</div>
			
		</div>		
	</form>

	</section>
	
<div class="clearfix space70"></div>
<?php include 'inc/footer.php'; ?>
