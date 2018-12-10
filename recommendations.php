<?php

session_start();

// if not logged in and is not a planner, go to homepage 
if (isset($_SESSION['logged-in'])) {
  if($_SESSION['logged-in'] == false && $_SESSION['role'] != 1) {
     echo("You are not allowed to view this page");
    ?>
    <a href="homepage.html">Return to homepage</a>
    <?php 
  }
}

$surveyid = $_SESSION['surveyid'];

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull_new;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

// SELECT all the dietary images
$stmt1 = $pdo->prepare("
                        SELECT `greyImage`, `image`, `value`, `code`, `type`
                        FROM `dietallergyvalue`
                        WHERE `dietallergyvalue`.`type` = 'D'");
$stmt1->execute();

// SELECT all the allergy images
$stmt2 = $pdo->prepare("
                        SELECT `greyImage`, `image`, `value`, `code`, `type`
                        FROM `dietallergyvalue`
                        WHERE `dietallergyvalue`.`type` = 'A'");
$stmt2->execute();

// SELECT all caterers with matching dietary and allergy results from survey
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

// SELECT all diet restrictions from survey results
$stmt4 = $pdo->prepare("
                        SELECT DISTINCT `code`
                        FROM `userdietary`
                        INNER JOIN `dietallergyvalue` ON `userdietary`.`dietaryRestrictionCode` = `dietallergyvalue`.`code`
                        WHERE `userdietary`.`surveyid` = $surveyid
                        AND `dietallergyvalue`.`type` = 'D'");
$stmt4->execute();

// SELECT all allergy restrictions from survey results
$stmt5 = $pdo->prepare("
                        SELECT DISTINCT `code`
                        FROM `userallergy`
                        INNER JOIN `dietallergyvalue` ON `userallergy`.`allergyCode` = `dietallergyvalue`.`code`
                        WHERE `userallergy`.`surveyid` = $surveyid
                        AND `dietallergyvalue`.`type` = 'A'");
$stmt5->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css/main3forOrange.css">
  <link rel="stylesheet" media="screen and (max-width: 640px)" href="css/small.css" />
  <title>Plenty Full -  Recommendations </title>
</head>
<body>
<nav>
  <a href="homepage.php" id="main-logo"></a>

      <div class="at">
        <a href="#" id="menu-icon"></a>
          <ul>
            <li><a href="inputCode.php">Input Code</a></li>
            <li><a href="about.php">About</a></li>
            <!-- if already logged in, change navigation  -->
            <?php 
            if (isset($_SESSION['logged-in'])) {
              if (($_SESSION['logged-in']) == true) {
              ?>
                <li>
                  <a href="logout.php">Logout</a>
                </li>
              <?php 
              }
            }
              ?>
          </ul>
      </div>
</nav>

<!-- <div id="bar">
    <li>Discover</li>
    <li>Newest</li>
    <li>Popular</li>
    <li><input type="search" name="search" /><input type="submit" value="Search" /></li>
</div> -->
<div class="container">
<p>
  <br>
    <div class="diet">
    <?php
    // fetch all diet restrictions for survey and store in array
    $diet = $stmt4->fetchAll(PDO::FETCH_ASSOC);

    // fetches all the dietary images
    while ($diets = $stmt1->fetch()) {
    ?>
    <div class="dietdiv-recommendations">
      <label for="<?php echo($diets['type']); ?><?php echo($diets['code']); ?>">
        <?php
              // set flag to use when matched
              $found = false;
              // loop through the survey diet array
               foreach ($diet as $restriction) {
                // if the diet in array matches to the diet in dietallergyvalue table, set flag and display orange image
                if ($restriction['code'] == $diets['code']) {
                  $found = true;
                  ?>
                    <img src="images/<?php echo($diets['image']); ?>" class="image" alt="image" />
                    </label>
                  <input type="checkbox" id="<?php echo($diets['type']); ?><?php echo($diets['code']); ?>" name="dietaryRestrictions[]" value="<?php echo($diets['code']); ?>" /><?php echo($diets['value']); ?>
                </div>
                  <?php
                }
              }
              // if not found, display grey image
              if (!$found) {
              ?>
                <img src="images/<?php echo($diets['greyImage']); ?>" class="image" alt="image" />
                </label>
                  <input type="checkbox" id="<?php echo($diets['type']); ?><?php echo($diets['code']); ?>" name="dietaryRestrictions[]" value="<?php echo($diets['code']); ?>" /><?php echo($diets['value']); ?>
                </div>
              <?php
              }
            }
            ?>

     <?php
      // fetch all allergies for survey and store in array
    $allergy = $stmt5->fetchAll(PDO::FETCH_ASSOC);
    // fetches all the allergy images
    while ($allergies = $stmt2->fetch()) {
    ?>
    <div class="allergydiv-recommendations">
      <label for="<?php echo($allergies['type']); ?><?php echo($allergies['code']); ?>">
        <?php
              // set flag to use when matched
              $found = false;
              // loop through the survey allergy array
               foreach ($allergy as $restriction) {
                  // if the allergy in array matches to the allergy in dietallergyvalue table, set flag and display orange image
                  if ($restriction['code'] == $allergies['code']) {
                    $found = true;
                    ?>
                      <img src="images/<?php echo($allergies['image']); ?>" class="image" alt="image" />
                      </label>
                    <input type="checkbox" id="<?php echo($allergies['type']); ?><?php echo($allergies['code']); ?>" name="allergies[]" value="<?php echo($diets['code']); ?>" /><?php echo($allergies['value']); ?>
                  </div>
                    <?php
                  }
                }
              // if not found, display grey image
              if (!$found) {
              ?>
                <img src="images/<?php echo($allergies['greyImage']); ?>" class="image" alt="image" />
                </label>
                  <input type="checkbox" id="<?php echo($allergies['type']); ?><?php echo($allergies['code']); ?>" name="allergies[]" value="<?php echo($allergies['code']); ?>" /><?php echo($diets['value']); ?>
                </div>
              <?php
              }
            }
            ?>
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
<script src="js/main.js"></script>
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
