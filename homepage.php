<?php

session_start(); 

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

// SELECT all the dietary images 
$stmt1 = $pdo->prepare("
                        SELECT `image`, `value`, `code`
                        FROM `dietallergyvalue`
                        WHERE `dietallergyvalue`.`type` = 'D'"); 
$stmt1->execute();

// SELECT all the allergy images 
$stmt2 = $pdo->prepare("
                        SELECT `image`, `value`, `code`
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
  <!-- plentyfull favicon -->
  <title>Plenty Full - Home Page</title>
</head>
<body>
    <nav>
     <!--  not proper <ul><li> -->
      <a href="explore.php">Explore</a> 
      <a href="inputCode.php">Input Code</a> 
      <a href="about.php">About</a> 
      <a href="login.php">Login</a>
  </nav>
  <h1>Plenty Full</h1>
  <h2>You’re only here for the food, so let’s get it right.</h2>

<form action="process_plannersurvey.php" method="POST">
    Start Planning
    <br />
    First Name:<input type="text" name="firstName" /><br />
    Last Name:<input type="text" name="lastName" /><br />
    Email:<input type="email" name="email" /><br />
  <fieldset>
      <legend>Address</legend>
        Street:<input type="text" name="street" size="25" /><br />
        City:<input type="text" name="city" size="25" /><br />
        Country:<input type="text" name="country" size="25" />
        Postal Code:<input type="text" name="postal" size="6" /><br />
  </fieldset> 
    
    <!-- Address:<input type="text" name="address" /><br /> -->
    When would you like your results?<input type="date" name="ddlDate" /><br />
    <p>
      <!-- make the checkboxes images  -->
      Dietary Restrictions: 
      <br />
      <?php 
      while ($row = $stmt1->fetch()) {
      ?>
        <input type="checkbox" name="dietaryRestrictions[]" value="<?php echo($row['code']); ?>" /><?php echo($row['value']); ?> <?php echo($row['image']); ?>
      <?php } ?>
    </p>
    <p>
      <!-- make the checkboxes images  -->
      Allergies:
      <br />
      <?php
      while ($row = $stmt2->fetch()) {
      ?>
        <input type="checkbox" name="allergies[]" value="<?php echo($row['code']); ?>" /><?php echo($row['value']); ?> <?php echo($row['image']); ?>
     <?php } ?>
    </p>
    <input type="submit" value="Submit" />
</form>
</body>
<footer>
  <a href="mailto:info@plentyfull.com">info@plentyfull.com</a>
  <br />
  <a href="https://www.instagram.com/"><img src="images/instagram.png" alt="ins" /></a>
  <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="facebook" /></a>
  <a href="https://www.twitter.com/"><img src="images/twitter.png" alt="twitter" /></a>

</footer>
</html>
