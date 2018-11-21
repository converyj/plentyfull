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
  <ul>
    <li><a href="explore.php">Explore</a></li>
    <li><a href="inputCode.php">Input Code</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
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
