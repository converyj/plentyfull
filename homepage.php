<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Plenty Full - Home Page</title>
</head>
<body>
  <nav>
  <a href="explore.php">Explore</a> |
  <a href="process_inputcode.php">Input Code</a> |
  <a href="about.php">About</a> |
  <a href="login.php">Login</a>
</nav>
  <h1>Plenty Full</h1>
  <h2>You’re only here for the food,so let’s get it right.</h2>

<form action="process_plannersurvey.php" method="POST">
  <fieldset>
    <legend>Start Planning</legend>
    First Name:<input type="text" name="firstName" /><br />
    Last Name:<input type="text" name="lastName" /><br />
    Email:<input type="email" name="email" /><br />
    City:<input type="text" name="city" /><br />
    Address:<input type="text" name="address" /><br />
    When would you like your results?<input type="date" name="ddlDate" /><br />
    <p>
      Dietary Restrictions:
      <br />
      <input type="checkbox" name="dietaryRestrictions" value="vegetarian" />Vegetarian
      <input type="checkbox" name="dietaryRestrictions" value="vegan" />Vegan
      <input type="checkbox" name="dietaryRestrictions" value="pescetarian" />Pescetarian
      <input type="checkbox" name="dietaryRestrictions" value="kosher" />Kosher
      <input type="checkbox" name="dietaryRestrictions" value="halal" />Halal
      <input type="checkbox" name="dietaryRestrictions" value="glutenFree" />Gluten Free
    </p>
    <p>
      Allergies:
      <br />
      <input type="checkbox" name="allergies" value="peanuts" />Peanuts
      <input type="checkbox" name="allergies" value="lactoseIntolerant" />Lactose Intolerant
      <input type="checkbox" name="allergies" value="eggs" />Eggs
      <input type="checkbox" name="allergies" value="wheat" />wheat
      <input type="checkbox" name="allergies" value="soy" />Soy
      <input type="checkbox" name="allergies" value="fish" />Fish
      <input type="checkbox" name="allergies" value="shellfish" />Shellfish
    </p>
    <p>
      Other:
      <br />
      <textarea id="other"></textarea>
    </p>
    <input type="submit" value="Submit" />
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
