<?php

session_start();

// get the surveyid from SESSION to concatenate to link
$surveyid = $_SESSION['surveyid'];

?>

<!-- HTML code -->
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
  <title>Plenty Full - Thank you! Now share your code</title>
</head>
<body>
  <!-- <a href=""><img src="" alt="logo"></a> -->
<div class="at">
  <ul>
    <li><a href="explore.php">Explore</a></li>
    <li><a href="inputCode.php">Input Code</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</div>
  <h2>Your unique code is: </h2>
  <h2><?php echo($surveyid);?></h2>
  <h3>When you're ready to view results you can input this code through the input code page in our menu.</h3>
  <h3>Here is your survey link. Share this with your attendees !</h3>
  <form>
    <input type="text" name="link" value="http://plentyfull.com/<?php echo($surveyid);?>" disabled />
  </form>
    <!-- <a href="http://plentyfull.com/?id=<?php echo($surveyid);?>>http://plentyfull.com/<?php echo($surveyid);?></a> -->
  <p>
    <a href="register.php">Would you like to register for our site?</a>
  </p>
</body>


<footer>
  <a href="mailto:info@plentyfull.com">info@plentyfull.com</a>
  <br />
  <a href="https://www.instagram.com/"><img src="images/ig.png" alt="ins" /></a>
  <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="facebook" /></a>
  <a href="https://www.twitter.com/"><img src="images/twitter.png" alt="twitter" /></a>

</footer>
</html>
