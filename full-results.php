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

// SELECT all users from survey
$stmt = $pdo->prepare("
                        SELECT `userid`, `firstName`, `lastName`, `email`
                        FROM `user`
                        WHERE `user`.`userid` IN
                                                  (SELECT `userid`
                                                  FROM `usersurvey`
                                                  WHERE `usersurvey`.`surveyid` = $surveyid); ");
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/main3forOrange.css">
  <link rel="stylesheet" media="screen and (max-width: 640px)" href="css/small.css" />
  <link rel="icon" href="images/favicon.ico" />
  <title>Plenty Full - Full Results</title>
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
              ?>
                <li>
                  <a href="logout.php">Logout</a>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
      </nav>
  <div class="container">
    <p class="start">Full Results</p>
  <div class="survey-people">
        <?php
        //show results for each user in the survey
        while($row = $stmt->fetch()) {
        ?>
          <div>
            <a class="edit-delete" href="edit.php?id=<?php echo($row["userid"]); ?>">Edit</a></span>
            <a class="edit-delete" href="delete.php?id=<?php echo($row["userid"]); ?>">Delete</a></span>
            <p>First Name: <?php echo($row["firstName"]); ?></p>
            <p>Last Name: <?php echo($row["lastName"]); ?></p>
            <p>Email: <?php echo($row["email"]); ?></p>
            <?php
            $userid = $row['userid'];

            // call function to get user details
            getUserDetails($pdo, $surveyid, $userid);
            ?>
            <br>
          </div>
        <?php
        }
        ?>
  </div>
      <a href="summary-results.php" class="buttonBack">Back</a>
  
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

<?php
function getUserDetails($pdo, $surveyid, $userid) {

  // SELECT all dietary restrictions for the user
  $stmt1 = $pdo->prepare("
                          SELECT `value`
                          FROM `userdietary`
                          INNER JOIN `dietallergyvalue` ON `userdietary`.`dietaryRestrictionCode` = `dietallergyvalue`.`code`
                          WHERE `userdietary`.`surveyid` = $surveyid
                          AND `userdietary`.`userid` = $userid
                          AND `dietallergyvalue`.`type` = 'D'");
  $stmt1->execute();

  // SELECT all allergies for the user
  $stmt2 = $pdo->prepare("
                          SELECT `value`
                          FROM `userallergy`
                          INNER JOIN `dietallergyvalue` ON `userallergy`.`allergyCode` = `dietallergyvalue`.`code`
                          WHERE `userallergy`.`surveyid` = $surveyid
                          AND `userallergy`.`userid` = $userid
                          AND `dietallergyvalue`.`type` = 'A'");
  $stmt2->execute();

  // SELECT comments for the user
  $stmt3 = $pdo->prepare("
                          SELECT `comment`
                          FROM `comment`
                          WHERE `comment`.`userid` = $userid");
  $stmt3->execute();

  // display dietary details
  $numRows = 0;
  while ($row1 = $stmt1->fetch()) {
    if ($numRows == 0) {
    ?>
      <p>Dietary:
    <?php
    }
    $numRows++;
    echo($row1['value']) . " ";
  }
  ?>
    </p>

  <?php

  // display allergy details
  $numRows = 0;
  while ($row2 = $stmt2->fetch()) {
    if ($numRows == 0) {
    ?>
      <p>Allergy:
    <?php
    }
    $numRows++;
    echo($row2['value']) . " ";
  }
  ?>
    </p>

  <?php

  // display comments
  if ($row3 = $stmt3->fetch()) {
  ?>
    <p>Other: <?php echo($row3['comment']); ?></p>
  <?php
  }
}
?>
</div>
