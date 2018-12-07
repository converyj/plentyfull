<?php

session_start();

if (isset($_SESSION['logged-in'])) {
	// if user is logged in, redirect back to home
	if ($_SESSION["logged-in"] == true) {
		header("Location: homepage.php");
	}
}

// check if the inputs are set and not null, else redirect to login form
if(!empty($_POST['email']) && !empty($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
} else {
	header("Location: login.php");
}

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull_new;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

// check if user exists
$stmt = $pdo->prepare("
						SELECT * 
						FROM `user` 
						WHERE `user`.`email` = '$email'");

$stmt->execute();

// if the user exists in the table
if($row = $stmt->fetch()) {

	$userid = $row['userid']; 

	// check if user has an account  
	$stmt = $pdo->prepare("
							SELECT `password` 
							FROM `admin`
							WHERE `admin`.`userid` = '$userid'");
	$stmt->execute();

	// if user does not have an account, display message
	if ($row = $stmt->fetch()) {
		if ($password == $row['password']) {
			// start sessions and redirect to homepage
			$_SESSION['logged-in'] = true;
			$_SESSION['userid'] = $userid; 
			
			header("Location: homepage.php");
		} else {
			echo("Invalid password"); 
			?>
			<a href="login.php">Go to login page</a>;
		<?php 
		}
	} else {
		echo("User not found in admin table"); ?>
		<a href="signUp.php">Go back to sign up</a> <?php 
	}

} else {
	echo("User not found in user table"); ?>
	<a href="signUp.php">Go back to sign up</a> <?php 
}

?>