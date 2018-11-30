<?php 
session_start();

$articleId = $_GET['articleId']; //change

if($_SESSION['logged-in'] === false){
	echo("You are not allowed to view this page");
	?>
	<a href="login-pg.html">Return to login page</a>
	<?php 

}
else{ 
$dsn = "mysql:host=localhost;dbname=converyj_plentyfull;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

$stmt = $pdo->prepare("SELECT * FROM `articles` WHERE articleId = $articleId");
$stmt->execute();

$row = $stmt->fetch();

?>

<!doctype html>
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
				<a href="logout.php">Logout</a> </li> <!--have to interchange bw login and logout-->
			<br>
		</ul>
		</nav>
		<h1>Edit</h1>

<form action="edit-update.php" method="POST">
			<input type="hidden" value="<?php echo($row["articleId"]); ?>" name="articleId"/>

			<p>First Name:<input type='text' name='firstName' value="<?php echo($row["firstName"]); ?>"/></p>
			<p>Last Name:<input type='text' name='lastName' value="<?php echo($row["lastName"]); ?>"/></p>
			<p>Email:<input type='email' name='email' value="<?php echo($row["email"]); ?>"/></p>
			<!-- <p>Dietary:<input type= -->
			<!-- <p>Allergies: -->
			<!-- <p>Other:<textarea name="other" cols="100" row="20"><?php echo($row["articleText"]); ?></textarea></p> -->
				<!-- need to make them IF stmts so they only appear if filled out -->

		
			<input type="submit" />
		</form>
		<p><a href="full-results.php">Go Back</a></p>
</body></html>
<?php } ?>