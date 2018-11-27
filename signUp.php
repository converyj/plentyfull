<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Plenty Full - Sign Up </title>
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

<form action="process_signup.php" method="POST">
  <fieldset>
    <legend>
      <h1>Sign Up</h1>
      <h2>Register with us to always keep your information saved</h2>
    </legend>
      <label>First Name:<input type="text" name="firstName" /></label><br />
      <label>Last Name:<input type="text" name="lastName" /></label><br />
      <label>Email:<input type="email" name="email" /></label><br />
      <label>Password:<input type="password" name="password" required="required" /></label><br />
    <p>
      <input type="checkbox" name="termOfUse" id="terms" />
      <label for="terms"><a href="">I agree with the terms and conditions</a></label>
    </p>
    <input type="submit" value="Go" />

  </fieldset>
</form>

</body>


<footer>
  <a href="mailto:info@plentyfull.com">info@plentyfull.com</a>
  <br />
  <a href="https://www.instagram.com/"><img src="images/ig.png" alt="ins" /></a>
  <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="facebook" /></a>
  <a href="https://www.twitter.com/"><img src="images/twitter.png" alt="twitter" /></a>

</footer>
</html>
