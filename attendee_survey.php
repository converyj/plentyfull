<?php 

session_start(); 

// get the userid from SESSION 
$userid = $_SESSION['userid'];

// SELECT user email 
$stmt = $pdo->prepare("
						SELECT `email` 
						FROM `user` 
						WHERE `user`.`id` = $userid"); 
$stmt->execute();

if ($row = $stmt->fetch()) {
	echo("Found"); { ?>
		<!-- HTML code -->
	<php> }
?>

