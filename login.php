<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="css/main2.css">

  <title>Plenty Full - Log In </title>
</head>
<body>
  <!-- <a href=""><img src="" alt="logo"></a> -->
<div class="at">
  <ul>
  <a href="homepage.php" class="main-logo"><img src="images/logo-white.png" width="20%"></a>
    <li><a href="explore.php">Explore</a></li>
    <li><a href="inputCode.php">Input Code</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</div>
<div class="background">
<form action="process_login.php" method="POST">
    <p class="login">Log In</p>
    <font color="white">Email</font><input class="logininput" type="email" name="email" /><br />
    <font color="white">Password</font><input  class="password logininput" type="password" name="password" required="required" /><br />
      <p class="register"> Don't have an account?<a href="signup.php">  Register here</a></p>
    <input class="submit-btn"type="submit" value="Go" />
</form>

</div>
 <script src="js/main.js"></script>
</body>
<footer class="footerAlternate">
 <a href="mailto:info@plentyfull.com" class="emailAlternate">info@plentyfull.com</a>
  <br />
  <a href="https://www.twitter.com/"><img src="images/twitter-orange.png" width="3%" alt="twitter" /></a>
  <a href="https://www.facebook.com/"><img src="images/fb-orange.png" width="3%" alt="facebook" /></a>
  <a href="https://www.instagram.com/"><img src="images/ig-orange.png" width="3%" alt="ins" /></a>
</footer>
</html>
