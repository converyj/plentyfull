<?php 

session_start();

$userid = $_GET['id']; 
$surveyid = $_SESSION['surveyid']; 

if($_SESSION['logged-in'] === false){
	echo("You are not allowed to view this page");
	?>
	<a href="login-pg.html">Return to login page</a>
	<?php 

}

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
}

// DELETE user row in usersurvey table 
$stmt = $pdo->prepare("
						DELETE FROM 
						`comment` 
						WHERE `comment`.`userid` = $userid
						AND `comment`.`userid` IN 
										(SELECT `userid` 
										FROM `usersurvey` 
										WHERE `surveyid` = $surveyid); ")
$i = $stmt->execute();

// check whether delete was unsuccessfull (redirect to error page)
if ($i == 0) {
	$message = "Error: Could not delete the record in usersurvey";
	header("Location: error.php?message= " . $message);
}

// DELETE from admin table
// check whether delete was unsuccessfull (redirect to error page)
if ($i == 0) {
	$message = "Error: Could not delete the record in userdietary";
	header("Location: error.php?message= " . $message);
}

// DELETE user row in usersurvey table 
$stmt = $pdo->prepare("
						DELETE FROM 
						`admin` 
						WHERE `admin`.`userid` = $userid
						AND `admin`.`userid` IN 
										(SELECT `userid` 
										FROM `usersurvey` 
										WHERE `surveyid` = $surveyid); ")
$i = $stmt->execute();

// check whether delete was unsuccessfull (redirect to error page)
if ($i == 0) {
	$message = "Error: Could not delete the record in usersurvey";
	header("Location: error.php?message= " . $message);
}






