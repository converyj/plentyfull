<?php

session_start();

// if user is not logged in, redirect to login 
if($_SESSION['logged-in'] == false) {
 	header("Location: login.php"); 
}

// check if the inputs are set and not null, else redirect to registration form
if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password'])) {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
} else {
	header("Location: signUp.php");
}

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull_new;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

// check if user is in user table 
$stmt = $pdo->prepare("
						SELECT * 
						FROM `user`
						WHERE `email` = '$email' ");
$stmt->execute();

// if user exists, UPDATE their row in admin table 
if ($row = $stmt->fetch()) {
	$userid = $row['userid']; 

	$stmt = $pdo->prepare("
							UPDATE `admin` 
							SET `password` = '$password'
							WHERE `admin`.`userid` = $userid ");
	$i = $stmt->execute();

	// check if the insert was successful or not 
	if ($i == 1) {
			// start sessions and redirect to home
			$_SESSION['logged-in'] = true;

			header("Location: homepage.php");
		} else {
			// $message = "Error: Could not update the record";
			// header("Location: error.php?message= " . $message);
		}
}	

?>