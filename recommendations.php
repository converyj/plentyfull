<?php

session_start();

$surveyid = $_SESSION['surveyid'];

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

// SELECT all caterers with matching dietary and allergy results
$stmt3 = $pdo->prepare("
                        SELECT DISTINCT `caterer`.`catererid`, `caterer`.`image`, `city`, `link`, `streetName`, `name`, `price`, `description`
                        FROM `caterer`
                        LEFT OUTER JOIN `catererdietary` ON `caterer`.`catererid` = `catererdietary`.`catererid`
                        LEFT OUTER JOIN `catererallergy` ON `caterer`.`catererid` = `catererallergy`.`catererid`
                        WHERE `catererdietary`.`dietaryRestrictionCode` IN
                                                                            (SELECT `userdietary`.`dietaryRestrictionCode`
                                                                            FROM `userdietary`
                                                                            WHERE `surveyid` = $surveyid)
                        AND `catererallergy`.`allergyCode` IN
                                                               (SELECT `userallergy`.`allergyCode`
                                                               FROM `userallergy`
                                                               WHERE `surveyid` = $surveyid); ");
$stmt3->execute();

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
  <!-- plentyfull favicon -->
  <title>Plenty Full -  Recommendations </title>
</head>
<body>
  <!-- <a href=""><img src="" alt="logo"></a> -->
<div class="at">
  <ul>
  <a href="homepage.php" class="main-logo"><img src="images/logo-white.png" width="20%"></a>
    <!-- <li><a href="explore.php">Explore</a></li> -->
    <li><a href="inputCode.php">Input Code</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</div>

<!-- <div id="bar">
    <li>Discover</li>
    <li>Newest</li>
    <li>Popular</li>
    <li><input type="search" name="search" /><input type="submit" value="Search" /></li>
</div> -->
<div class="container">
<p>Filters:
    <div class="diet">
    <?php
    while ($row = $stmt1->fetch()) {
    ?>
    <div class="dietdiv-recommendations">
      <label for="<?php echo($row['type']); ?><?php echo($row['code']); ?>">
        <img src="images/<?php echo($row['greyImage']); ?>" width="2000%" class="image" alt="image" />
        </label>
        <input type="checkbox" id="<?php echo($row['type']); ?><?php echo($row['code']); ?>" name="dietaryRestrictions[]" value="<?php echo($row['code']); ?>" /><?php echo($row['value']); ?>
      </div>
     <?php } ?>

     <?php
    while ($row = $stmt2->fetch()) {
    ?>
    <div class="allergydiv-recommendations">
      <label for="<?php echo($row['type']); ?><?php echo($row['code']); ?>">
        <img class="image img" src="images/<?php echo($row['greyImage']); ?>" width="2000%" alt="image" />
      </label>
        <input type="checkbox" id="<?php echo($row['type']); ?><?php echo($row['code']); ?>" name="allergies[]" value="<?php echo($row['code']); 
        ?>"/><?php echo($row['value']); ?>
    </div>
   <?php } ?>
   </div>

</p>
<div class="caterers">
    <?php
    while ($row = $stmt3->fetch()) {
    ?>
    <img class="catererImage" src="images/<?php echo($row['image']); ?>" alt="image" />
    <div class="catererdiv">
      <p><?php echo($row['name']); ?></p>
      <p><?php echo($row['price']); ?></p>
      <p class="restaurantDescription"><?php echo($row['description']); ?></p>
      <p><?php echo($row['link']); ?></p>
      <p><?php echo($row['streetName']); ?></p>
      <p><?php echo($row['city']); ?></p>
      <?php
      $catererid = $row['catererid'];
      getCatererDetails($pdo, $catererid);
      ?>
      <br>
    </div>
   <?php } ?>
 </div>
</body>
<footer>
  <a href="mailto:info@plentyfull.com" class="email">info@plentyfull.com</a>
  <br />
  <a href="https://www.instagram.com/"><img src="images/ig.png" width="30px" alt="ins" /></a>
  <a href="https://www.facebook.com/"><img src="images/facebook.png" width="30px" alt="facebook" /></a>
  <a href="https://www.twitter.com/"><img src="images/twitter.png" width="30px" alt="twitter" /></a>
</footer>
</div>
</html>

<?php
function getCatererDetails($pdo, $catererid) {

  // SELECT all dietary restrictions for the user
  $stmt1 = $pdo->prepare("
                          SELECT `dietallergyvalue`.`image`
                          FROM `catererdietary`
                          INNER JOIN `dietallergyvalue` ON `catererdietary`.`dietaryRestrictionCode` = `dietallergyvalue`.`code`
                          WHERE `catererdietary`.`catererid` = $catererid
                          AND `dietallergyvalue`.`type` = 'D'");
  $stmt1->execute();

  // SELECT all allergies for the user
  $stmt2 = $pdo->prepare("
                          SELECT `dietallergyvalue`.`image`
                          FROM `catererallergy`
                          INNER JOIN `dietallergyvalue` ON `catererallergy`.`allergyCode` = `dietallergyvalue`.`code`
                          WHERE `catererallergy`.`catererid` = $catererid
                          AND `dietallergyvalue`.`type` = 'A'");
  $stmt2->execute();

  // display dietary images
  while ($row1 = $stmt1->fetch()) {
  ?>
    <img src="images/<?php echo($row1['image']); ?>" width="5%" alt="image" />
  <?php
  }

  // display allergy images
  while ($row2 = $stmt2->fetch()) {
  ?>
    <img src="images/<?php echo($row2['image']); ?>" width="5%" alt="image" />
  <?php
  }
}
?>
<br>
