<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css/main3forOrange.css">
  <link rel="stylesheet" media="screen and (max-width: 640px)" href="css/small.css" />
  <!-- plentyfull favicon -->
  <title>Plenty Full - Input Code</title>
</head>
<body>
  <!-- <a href=""><img src="" alt="logo"></a> -->
<nav>
   <a href="homepage.php" id="main-logo"></a>
       <div class="at">
         <a href="#" id="menu-icon"></a>
          <ul>
          <!-- <a href="homepage.php" class="main-logo"><img src="images/logo-white.png" width="20%"></a> -->
            <!-- <li><a href="explore.php">Explore</a></li> -->
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
<div class="container">
  <P class="input-code">Input Code</P>
  <form action="process_inputcode.php" method="POST">
      Code<input class="surveyinputtext" type="text" name="code" /><br />

          <p class="planner">
        Are you the event planner?
          <input type="radio"  name="role" value="yes" />Yes
          <input type="radio"  name="role" value="no" />No
      </p>

      Email<input class="surveyinputemail" type="email" name="email" /><br />

      <input class="code-button" type="submit" value="Go" />
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
