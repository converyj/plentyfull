<?php 

session_start(); 

// get the surveyid from SESSION 
$surveyid = $_SESSION['surveyid'];

// check if user filled in all the fields
if(!empty($_POST['code']) && !empty($_POST['choice']) && !empty($_POST['email']) {

		// get the form inputs 
		$code = $_POST['code']; 
		$choice = $_POST['choice']; 
		$email = $_POST['email']; 
} else {
	header("Location: code.html");
}

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

// verify Input Code
$stmt = $pdo->prepare("
						SELECT `surveyid` 
						FROM `survey` 
						WHERE `survey`.`surveyid` = $surveyid"); 
$stmt->execute();

if ($row = $stmt->fetch()) {
	echo("Found"); 
} else {
	echo("Error: Incorrect Input Code");
} 

// verify Answer 

// if yes, check if user exists by their id and email
if ($choice === 'Y') {
	$stmt = $pdo->prepare("
							SELECT `id` 
							FROM `user` 
							WHERE `user`.`email` = ‘$email’ "); 
	$stmt->execute();

	// if found, check if they are planner by their userid in admin table 
	if ($row = $stmt->fetch()) {
		$stmt = $pdo->prepare("
								SELECT `role` 
								FROM `admin`
								WHERE `admin`.`userid` = $userid"); 
		$stmt->execute();

		// row found 
		if ($row = $stmt->fetch()) {
			echo("You are the planner"); 
			// header ("Location: results.php"); 
		} else {
			echo("Error: You are not the planner");
		}
	} else { // user does not exist 
		echo("Error: We can't find your email in our system");
	}

// if no, check if user exists by their id and email		
} else {
	$stmt = $pdo->prepare("
							SELECT `id` 
							FROM `user` 
							WHERE `user`.`email` = ‘$email’ "); 
	$stmt->execute();

	// if found, check if they are planner by their userid in admin table
	if ($row = $stmt->fetch()) {
		$stmt = $pdo->prepare("
								SELECT `role` 
								FROM `admin`
								WHERE `admin`.`userid` = $userid"); 
		$stmt->execute();

		// row found
		if ($row = $stmt->fetch()) {
			echo("You are the planner"); 
		} else {
			echo("Error: You are an attendee");
			// header ("Location: attendee_survey.php");
		} 
	} else { // user does not exist, insert user 
		$stmt = $pdo->prepare("
								INSERT INTO `user` (`email`)
								VALUES (‘$email’) "); 
		$i = $stmt->execute();

		// get the userid that was auto-generated and save in SESSION for later
		$userid = $pdo->lastInsertId('id'); 
		$_SESSION["userid"] = $userid;

		// check whether insert was successful
		if ($i === 1) {
			echo("Success"); 
		} else {
			echo("Error: Could not insert the record");
		}		
}

?>