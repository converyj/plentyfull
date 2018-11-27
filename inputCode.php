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
  <!-- <a href=""><img src="" alt="logo"></a> -->
<nav>
  <ul>
    <li><a href="explore.php">Explore</a></li>
    <li><a href="inputCode.php">Input Code</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</nav>
  <h1>Input Code</h1>
  <form action="process_inputcode.php" method="POST">
      <label>Code:<input type="text" name="code" /></label><br />
      <label>Email:<input type="email" name="email" /></label><br />
      <p>
        Are you the event planner?
          <input id = yes type="radio" name="role" value="yes" /><label for="yes">Yes</label>
          <input id = no type="radio" name="role" value="no" /><label for="no">No</label>
      </p>
      <input type="submit" value="Submit" />
</body>
<footer>
  <a href="mailto:info@plentyfull.com">info@plentyfull.com</a>
  <br />
  <a href="https://www.instagram.com/"><img src="images/ig.png" alt="ins" /></a>
  <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="facebook" /></a>
  <a href="https://www.twitter.com/"><img src="images/twitter.png" alt="twitter" /></a>
</footer>
</html>
