<?php 

session_start();

$surveyid = $_SESSION['surveyid']; 

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull_new;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

// COUNT the dietary restrictions 
$stmt1 = $pdo->prepare("
                        SELECT COUNT(`userid`) AS diet, `value`, `bigImage` 
                        FROM `userdietary`
                        INNER JOIN `dietallergyvalue` ON `userdietary`.`dietaryRestrictionCode` = `dietallergyvalue`.`code`
                        WHERE `userdietary`.`surveyid` = $surveyid AND `dietallergyvalue`.`type` = 'D'
                        GROUP BY dietaryRestrictionCode");
$stmt1->execute();

// COUNT the allergies 
$stmt2 = $pdo->prepare("
                        SELECT COUNT(`userid`) AS allergy, `value`, `bigImage` 
                        FROM `userallergy`
                        INNER JOIN `dietallergyvalue` ON `userallergy`.`allergyCode` = `dietallergyvalue`.`code`
                        WHERE `userallergy`.`surveyid` = $surveyid AND `dietallergyvalue`.`type` = 'A'
                        GROUP BY allergyCode");
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

  <!-- plentyfull favicon -->
  <title>PlentyFull - Full Results</title>
</head>
<body>

  <div class="at">
    <ul>
      <a href="homepage.php" class="main-logo"><img src="images/logo-white.png" width="20%"></a>
      <!-- <li><a href="explore.php">Explore</a></li> -->
      <li><a href="inputCode.php">Input Code</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </div>

  <div class="container">
    <p class="start">Here's Your Results</p>

    <div class="dietallergySummary">
      <?php
      while ($row = $stmt1->fetch()) {
        ?>
        <div class="dietdivSummary">
          <img src="images/<?php echo($row['bigImage']); ?>" width="150px" alt="image" />
          <p class="result-label"><?php echo($row['diet']); ?></p>
          <p class="result-number"><?php echo($row['value']); ?></p>
        </div>
      <?php } ?>

       <?php
      while ($row = $stmt2->fetch()) {
        ?>
        <div class="allergydivSummary">
          <img src="images/<?php echo($row['bigImage']); ?>" width="150px" alt="image" />
          <p class="result-label"><?php echo($row['allergy']); ?></p>
          <p class="result-number"><?php echo($row['value']); ?></p>
        </div>
      <?php } ?>
    </div>

  

  <div class="allresults">
     <a href="full-results.php" class="one results-button">View All Results</a>
     <a href="recommendations.php" class="two results-button">See Recommendations</a>
  </div>


    


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
