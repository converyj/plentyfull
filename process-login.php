<?php

session_start();

// if user is not logged in, redirect to login 
if($_SESSION['logged-in'] == false) {
 	header("Location: login.php"); 
}

// if user is logged in, redirect back to home
if ($_SESSION["logged-in"] == true) {
	header("Location: home.php");
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
						SELECT * FROM `user` 
						WHERE `email` = '$email' 
						AND `password` = '$password'");

$stmt->execute();

// if the user exists in the table
if($row = $stmt->fetch()){

	// start sessions and redirect to home
	$_SESSION['logged-in'] = true;

	header("Location: homepage.php");

}else{
	echo("User not found"); ?>
	<a href="login.php">Go back to login</a> <?php 
}

?>