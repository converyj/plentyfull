<?php

session_start();

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull_new;charset=utf8mb4";
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
  <link rel="stylesheet" media="screen and (max-width: 640px)" href="css/small.css" />
  <link rel="icon" href="images/favicon.ico" />
  <title>PlentyFull - Home Page</title>
</head>
<body>
  <!-- <a href=""><img src="" alt="logo"></a> -->

<nav>
  <a href="#" id="main-logo"></a>
  <div class="at">
    <a href="#" id="menu-icon"></a>
      <ul>
  <!-- <a href="homepage.php" class="main-logo"><img src="images/logo-orange.png" width="20%"></a> -->
    <!-- <li><a href="explore.php">Explore</a></li> -->
          <li><a href="inputCode.php">Input Code</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="login.php">Login</a></li>
      </ul>
  </div>
</nav>


<div>
  <img  class="header" src="images/header.png">
</div>
<div class="intro">
  <font color= "f9dfc7"><p>You’re only here for the food,</font> <br>so let’s get it right.</p>
</div>

<form action="process_plannersurvey.php" method="POST">
  <div class="container">
      <p class="start"> Start Planning</p>
      <br />
      </label>
      <label>First Name</label><input class="surveyinputtext" type="text" name="firstName" /><br />
      <label>Last Name</label><input  class="surveyinputtext" type="text" name="lastName" /><br />
      <label>Email</label><input class="surveyinputemail" type="email" name="email" /><br />
      <label>City</label><input class="surveyinputtext" type="text" name="city" size="25" /><br />
      <label>Country</label><input class="surveyinputtext" type="text" name="country" size="25" /><br />
      <label>When would you like your results?</label><input type="date" class="dueDate" name="ddlDate" /><br />
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
      <input type="submit" class="button" value="Submit" />
  </form>
</div>
 <script src="js/main.js"></script>
</body>
<footer>
    <a href="mailto:info@plentyfull.com" class="email">info@plentyfull.com</a>
    <br />
    <a href="https://www.twitter.com/"><img src="images/twitter.png" width="30px" alt="twitter" /></a>
    <a href="https://www.facebook.com/"><img src="images/facebook.png" width="30px" alt="facebook" /></a>
    <a href="https://www.instagram.com/"><img src="images/ig.png" width="30px" alt="ins" /></a>



</footer>
</html>
