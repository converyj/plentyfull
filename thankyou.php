<?php 

session_start(); 

// if role is palnner, redirect to homepage
if ($_SESSION['role'] == 1) {
  header("Location: homepage.php"); 
  exit();
}

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
  <title>Plenty Full - Thank you!</title>
</head>
<body>
<nav>
    <a href="homepage.php" id="main-logo"></a>
      <div class="at">
        <a href="#" id="menu-icon"></a>

        <ul>
          <li><a href="inputCode.php">Input Code</a></li>
          <li><a href="about.php">About</a></li>
        </ul>
      </div>
</nav>

<div class="container-thankyou">
  <p class="thankyou">Thank You!</p>
</div>
</body>
 <script src="js/main.js"></script>
<footer>
  <a href="mailto:info@plentyfull.com" class="email">info@plentyfull.com</a>
  <br />
  <a href="https://www.twitter.com/"><img src="images/twitter.png" width="30px" alt="twitter" /></a>
  <a href="https://www.facebook.com/"><img src="images/facebook.png" width="30px" alt="facebook" /></a>
  <a href="https://www.instagram.com/"><img src="images/ig.png" width="30px" alt="ins" /></a>
</footer>
</html>
