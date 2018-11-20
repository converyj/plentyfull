<?php 

session_start(); 

// check if user filled in all fields 
if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) 
	&& !empty($_POST['street']) && !empty($_POST['city']) && !empty($_POST['country']) 
	&& !empty($_POST['postal']) && !empty($_POST['ddlDate'])) {
	
	// get the form inputs 
	$firstName = $_POST['firstName']; 
	$lastName = $_POST['lastName']; 
	$email = $_POST['email']; 
	$street = $_POST['street']; 
	$city = $_POST['city']; 
	$country = $_POST['country'];
	$postal = $_POST['postal'];  
	$deadline = $_POST['ddlDate']; 
} else {
	header("Location: homepage.php");
}

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

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

// INSERT userid, role, city, country, street, postal code into admin table 
$stmt = $pdo->prepare("
						INSERT INTO `admin` (`userid`, `role`, `city`, `country`, `streetName`, `postalCode`) 
						VALUES ($userid, 1, '$city', '$country', '$street', '$postal') "); 
$i = $stmt->execute();

// check whether insert was unsuccessful (redirect to error page), otherwise continue
if ($i == 0) {
	$message = "Error: Could not insert the record in admin";
	header("Location: error.php?message= " . $message);
} 

// INSERT deadline into survey table 
$stmt = $pdo->prepare("
						INSERT INTO `survey` (`deadline`) 
						VALUES ('$deadline') "); 
$i = $stmt->execute();

// check whether insert was successful, otherwise redirect to error page
if ($i == 1) {

	 // get the surveyid that was auto-generated and save in SESSION to use later 
	$surveyid = $pdo->lastInsertId('surveyid'); 
	$_SESSION['surveyid'] = $surveyid;
} else {
	$message = "Error: Could not insert the record in survey";
	header("Location: error.php?message= " . $message);
} 

// INSERT dietary restrictions checkboxes into userdietary table 

// check if any checkboxes are checked
if (!empty($_POST["dietaryRestrictions"])) {
	$dietary = $_POST['dietaryRestrictions']; 

	// if one or more was checked, loop through checkboxes and insert row in userdietary
	if(count($dietary > 0)) {

		foreach ($_POST['dietaryRestrictions'] as $dietCode) {
			$stmt = $pdo->prepare("
									INSERT INTO `userdietary` (`surveyid`, `userid`, `dietaryRestrictionCode`)
									VALUES ($surveyid, $userid, $dietCode) "); 
			$i = $stmt->execute();

			// check whether insert was unsuccessful (redirect to error page), otherwise continue
			if ($i == 0) {
			} else { 
				$message = "Error: Could not insert the record in userdietary";
				header("Location: error.php?message= " . $message);
			} 
		}
	}
}

// INSERT allergy checkboxes into userallergy table 

// check if any checkboxes are checked
if (!empty($_POST["allergies"])) {
	$allergy = $_POST['allergies']; 

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

// INSERT userid and surveyid into usersurvey table 
$stmt = $pdo->prepare("
						INSERT INTO `usersurvey` (`userid`, `surveyid`)
						VALUES ($userid, $surveyid) "); 
$i = $stmt->execute();

// check whether insert was successful, otherwise redirect to error page
if ($i == 1) {
	header("Location: share_inputcode.php");
} else {
	$message = "Error: Could not insert the record in usersurvey";
	header("Location: error.php?message= " . $message);
} 

?>