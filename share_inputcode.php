<?php

session_start();

// if not logged in and is not a planner, go to homepage 
if($_SESSION['logged-in'] == false && $_SESSION['role'] != 1) {
  header("Location: homepage.php");
  exit();
}

// get the surveyid from SESSION to concatenate to link
$surveyid = $_SESSION['surveyid'];

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
  <title>Plenty Full - Thank you! Now share your code</title>
</head>
<body>

  <nav>
    <a href="homepage.php" id="main-logo"></a>
      <div class="at">
        <a href="#" id="menu-icon"></a>
          <ul>
            <li><a href="inputCode.php">Input Code</a></li>
            <li><a href="about.php">About</a></li>
            <!-- if already logged in, change navigation  -->
              <?php
              if (isset($_SESSION['logged-in'])) {
              ?>
                <li>
                  <a href="logout.php">Logout</a>
                </li>
              <?php
              }
              ?>
          </ul>
      </div>
</nav>


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
