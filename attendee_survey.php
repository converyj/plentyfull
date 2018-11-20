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
	<!-- Add website favicon -->
  <title>Plenty Full - Attendee Survey</title>
</head>
<body>
  <nav>
	  <!--  not proper <ul><li> -->
	  <!-- plentyfull link on nav -->
	  <a href="explore.php">Explore</a> 
	  <a href="process_inputcode.php">Input Code</a> 
	  <a href="about.php">About</a> 
	  <a href="login.php">Login</a>
</nav>
  <h1>Just a few questions...</h1>
  <h2>Your going to an event! Lets make sure there’s lot’s to eat for you.</h2>

<form action="process_attendeesurvey.php" method="POST">
  <fieldset>
    First Name:<input type="text" name="firstName" /><br />
    Last Name:<input type="text" name="lastName" /><br />
    Email:<input type="email" name="email" value="<?php echo($email);?>" /><br />
    <p>
      Dietary Restrictions:
      <br />
      <?php 
      while ($row = $stmt1->fetch()) {
      ?>
        <input type="checkbox" name="dietaryRestrictions[]" value="<?php echo($row['code']); ?>" /><?php echo($row['value']); ?> <?php echo($row['image']); ?>
      <?php } ?>
    </p>
    <p>
      Allergies:
      <br />
      <?php
      while ($row = $stmt2->fetch()) {
      ?>
        <input type="checkbox" name="allergies[]" value="<?php echo($row['code']); ?>" /><?php echo($row['value']); ?> <?php echo($row['image']); ?>
     <?php } ?>
    </p>
    <p>
      Other:
      <br />
      <textarea id="other"></textarea>
    </p>
    <input type="submit" value="Submit" />
  </fieldset>
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


