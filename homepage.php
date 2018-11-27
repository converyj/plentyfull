<?php

session_start();

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

// SELECT all the dietary images
$stmt1 = $pdo->prepare("
                        SELECT `greyImage`, `value`, `code`
                        FROM `dietallergyvalue`
                        WHERE `dietallergyvalue`.`type` = 'D'");
$stmt1->execute();

// SELECT all the allergy images
$stmt2 = $pdo->prepare("
                        SELECT `greyImage`, `value`, `code`
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
  <!-- <a href=""><img src="" alt="logo"></a> -->
<nav>
  <ul>
    <li><a href="explore.php">Explore</a></li>
    <li><a href="inputCode.php">Input Code</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</nav>

  <h1>Plenty Full</h1>
  <h2>You’re only here for the food, so let’s get it right.</h2>

<form action="process_plannersurvey.php" method="POST">
    Start Planning
    <br />
    </label>
    <label>First Name:</label><input type="text" name="firstName" /><br />
    <label>Last Name:</label><input type="text" name="lastName" /><br />
    <label>Email:</label><input type="email" name="email" /><br />
    <label>City:</label><input type="text" name="city" size="25" /><br />
    <label>Country:</label><input type="text" name="country" size="25" /><br />
    <!-- Address:<input type="text" name="address" /><br /> -->
    <label>When would you like your results?</label><input type="date" name="ddlDate" /><br />
    <p>
      <!-- make the checkboxes images  -->
      <label>Dietary Restrictions:</label>
      <br />
      <?php
      while ($row = $stmt1->fetch()) {
      ?>
        <label for="<?php echo($row['code']); ?>"><img src="images/<?php echo($row['greyImage']); ?>" alt="image" /></label><input type="checkbox" id="<?php echo($row['code']); ?>" name="dietaryRestrictions[]" value="<?php echo($row['code']); ?>" /><?php echo($row['value']); ?>
       <?php } ?>
    </p>
    <p>
      <!-- make the checkboxes images  -->
      <label>Allergies:</label>
      <br />
      <?php
      while ($row = $stmt2->fetch()) {
      ?>
        <label for="<?php echo($row['code']); ?>"><img src="images/<?php echo($row['greyImage']); ?>" alt="image" /></label><input type="checkbox" id="<?php echo($row['code']); ?>" name="allergies[]" value="<?php echo($row['code']); ?>" /><?php echo($row['value']); ?>

     <?php } ?>
    </p>
    <input type="submit" value="Submit" />
</form>
</body>
<footer>
  <a href="mailto:info@plentyfull.com">info@plentyfull.com</a>
  <br />
  <a href="https://www.instagram.com/"><img src="images/ig.png" alt="ins" /></a>
  <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="facebook" /></a>
  <a href="https://www.twitter.com/"><img src="images/twitter.png" alt="twitter" /></a>

</footer>
</html>
