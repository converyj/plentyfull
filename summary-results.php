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

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="css/main2.css">

  <!-- plentyfull favicon -->
  <title>Plenty Full - Full Results</title>
</head>
<body>
		
<div class="at">
  <ul>
  <a href="homepage.php" class="main-logo"><img src="images/logo-white.png" width="20%"></a>
    <li><a href="explore.php">Explore</a></li>
    <li><a href="inputCode.php">Input Code</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</div>

<div class="container">
		<p class="start">Here's Your Results</p>


<p>
        <!-- make the checkboxes images  -->
        <br />
        <div class="diet">
        <?php
        while ($row = $stmt1->fetch()) {
        ?>
        <div class="dietdiv">
          <label for="<?php echo($row['code']); ?>">
            <img src="images/<?php echo($row['bigImage']); ?>" class="image" alt="image" />
            </label>
            <input type="checkbox" id="<?php echo($row['code']); ?>" name="dietaryRestrictions[]" value="<?php echo($row['code']); ?>" /><?php echo($row['value']); ?>
          </div>
         <?php } ?>
       </div>
      </p>


<a href="full-results.php" class="results-button">View All Results</a>


<p><a href="explore-recom.php">See Recommendations</a></p>


</div>
 <script src="js/main.js"></script>
</body>
<footer> 
    <a href="mailto:info@plentyfull.com" class="email">info@plentyfull.com</a>
    <br />
    <a href="https://www.twitter.com/"><img src="images/twitter.png" width="3%" alt="twitter" /></a>
    <a href="https://www.facebook.com/"><img src="images/facebook.png" width="3%" alt="facebook" /></a>
    <a href="https://www.instagram.com/"><img src="images/ig.png" width="3%" alt="ins" /></a>
</footer>
</html>
