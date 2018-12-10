<?php

session_start();

$userid = $_GET['id'];
$surveyid = $_SESSION['surveyid'];

if (isset($_SESSION['logged-in'])) {
	if($_SESSION['logged-in'] === false){
		echo("You are not allowed to view this page");
	?>
	<a href="login.html">Return to login page</a>
	<?php
	}
}


$dsn = "mysql:host=localhost;dbname=converyj_plentyfull_new;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

// SELECT user row in user table
$stmt = $pdo->prepare("
						SELECT `firstName`, `lastName`, `email`, `comment`
						FROM `user`
						LEFT OUTER JOIN `comment` ON `user`.`userid` = `comment`.`userid`
						WHERE `user`.`userid` = $userid");
$stmt->execute();

$row = $stmt->fetch();

// SELECT all the dietary images
$stmt1 = $pdo->prepare("
                        SELECT `image`, `greyImage`, `value`, `code`, `type`
                        FROM `dietallergyvalue`
                        WHERE `dietallergyvalue`.`type` = 'D'");
$stmt1->execute();

// SELECT all the allergy images
$stmt2 = $pdo->prepare("
                        SELECT `image`, `greyImage`, `value`, `code`, `type`
                        FROM `dietallergyvalue`
                        WHERE `dietallergyvalue`.`type` = 'A'");
$stmt2->execute();

// SELECT user row in user table
$stmt3 = $pdo->prepare("
						SELECT `code`
						FROM `userdietary`
						INNER JOIN `dietallergyvalue` ON `userdietary`.`dietaryRestrictionCode` = `dietallergyvalue`.`code`
						WHERE `userdietary`.`userid` = $userid
						AND `userdietary`.`surveyid` = $surveyid
						AND `dietallergyvalue`.`type` = 'D'");
$stmt3->execute();

// SELECT user row in user table
$stmt4 = $pdo->prepare("
						SELECT `code`
						FROM `userallergy`
						INNER JOIN `dietallergyvalue` ON `userallergy`.`allergyCode` = `dietallergyvalue`.`code`
						WHERE `userallergy`.`userid` = $userid
						AND `userallergy`.`surveyid` = $surveyid
						AND `dietallergyvalue`.`type` = 'A'");
$stmt4->execute();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Full Results</title>
				<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="css/main3forOrange.css">
  <link rel="stylesheet" media="screen and (max-width: 640px)" href="css/small.css" />
  <link rel="icon" href="images/favicon.ico" />
  <title>PlentyFull - Home Page</title>
</head>
<body>

	<nav>
	    <a href="homepage.php" id="main-logo"></a>
	      <div class="at">
	        <a href="#" id="menu-icon"></a>

	        <ul>
	  <!-- <a href="homepage.php" class="main-logo"><img src="images/logo-white.png" width="20%"></a> -->
	    <!-- <li><a href="explore.php">Explore</a></li> -->
	          <li><a href="inputCode.php">Input Code</a></li>
	          <li><a href="about.php">About</a></li>
	        </ul>
	      </div>
	</nav>

  <div class="container">
		<p class ="start">Edit</p>

		<form action="edit-update.php" method="POST">
			<input type="hidden" name="id" value="<?php echo($userid); ?>" />
			<label>First Name</label><input class="surveyinputtext" type='text' name='firstName' value="<?php echo($row['firstName']); ?>" disabled /><br>
			<labe>Last Name</labe><input class="surveyinputtext" type='text' name='lastName' value="<?php echo($row['lastName']); ?>" disabled /><br>
			<label>Email</label><input class="surveyinputtext" type='email' name='email' value="<?php echo($row['email']); ?>" disabled /><br><br>
			<label>Other</label><textarea id="other" name="comment"><?php echo($row['comment']); ?></textarea><br>
			<p>Dietary</p>
			<div class="diet">
				<?php
				// fetch all diet restrictions for user and store in array
				$diet = $stmt3->fetchAll(PDO::FETCH_ASSOC);

		        // fetches all the dietary images
		        while ($diets = $stmt1->fetch()) {
		        ?>
		        	<div class="dietdiv">
			        	<label for="<?php echo($diets['type']); ?><?php echo($diets['code']); ?>">
			        <?php
			        // set flag to use when matched
			        $found = false;
			        // loop through the user diet array
			         foreach ($diet as $restriction) {
			         	// if the diet in array matches to the diet in dietallergyvalue table, set flag and display orange image
		        		if ($restriction['code'] == $diets['code']) {
		        			$found = true;
		      				?>
		            		<img src="images/<?php echo($diets['image']); ?>" class="image" alt="image" />
		            		</label>
			        		<input type="checkbox" id="<?php echo($diets['type']); ?><?php echo($diets['code']); ?>" name="dietaryRestrictions[]" value="<?php echo($diets['code']); ?>" checked /><?php echo($diets['value']); ?>
			        	</div>
		            	<?php
		        		}
		        	}
		        	// if not found, display grey image
		        	if (!$found) {
		        	?>
		        		<img src="images/<?php echo($diets['greyImage']); ?>" class="image" alt="image" />
		        		</label>
			        		<input type="checkbox" id="<?php echo($diets['type']); ?><?php echo($diets['code']); ?>" name="dietaryRestrictions[]" value="<?php echo($diets['code']); ?>" unchecked /><?php echo($diets['value']); ?>
			        	</div>
			        <?php
		        	}
		        }
		       	?>
		    </div>
		      </p>
		      <p>
		        <label class="dietLabel">Allergies</label>
		        <br />
		        <div class="allergy">
		        <?php
		        // fetch all allergy restrictions for user and store in array
				$allergy = $stmt4->fetchAll(PDO::FETCH_ASSOC);

		        // fetches all the allergy images
		        while ($allergies = $stmt2->fetch()) {
		        ?>
		        	<div class="allergydiv">
			        	<label for="<?php echo($allergies['type']); ?><?php echo($allergies['code']); ?>">
			        <?php
			        // set flag to use when matched
			        $found = false;
			        // loop through the user allergy array
			         foreach ($allergy as $restriction) {
			         	// if the allergy in array matches to the allergy in dietallergyvalue table, set flag and display orange image
		        		if ($restriction['code'] == $allergies['code']) {
		        			$found = true;
		      				?>
		            		<img src="images/<?php echo($allergies['image']); ?>" class="image" alt="image" />
		            		</label>
			        		<input type="checkbox" id="<?php echo($allergies['type']); ?><?php echo($allergies['code']); ?>" name="allergies[]" value="<?php echo($allergies['code']); ?>" checked /><?php echo($allergies['value']); ?>
			        	</div>
		            	<?php
		        		}
		        	}
		        	// if not found, display grey image
		        	if (!$found) {
		        	?>
		        		<img src="images/<?php echo($allergies['greyImage']); ?>" class="image" alt="image" />
		        		</label>
			        		<input type="checkbox" id="<?php echo($allergies['type']); ?><?php echo($allergies['code']); ?>" name="allergies[]" value="<?php echo($allergies['code']); ?>" unchecked /><?php echo($allergies['value']); ?>
			        	</div>
			        <?php
			   		}
		        }
		       	?>
		     </div>
			<input type="submit" class="button" value="Update"/>
		</form>
		<p><a href="full-results.php">Go Back</a></p>
		<script src="js/main.js"></script>
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
