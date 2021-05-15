
<?php
 session_start();
 require_once 'config/connect.php';
 if (isset($_POST) & !empty($_POST)) {
 	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
 	$password = $_POST['password'];
 	$sql = "SELECT * FROM user WHERE email='$email'";
 	$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
 	$count = mysqli_num_rows($result);
 	$r = mysqli_fetch_assoc($result);

 	if(count == 0){
 	if (password_verify($password,$r['password'])) {
 		//echo "User exits, create session";
 		$_SESSION['customer'] = $email;
 		$_SESSION['customerid'] = $r['id'];

 		header("location: indexbs.php");
 	}
 	else{
 		//$fmsg = "Invalid login credent";
 		header("location: login.php?message=1");
 	}
 }
}

 ?>