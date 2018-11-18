<?php 

session_start(); 

// get the userid from SESSION to use when updating user row 
$userid = $_SESSION["userid"];

// get the surveyid from SESSION to use when inserting user and survey
$surveyid = $_SESSION["surveyid"];

// check if user filled in all fields 
if(!empty($_POST['firstName']) && !empty($_POST['lastName'])) {

	// get the form inputs 
	$firstName = $_POST['firstName']; 
	$lastName = $_POST['lastName']; 
} else {
	header("Location: attendee_survey.php");
}

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

// UPDATE row with their firstname, lastName into user table 
$stmt = $pdo->prepare("
						UPDATE `user` 
						SET `firstName` = ‘$firstName’, 
						     `lastName` = ‘$lastName’ 
						WHERE `user`.`id` = $id"); 
$i = $stmt->execute();

// check whether update was successful
if ($i === 1) {
	echo("Success"); 
	// header ("Locaton: thankyou.html");
} else {
	echo("Error: Could not update the record");
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
}

// get comment form input if they are any
if(isset($_POST['comment']) {
	$comment = $_POST['comment'];

	// INSERT comments into the comment table with their userid 
	$stmt = $pdo->prepare("
							INSERT INTO `comment` (`userid`, `comment`)
							VALUES ($userid, `$comment`) "); 
	$i = $stmt->execute();

	// check whether insert was successful
	if ($i === 1) {
		echo("Success"); 
	} else {
		echo("Error: Could not insert the record");
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