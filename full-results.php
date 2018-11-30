<?php 
session_start();
$dsn = "mysql:host=localhost;dbname=converyj_plentyfull;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

// SELECT all users (this is attendees right?)
$stmt = $pdo->prepare("
                        SELECT `userid`, `firstName`, `lastName`, `email`
                        FROM `user`");
$stmt->execute();

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

// SELECT comments
// $stmt3 = $pdo->prepare("
//                         SELECT `userid`, `comment`
//                         FROM `comment` ");
// $stmt3->execute();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" type="text/css" href="css/main2.css"> -->

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
		<p class="start">Full Results</p>

<?php
      //show records (process results)
      while($row = $stmt->fetch()) {     
        //echo($row["email"]); //or $row[0];
        ?><div>
          <a href="edit.php">Edit</a></span>
          <a href="delete.php">Delete</a></span>
          <p>First Name: <?php echo($row["firstName"]); ?></p>
          <p>Last Name: <?php echo($row["lastName"]); ?></p>
          <p>Email: <?php echo($row["email"]); ?></p>
          <?php } ?>
      
<?php
      while($row = $stmt1->fetch()) {
        ?>
         <p>Dietary:</p>
           <div class="dietdiv">
          <label for="<?php echo($row['code']); ?>">
            <img src="images/<?php echo($row['image']); ?>" class="image" alt="image" />
            </label>
      <?php } ?>
<?php
      while($row = $stmt2->fetch()) {
        ?>
         <p>Allergens:</p>
           <div class="dietdiv">
          <label for="<?php echo($row['code']); ?>">
            <img src="images/<?php echo($row['image']); ?>" class="image" alt="image" />
            </label>
       <?php } ?>



        </div>
      
      <br>

<!-- need to find the wasim notes that showed a list of everyone's info pulled from the database -->

   <!--    <form action="confirm-update.php" method="POST">  
  
  <p>id: <?php echo($row["id"]); ?></p>
  <input type="hidden" value="<?php echo($row["id"]); ?>" name="id"/>
  <p>First Name: <input type='text' name='firstName' value="<?php echo($row["firstName"]); ?>"/></p>
  <p>Last Name: <input type='text' name='lastName' value="<?php echo($row["lastName"]); ?>"/></p>
  <p>email: <input type='text' name='email' value="<?php echo($row["email"]); ?>"/></p>
  <p>Date of Birth: <input type='text' name='dob' value="<?php echo($row["dob"]); ?>"/></p>
  <input type='submit'/> 
</form>
 -->

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