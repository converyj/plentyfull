<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Plenty Full - Sign Up </title>
</head>
<body>
<nav>
  <a href="explore.php">Explore</a> |
  <a href="inputCode.php">Input Code</a> |
  <a href="about.php">About</a> |
  <a href="login.php">Login</a>
</nav>

<form action="process_signup.php" method="POST">
  <fieldset>
    <legend>
      <h1>Sign Up</h1>
      <h2>Register with us to always keep your information saved</h2>
    </legend>
    First Name:<input type="text" name="firstName" /><br />
    Last Name:<input type="text" name="lastName" /><br />
    Email:<input type="email" name="email" /><br />
    Password:<input type="password" name="password" required="required" /><br />
    <p>
      <input type="checkbox" name="termOfUse" />
      <a href="">I agree with the terms and conditions</a>
    </p>
    <input type="submit" value="Go" />

  </fieldset>
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
