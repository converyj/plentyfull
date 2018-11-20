<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Plenty Full - Log In </title>
</head>
<body>
<nav>
  <!--  not proper <ul><li> -->
  <!-- plentyfull link on nav -->
  <a href="explore.php">Explore</a> 
  <a href="inputCode.php">Input Code</a> 
  <a href="about.php">About</a> 
  <a href="login.php">Login</a>
</nav>

<form action="process_login.php" method="POST">
    <h1>Log In</h1>
    Email:<input type="email" name="email" /><br />
    Password:<input type="password" name="password" required="required" /><br />
    <input type="submit" value="Go" />
</form>
</body>
<footer>
  <a href="mailto:info@plentyfull.com">info@plentyfull.com</a>
  <br />
  <a href="https://www.instagram.com/"><img src="images/instagram.png" alt="ins" /></a>
  <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="facebook" /></a>
  <a href="https://www.twitter.com/"><img src="images/twitter.png" alt="twitter" /></a>
</footer>
</html>
