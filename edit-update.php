<?php 

session_start(); 

$userid = $_POST['id']; 
$surveyid = $_SESSION['surveyid'];

// check if user filled in all fields 
if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email'])) {
	
	// get the form inputs 
	$firstName = $_POST['firstName']; 
	$lastName = $_POST['lastName']; 
	$email = $_POST['email'];  
} else {
	header("Location: edit.php");
}

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull_new;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

// UPDATE firstname, lastName, email into user table 
$stmt = $pdo->prepare("
						UPDATE `user`
						SET `firstName` = '$firstName',
						    `lastName` = '$lastName'
						    `email` = '$email'
						WHERE `user`.`userid` = $userid"); 
$i = $stmt->execute();

// check whether update was unsuccessful (redirect to error page)
if ($i == 0) {
	echo("Could not update user");
		// $message = "Error: Could not update the record in user";
		// header("Location: error.php?message= " . $message);
} 


// DELETE dietary restrictions checkboxes in userdietary table 
$stmt = $pdo->prepare("
						DELETE FROM 
						`userdietary` 
						WHERE `userdietary`.`userid` = $userid
						AND `userdietary`.`surveyid` = $surveyid "); 
$i = $stmt->execute();

// check whether update was unsuccessful (redirect to error page), otherwise continue
if ($i == 0) {
	echo("Cannot delete userdietary");
	// $message = "Error: Could not delete the record in userdietary";
	// header("Location: error.php?message= " . $message);
} 

// INSERT dietary restrictions checkboxes in userdietary table 

// check if any checkboxes are checked
if (!empty($_POST["dietaryRestrictions"])) {
	$dietary = $_POST['dietaryRestrictions']; 
	echo($dietary);
	echo($userid);
	echo($surveyid);
	// if one or more was checked, loop through checkboxes and insert row in userdietary
	if(count($dietary > 0)) {

		foreach ($dietary as $dietCode) {
			$stmt = $pdo->prepare("
									INSERT INTO `userdietary` (`surveyid`, `userid`, `dietaryRestrictionCode`)
									VALUES ($surveyid, $userid, $dietCode) "); 
			$i = $stmt->execute();

			// check whether update was unsuccessful (redirect to error page), otherwise continue
			if ($i == 0) {
				echo("Could not delete userdietary"); 
				// $message = "Error: Could not update the record in userdietary";
				// header("Location: error.php?message= " . $message);
			} 
		}
	}
}

// DELETE user row in userallergy table 
$stmt = $pdo->prepare("
						DELETE FROM 
						`userallergy` 
						WHERE `userallergy`.`userid` = $userid
						AND `userallergy`.`surveyid` = $surveyid"); 
$i = $stmt->execute();

// check whether delete was unsuccessfull (redirect to error page)
if ($i == 0) {
	echo("Could not delete"); 
	// $message = "Error: Could not delete the record in userallergy";
	// header("Location: error.php?message= " . $message);
}

// INSERT allergy checkboxes into userallergy table 

// check if any checkboxes are checked
if (!empty($_POST["allergies"])) {
	$allergy = $_POST['allergies']; 
	echo($allergy);
	echo($userid);
	echo($surveyid);
	// if one or more was checked, loop through checkboxes and insert row in userallergy 
	if(count($allergy > 0)) {

		foreach ($allergy as $allergyCode) {
			$stmt = $pdo->prepare("
									INSERT INTO `userallergy` (`surveyid`, `userid`, `allergyCode`)
									VALUES ($surveyid, $userid, $allergyCode)"); 
			$i = $stmt->execute();

			// check whether insert was unsuccessful (redirect to error page), otherwise continue
			if ($i == 0) {
				echo("Could not insert");
				// $message = "Error: Could not insert the record in userallergy";
				// header("Location: error.php?message= " . $message);
			} 
		}
	}
}

// get comment form input if they are any
if(!empty($_POST["comment"])) {
	$comment = $_POST["comment"];

	// UPDATE comments into the comment table with their userid 
	$stmt = $pdo->prepare("
							UPDATE `comment`
							SET `comment` = '$comment'
							WHERE `comment`.`userid` = $userid"); 
	$i = $stmt->execute();

	// check whether update was unsuccessful (redirect to error page), otherwise continue
	if ($i == 0) {
		$message = "Error: Could not update the record in comment";
		header("Location: error.php?message= " . $message);
	} 
}

?>