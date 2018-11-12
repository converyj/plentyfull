<?php 

session_start(); 

// check if user filled in all fields 
if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['city']) && !empty($_POST['country']) && !empty($_POST['deadline'])) {

	// get the form inputs 
	$firstName = $_POST['firstName']; 
	$lastName = $_POST['lastName']; 
	$email = $_POST['email']; 
	$city = $_POST['city']; 
	$country = $_POST['country']; 
	$deadline = $_POST['deadline']; 
} else {
	header("Location: home.html");
}

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

// INSERT firstname, lastName, email into user table 
$stmt = $pdo->prepare("
						INSERT INTO `user` (`firstName`, `lastName`, `email`)
						VALUES (‘$firstName’, ‘$lastName’, ‘$email’) "); 
$i = $stmt->execute();

// get the userid that was auto-generated and save to SESSION to use later
$userid = $pdo->lastInsertId('id'); 
$_SESSION["userid"] = $userid;

// check whether insert was successful
if ($i === 1) {
	echo("Success"); 
} else {
	echo("Error: Could not insert the record");
} 

// INSERT city, country, role into admin table 
$stmt = $pdo->prepare("
						INSERT INTO `admin` (`userid`, `role`, `city`, `country`) 
						VALUES ($userid, 1, ‘$city’, ‘$country’) "); 
$i = $stmt->execute();

// check whether insert was successful
if ($i === 1) {
	echo("Success"); 
} else {
	echo("Error: Could not insert the record");
} 

// INSERT deadline into survey table 
$stmt = $pdo->prepare("
						INSERT INTO `survey` (`deadline`) 
						VALUES (‘$deadline’) "); 
$i = $stmt->execute();

// get the surveyid that was auto-generated and save in SESSION to use later 
$surveyid = $pdo->lastInsertId('id'); 
$_SESSION["surveyid"] = $surveyid;

// check whether insert was successful
if ($i === 1) {
	echo("Success"); 
} else {
	echo("Error: Could not insert the record");
} 

// INSERT dietary restrictions checkboxes into userdietary table 

// check if any checkboxes are checked
if (!empty($_POST["dietary"])) {
	$dietary = $_POST['dietary']; 

	// if checkbox or more was checked, loop through checkboxes
	if(count($dietary > 0)) {

		foreach ($dietary as $dietCode) {
			echo($dietCode);
			$stmt = $pdo->prepare("
									INSERT INTO `userdietary` (`surveyid`, `userid`, `dietaryRestrictionCode`)
									VALUES ($surveyid, $userid, $dietCode) "); 
			$i = $stmt->execute();

			// check whether insert was successful
			if ($i === 1) {
				echo("Success"); 
			} else {
				echo("Error: Could not insert the record");
			} 
		}
	}
}

// INSERT allergy checkboxes into userallergy table 

// check if any checkboxes are checked
if (!empty($_POST["allergy"])) {
	$allery = $_POST['allergy']; 
}

// if checkbox or more was checked, loop through checkboxes
if(count($allergy > 0)) {

		foreach ($allergy as $allergyCode) {
			echo($allergyCode);
			$stmt = $pdo->prepare("
									INSERT INTO `userallergy` (`surveyid`, `userid`, `allergyCode`)
									VALUES ($surveyid, $userid, $allergyCode) "); 
			$i = $stmt->execute();

			// check whether insert was successful
			if ($i === 1) {
				echo("Success"); 
			} else {
				echo("Error: Could not insert the record");
			} 
		}
}

// INSERT userid and surveyid into usersurvey table 
$stmt = $pdo->prepare("
						INSERT INTO `usersurvey` (`userid`, `surveyid`)
						VALUES ($userid, $surveyid) "); 
$i = $stmt->execute();

// check whether insert was successful
if ($i === 1) {
	echo("Success"); 
} else {
	echo("Error: Could not insert the record");
} 

?>