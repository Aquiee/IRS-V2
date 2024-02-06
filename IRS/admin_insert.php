<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Insert</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<a href ="homepage.php">back </a>
<h3>ADMIN WORKPLACE</h3> 
<?php
    echo "Welcome " . $_SESSION['email'];
    ?> <a href="includes/logout.inc.php"> LOGOUT </a> 
<h4>Insert Research Paper</h4>
<form action="insert.inc.php" method="post" enctype="multipart/form-data" onsubmit="combineAuthors()">
    <label>Enter Paper Title:</label>
    <input type="text" name="title" placeholder="Research Paper Title: " required><br>
    <label>Enter Paper Date:</label>

    <input type="date" name="date" placeholder="Research Paper Published Date: " required><br>
    <div id="authorInputs">
        <div class="authorInput" id="author1Div">
        <label for="author1">Author 1:</label>
        <input type="text" id="author1" name="author1" placeholder="Author 1" required>
        <button type="button" onclick="removeAuthor('author1Div')">Remove Author</button><br>
        </div>
    </div>

    <button type="button" onclick="addAuthor()">Add Author</button><br>
    <input type="hidden" id="combinedAuthors" name="combinedAuthors">
    <label for="author1">Enter Paper Abstract:</label><br>
    <textarea  name="abstract" rows="10" cols="50" placeholder="Research Paper Abstract: "></textarea><br>
    <label>Enter Paper File:</label>
    <input type="file" name="paperfile" placeholder="Research Paper File: " required><br>
    <button type="submit" name="submit" >Submit</button>
</form>
</body>
</html>
