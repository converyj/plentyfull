<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- plentyfull favicon -->
  <title>Plenty Full - Input Code</title>
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
  <h1>Input Code</h1>
  <form action="process_inputcode.php" method="POST">
      Code:<input type="text" name="code" /><br />
      Email:<input type="email" name="email" /><br />
      <p>
        Are you the event planner?
          <input type="radio" name="role" value="yes" />Yes
          <input type="radio" name="role" value="no" />No
      </p>
      <input type="submit" value="Submit" />
</body>
<footer>
  <a href="mailto:info@plentyfull.com">info@plentyfull.com</a>
  <br />
  <a href="https://www.instagram.com/"><img src="images/instagram.png" alt="ins" /></a>
  <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="facebook" /></a>
  <a href="https://www.twitter.com/"><img src="images/twitter.png" alt="twitter" /></a>
</footer>
</html>
