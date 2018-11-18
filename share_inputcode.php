<?php 

session_start(); 

// get the surveyid from SESSION to concatenate to link
$surveyid = $_SESSION['surveyid'];

// build link by concatenating the surveyid (Concatenate surveyid in HTML document or put in variable)
$link = 'www.plentyfull.com/' . $surveyid; 

?>

<!-- HTML code -->