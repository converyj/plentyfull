<?php

session_start();

// get the email from SESSION
$email = $_SESSION['email'];

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

// SELECT all the dietary images
$stmt1 = $pdo->prepare("
                        SELECT `greyImage`, `value`, `code`, `type`
                        FROM `dietallergyvalue`
                        WHERE `dietallergyvalue`.`type` = 'D'");
$stmt1->execute();

// SELECT all the allergy images
$stmt2 = $pdo->prepare("
                        SELECT `greyImage`, `value`, `code`, `type`
                        FROM `dietallergyvalue`
                        WHERE `dietallergyvalue`.`type` = 'A'");
$stmt2->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="css/main2.css">

	<!-- Add website favicon -->
  <title>PlentyFull - Attendee Survey</title>
</head>
<body>
  <!-- <a href=""><img src="" alt="logo"></a> -->
<nav>
  <div class="at">
  <ul>
  <a href="homepage.php" class="main-logo"><img src="images/logo-white.png" width="20%"></a>
    <li><a href="explore.php">Explore</a></li>
    <li><a href="inputCode.php">Input Code</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</div>
</nav>
<div class="container">
  <p class="start">Just a few questions...</p>
  <p class="paragraph">You're going to an event! Let's make sure there’s lot’s to eat for you.</p>

<form action="process_attendeesurvey.php" method="POST">
  <fieldset>
    First Name:<input class="surveyinputtext" type="text" name="firstName" /><br />
    Last Name:<input class="surveyinputtext" type="text" name="lastName" /><br />
    Email:<input class="surveyinputemail" type="email" name="email" value="<?php echo($email);?>" /><br />
    <p>
      <label class="dietLabel">Dietary Restrictions:</label>
        <br />
        <div class="diet">
        <?php
        while ($row = $stmt1->fetch()) {
        ?>
        <div class="dietdiv">
          <label for="<?php echo($row['type']); ?><?php echo($row['code']); ?>">
            <img src="images/<?php echo($row['greyImage']); ?>" class="image" alt="image" />
            </label>
            <input type="checkbox" id="<?php echo($row['type']); ?><?php echo($row['code']); ?>" name="dietaryRestrictions[]" value="<?php echo($row['code']); ?>" /><?php echo($row['value']); ?>
          </div>
         <?php } ?>
       </div>
      </p>
      <p>
      <label class="dietLabel">Allergies:</label>
        <br />
        <div class="allergy">
        <?php
        while ($row = $stmt2->fetch()) {
        ?>
        <div class="allergydiv">
          <label for="<?php echo($row['type']); ?><?php echo($row['code']); ?>">
            <img class="image img" src="images/<?php echo($row['greyImage']); ?>" alt="image" />
          </label>
            <input type="checkbox" id="<?php echo($row['type']); ?><?php echo($row['code']); ?>" name="allergies[]" value="<?php echo($row['code']); ?>"/><?php echo($row['value']); ?>
        </div>
       <?php } ?>
     </div>
    </p>
    <p>
    Other:

      <textarea id="other" name="comment"></textarea>
    </p>
    <input type="submit" class="button" value="Submit" />
  </fieldset>
</form>
 <script src="js/main.js"></script>
</div>
</body>
<footer>
  <a href="mailto:info@plentyfull.com" class="email">info@plentyfull.com</a>
  <br />
  <a href="https://www.twitter.com/"><img src="images/twitter.png" width="3%" alt="twitter" /></a>
  <a href="https://www.facebook.com/"><img src="images/facebook.png" width="3%" alt="facebook" /></a>
  <a href="https://www.instagram.com/"><img src="images/ig.png" width="3%" alt="ins" /></a>


</footer>
</html>
