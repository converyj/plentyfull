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
    <a href="homepage.php" class="main-logo"><img src="images/logo-white.png" width="20%"></a>
    <!-- <li><a href="explore.php">Explore</a></li> -->
    <li><a href="inputCode.php">Input Code</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</div>


<div class="container-thankyou">
  <p class="thankyou-input">Thank You!</p>



  <p class='urcode1'>Your unique code is: </p>
  <p class='urcode2'><?php echo($surveyid);?></p>
  <p class='urcode3'>When you're ready to view results you can input this code through the input code page in our menu.
    <br>
    <br>
  Here is your survey link. Share this with your attendees !</p>
  
  <form>
    <input type="text" class="surveyinputtext" name="link" value="http://plentyfull.com/<?php echo($surveyid);?>" disabled />
  </form>
   <!--  <a href="http://plentyfull.com/?id=<?php echo($surveyid);?>>http://plentyfull.com/<?php echo($surveyid);?></a>  -->
  <p class="linktoregister">
    <a href="register.php" class="linktoregister">Would you like to register for our site?</a>
  </p>
</div>
</body>


<footer>
  <a href="mailto:info@plentyfull.com">info@plentyfull.com</a>
  <br />
  <a href="https://www.instagram.com/"><img src="images/ig.png" width="30px" alt="ins" /></a>
  <a href="https://www.facebook.com/"><img src="images/facebook.png" width="30px" alt="facebook" /></a>
  <a href="https://www.twitter.com/"><img src="images/twitter.png" width="30px" alt="twitter" /></a>

</footer>
</html>
