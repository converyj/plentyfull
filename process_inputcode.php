<?php 

session_start(); 

// check if user filled in all the fields
if(!empty($_POST['code']) && !empty($_POST['role']) && !empty($_POST['email'])) {

		// get the form inputs 
		$code = $_POST['code']; 
		$role = $_POST['role']; 
		$email = $_POST['email']; 
} else {
	header("Location: inputCode.php");
}

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull_new;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

// verify Input Code
$stmt = $pdo->prepare("
						SELECT `surveyid` 
						FROM `survey` 
						WHERE `survey`.`surveyid` = $code"); 
$stmt->execute();

// if input code exists, save the surveyid to use later
if ($row = $stmt->fetch()) {
	$surveyid = $row['surveyid'];
} else {
	$message = "Error: Incorrect Input Code";
	header("Location: error.php?message= " . $message);
} 

// get planner for survey with the surveyid
$stmt = $pdo->prepare("
						SELECT `userid` 
						FROM `admin` 
						WHERE `admin`.`userid` IN 
											(SELECT `userid` 
											FROM `usersurvey` 
											WHERE `usersurvey`.`surveyid` = $surveyid) "); 
$stmt->execute();

// if found, save planner userid to use later, otherwise redirect to error page
if ($row = $stmt->fetch()) {
	$plannerUserid = $row['userid'];
}
else {
	$message = "Error: Don't have a planner set";
	header("Location: error.php?message= " . $message);
}

// check user email, set flag to keep for later (may be a new attendee, a planner, or a returning attendee)
$stmt = $pdo->prepare("
						SELECT `userid` 
						FROM `user` 
						WHERE `user`.`email` = '$email' "); 
$stmt->execute();

// if found
if ($row = $stmt->fetch()){
	$emailFound = true; 
	$userid = $row['userid'];

} else { 
	$emailFound = false; 
	$userid = " ";
}

// check answer
// - if yes - check userid against planner userid and save variables in SESSION to use later
if ($role == 'yes') {
	if ($userid == $plannerUserid) {
		$_SESSION['email'] = $email; 
		$_SESSION['userid'] = $userid; 
		$_SESSION['surveyid'] = $surveyid; 
		header ("Location: summary-results.php"); 
	} else {
		$message = "Error: You are not registered as the planner. Try Again";
		header("Location: error.php?message= " . $message);
	}
}

// if no - check userid against planner userid
if ($role == 'no') {
	if ($userid == $plannerUserid) {
		$message = "Error: You are registered as the planner. Try Again";
		header("Location: error.php?message= " . $message); 
	} else {

			// if not match, check if the email was found and save variables in SESSION to use later, otherwise insert new user
			if ($emailFound) {
				$_SESSION['email'] = $email; 
				$_SESSION['userid'] = $userid; 
				$_SESSION['surveyid'] = $surveyid; 
				header("Location: attendee_survey.php");
			} else {
				$stmt = $pdo->prepare("
										INSERT INTO `user` (`email`)
										VALUES ('$email') "); 
				$i = $stmt->execute();

			// check whether insert was successful, otherwise redirect to error page
			if ($i == 1) {

				// get the userid that was auto-generated and save in SESSION for later, otherwise redirect to error page
				$userid = $pdo->lastInsertId('userid'); 
				$_SESSION['email'] = $email; 
				$_SESSION['userid'] = $userid; 
				$_SESSION['surveyid'] = $surveyid;
				header ("Location: attendee_survey.php");
			} else {
				$message = "Error: Could not insert record in user";
				header("Location: error.php?message= " . $message); 
			}		
		}
	}
}

?>