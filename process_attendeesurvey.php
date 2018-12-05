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

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull_new;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

// UPDATE row with their firstname, lastName into user table 
$stmt = $pdo->prepare("
						UPDATE `user` 
						SET `firstName` = '$firstName', 
						     `lastName` = '$lastName' 
						WHERE `user`.`userid` = $userid"); 
$i = $stmt->execute();

// check whether update was unsuccessful (redirect to error page), otherwise continue
if ($i == 0) {
	$message = "Error: Could not update the record in user";
	header("Location: error.php?message= " . $message);
}

// INSERT dietary restrictions checkboxes into userdietary table

// check if any checkboxes are checked
if (!empty($_POST["dietaryRestrictions"])) {
	$dietary = $_POST["dietaryRestrictions"]; 

	// if one or more was checked, loop through checkboxes and insert row in userdietary
	if(count($dietary > 0)) {

		foreach ($dietary as $dietCode) {
			$stmt = $pdo->prepare("
									INSERT INTO `userdietary` (`surveyid`, `userid`, `dietaryRestrictionCode`)
									VALUES ($surveyid, $userid, $dietCode) "); 
			$i = $stmt->execute();

			// check whether insert was unsuccessful (redirect to error page), otherwise continue
			if ($i == 0) {
				$message = "Error: Could not insert the record in userdietary";
				header("Location: error.php?message= " . $message);
			} 
		}
	}
}

// INSERT allergy checkboxes into userallergy table 

// check if any checkboxes are checked
if (!empty($_POST["allergies"])) {
	$allergy = $_POST["allergies"]; 

	// if one or more was checked, loop through checkboxes and insert row in userallergy
	if(count($allergy > 0)) {

		foreach ($allergy as $allergyCode) {
			$stmt = $pdo->prepare("
									INSERT INTO `userallergy` (`surveyid`, `userid`, `allergyCode`)
									VALUES ($surveyid, $userid, $allergyCode) "); 
			$i = $stmt->execute();

			// check whether insert was unsuccessful (redirect to error page), otherwise continue
			if ($i == 0) {
				$message = "Error: Could not insert the record in userallergy";
				header("Location: error.php?message= " . $message);
			}
		} 
	}
}

// get comment form input if they are any
if(!empty($_POST["comment"])) {
	$comment = $_POST["comment"];

	// INSERT comments into the comment table with their userid 
	$stmt = $pdo->prepare("
							INSERT INTO `comment` (`userid`, `comment`)
							VALUES ($userid, '$comment') "); 
	$i = $stmt->execute();

	// check whether insert was unsuccessful (redirect to error page), otherwise continue
	if ($i == 0) {
		$message = "Error: Could not insert the record in comment";
		header("Location: error.php?message= " . $message);
	} 
}

// INSERT userid and surveyid into usersurvey table 
$stmt = $pdo->prepare("
						INSERT INTO `usersurvey` (`userid`, `surveyid`)
						VALUES ($userid, $surveyid) "); 
$i = $stmt->execute();

// check whether insert was successful, otherwise redirect to error page
if ($i == 1) {
	header ("Location: thankyou.php");
} else {
	$message = "Error: Could not insert the record in usersurvey";
	header("Location: error.php?message= " . $message);
} 

?>