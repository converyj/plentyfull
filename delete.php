<?php 

session_start();

// if role is not a planner, redirect to homepage
if ($_SESSION['role'] != 1) {
  header("Location: homepage.php"); 
  exit();
}

// get the surveyid and the userid
$userid = $_GET['id']; 
$surveyid = $_SESSION['surveyid']; 


$dsn = "mysql:host=localhost;dbname=converyj_plentyfull_new;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

// DELETE user row in usersurvey table 
$stmt = $pdo->prepare("
						DELETE FROM 
						`usersurvey` 
						WHERE `usersurvey`.`userid` = $userid
						AND `usersurvey`.`surveyid` = $surveyid"); 
$i = $stmt->execute();

// check whether delete was unsuccessfull (redirect to error page)
if ($i == 0) {
	$message = "Error: Could not delete the record in usersurvey";
	header("Location: error.php?message= " . $message);
  	exit();
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
	$message = "Error: Could not delete the record in userallergy";
	header("Location: error.php?message= " . $message);
  	exit();
}

// DELETE user row in userdietary table 
$stmt = $pdo->prepare("
						DELETE FROM 
						`userdietary` 
						WHERE `userdietary`.`userid` = $userid
						AND `userdietary`.`surveyid` = $surveyid"); 
$i = $stmt->execute();

// check whether delete was unsuccessfull (redirect to error page)
if ($i == 0) {
	$message = "Error: Could not delete the record in userdietary";
	header("Location: error.php?message= " . $message);
  	exit();
}

// DELETE user row in comment table 
$stmt = $pdo->prepare("
						DELETE FROM 
						`comment` 
						WHERE `comment`.`userid` = $userid");
$i = $stmt->execute();

// check whether delete was unsuccessfull (redirect to error page)
if ($i == 0) {
	$message = "Error: Could not delete the record in usersurvey";
	header("Location: error.php?message= " . $message);
  	exit();
}

// DELETE user row in usersurvey table 
$stmt = $pdo->prepare("
						DELETE FROM 
						`admin` 
						WHERE `admin`.`userid` = $userid
						AND `admin`.`userid` IN 
										(SELECT `userid` 
										FROM `usersurvey` 
										WHERE `surveyid` = $surveyid); ");
$i = $stmt->execute();

// check whether delete was unsuccessfull (redirect to error page)
if ($i == 1) {
	header("Location: full-results.php"); 
  	exit();
} else {
	$message = "Error: Could not delete the record in admin";
	header("Location: error.php?message= " . $message);
  	exit();
}