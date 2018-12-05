<?php 

session_start();

$userid = $_GET['id']; 
$surveyid = $_SESSION['surveyid']; 

if($_SESSION['logged-in'] === false){
	echo("You are not allowed to view this page");
	?>
	<a href="login.html">Return to login page</a>
	<?php 

}

$dsn = "mysql:host=localhost;dbname=converyj_plentyfull_new;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

// SELECT user row in user table 
$stmt = $pdo->prepare("
						SELECT `firstName`, `lastName`, `email`, `comment`
						FROM `user` 
						INNER JOIN `comment` ON `user`.`userid` = `comment`.`userid`
						WHERE `user`.`userid` = $userid"); 
$stmt->execute();

$row = $stmt->fetch();

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

// SELECT user row in user table 
$stmt3 = $pdo->prepare("
						SELECT `image`, `greyImage`, `value`, `type`, `code`
						FROM `userdietary` 
						INNER JOIN `dietallergyvalue` ON `userdietary`.`dietaryRestrictionCode` = `dietallergyvalue`.`code`
						WHERE `userdietary`.`userid` = $userid
						AND `userdietary`.`surveyid` = $surveyid
						AND `dietallergyvalue`.`type` = 'D'"); 
$stmt3->execute();

// SELECT user row in user table 
$stmt4 = $pdo->prepare("
						SELECT `image`, `greyImage`, `value`, `type`, `code`
						FROM `userallergy` 
						INNER JOIN `dietallergyvalue` ON `userallergy`.`dietaryRestrictionCode` = `dietallergyvalue`.`code`
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
		<link rel="icon" href="IMMimages/favicon.ico" /> <!--plentyfull icon-->
	</head>
	<body>
		<a href="main-page.php"><img src="IMMimages/IMM-logo.jpg" alt="IMM logo" title="logo" width='100'></a> <!--plentyfull-->
		<nav>
		<ul>
			<li>
				<a href="about-pg.php">About</a></li>
			<li>
				<a href="explore.php">Explore</a> </li>
			<li>
				<a href="input-code.php">Input Code</a> </li>
			<li>
			<!-- if already logged in, change navigation  -->
			<?php 
			if ($_SESSION["logged-in"] == true) {
			?>
				<li>
					<a href="logout.php">Logout</a>
				</li>
				<li>
					<a href="login.php">Login</a>
				</li>
			<?php 
			}
			?> 
		</ul>
		</nav>
		<h1>Edit</h1>

		<form action="edit-update.php" method="POST">
			<p>First Name:<input type='text' name='firstName' value="<?php echo($row["firstName"]); ?>"/></p>
			<p>Last Name:<input type='text' name='lastName' value="<?php echo($row["lastName"]); ?>"/></p>
			<p>Email:<input type='email' name='email' value="<?php echo($row["email"]); ?>"/></p>
			<p>Other:<textarea id="other" name="comment"><?php echo($row['comment']); ?></textarea></p>
			<p>Dietary:</p>
			<div class="diet">
				<?php 
				$dietArray = []; 
				$numDiet = 0;
				$diet = $stmt3->fetchAll(PDO::FETCH_ASSOC);
				// while ($diet = $stmt3->fetch()) {
		  //       	echo("in diet loop");
		  //       	$numDiet++; 
		  //       	$dietArray[] = $diet['code']; 
		        
		        // spits out all the dietary images
		        while ($diets = $stmt1->fetch()) {
		        	?>
		        	<div class="dietdiv">
			        	<label for="<?php echo($diets['type']); ?><?php echo($diets['code']); ?>">
			        <?php
		        	// $found = false; 
		        	// for ($i = 0; $i<$dietArray.length; $i++) {
		        		if ($diet['code'] == $diets['code']) {
		        			$found = true; 
		        		?>
			            	<img src="images/<?php echo($diets['image']); ?>" class="image" alt="image" />
			            <?php
							return;  	
		        		}
		        	} 
		        	if ($found) {
		        	?>
		        		</label>
			        		<input type="checkbox" id="<?php echo($diets['type']); ?><?php echo($diets['code']); ?>" name="dietaryRestrictions[]" value="<?php echo($diets['code']); ?>" /><?php echo($diets['value']); ?>
			        	</div>
			        <?php
		        	} else {
		        	?>
		        		<img src="images/<?php echo($diets['greyImage']); ?>" class="image" alt="image" />
		        		</label>
			        		<input type="checkbox" id="<?php echo($diets['type']); ?><?php echo($diets['code']); ?>" name="dietaryRestrictions[]" value="<?php echo($diets['code']); ?>" /><?php echo($diets['value']); ?>
			        	</div>
			        <?php
		        	}
		        }  	
		        ?>

		       </div>
		      </p>
		      <p>
		        <label class="dietLabel">Allergies:</label>
		        <br />
		        <div class="allergy">
		        <?php
		        while ($allergy = $stmt2->fetch()) {
		        ?>
		        <div class="allergydiv">
		          <label for="<?php echo($allergy['type']); ?><?php echo($allergy['code']); ?>">
		            <img class="image img" src="images/<?php echo($allergy['greyImage']); ?>" alt="image" />
		            </label>
		            <input type="checkbox" id="<?php echo($allergy['type']); ?><?php echo($allergy['code']); ?>" name="allergies[]" value="<?php echo($allergy['code']); ?>"/><?php echo($allergy['value']); ?>
		        </div>
		       <?php } ?>
		     </div>
			<!-- <p>Allergies:
			<!-- <p>Other:<textarea name="other" cols="100" row="20"><?php echo($row["articleText"]); ?></textarea></p> -->
				<!-- need to make them IF stmts so they only appear if filled out -->

		
			<input type="submit" value="Update"/>
		</form>
		<p><a href="full-results.php">Go Back</a></p>
		<script src="js/main.js"></script>
</body>
</html>