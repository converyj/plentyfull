<?php

session_start();

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
						WHERE `user`.`email` = '$email'");
$stmt->execute();

// if user exists, check to see if they already have a password in admin table 
if ($row = $stmt->fetch()) {
	$userid = $row['userid']; 

	// check if user is in user table 
	$stmt = $pdo->prepare("
							SELECT `password` 
							FROM `admin`
							WHERE `admin`.`userid` = '$userid'");
	$stmt->execute();

	// if user does not have an account, UPDATE their row with their password in admin table 
	if ($row = $stmt->fetch()) {
		if ($row['password'] == null) {
			$stmt = $pdo->prepare("
									UPDATE `admin` 
									SET `password` = '$password'
									WHERE `admin`.`userid` = $userid ");
			$i = $stmt->execute();

			// check if the update was successful or not 
			if ($i == 1) {
					// start session and redirect to homepage
					$_SESSION['logged-in'] = true;
					$_SESSION["userid"] = $userid;

					header("Location: homepage.php");
			} else {
				$message = "Error: Could not update the record";
				header("Location: error.php?message= " . $message);
			}
		} else {
			echo("User already has an account"); 
			?>
			<a href="login.php">Go to login page</a>;
		<?php 
		}
	} else {
		$message = "Error: User does not exist";
		header("Location: error.php?message= " . $message);
	}
			
} else {

	// new user 

	// INSERT firstname, lastName, email into user table 
	$stmt = $pdo->prepare("
							INSERT INTO `user` (`firstName`, `lastName`, `email`)
							VALUES ('$firstName', '$lastName', '$email') "); 
	$i = $stmt->execute();

	// check whether insert was successful, otherwise redirect to error page
	if ($i == 1) {

		// get the userid that was auto-generated and save to SESSION to use later
		$userid = $pdo->lastInsertId('userid'); 
		$_SESSION["userid"] = $userid;

		} else {
			$message = "Error: Could not insert the record in user";
			header("Location: error.php?message= " . $message);
		} 

	// INSERT userid, role, city, country into admin table 
	$stmt = $pdo->prepare("
							INSERT INTO `admin` (`userid`, `role`, `password`) 
							VALUES ($userid, 1, '$password') "); 
	$i = $stmt->execute();

	// check whether insert was unsuccessful (redirect to error page), otherwise continue
	if ($i == 0) {
		$message = "Error: Could not insert the record in admin";
		header("Location: error.php?message= " . $message);
	} 
}

?>