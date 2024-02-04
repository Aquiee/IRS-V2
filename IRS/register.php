<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<a href ="homepage.php">back </a>
<h3>Register</h3>
<form action="includes/signup.inc.php" method="post">
    <label>Enter email</label>
    <input type="text" name="email" required>
    <br>
    <label>Enter password</label>
    <input type="password" name="password" required>
    <br>
    <label>Repeat password</label>
    <input type="password" name="repeatpassword" required>
    <br>
    <button type="submit" name="submit" >Register</button>

</form>

</body>
</html>
