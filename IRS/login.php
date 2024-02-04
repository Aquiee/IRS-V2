<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<a href ="homepage.php">back </a>
<h3>Log in</h3>
<form action="includes/login.inc.php" method="post">
    <label>Enter email</label>
    <input type="text" name="email" required>
    <br>
    <label>Enter password</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit" name="submit" >Login</button>

</form>

</body>
</html>
