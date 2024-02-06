<?php
    session_start();
    include_once "classes/dbh.classes.php";
    include_once "classes/admin.classes.php";
    include_once "classes/admin-contr.classes.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Delete</title>
    <link rel="stylesheet" href="canvas.css">
</head>
<body>
<a href ="homepage.php">back </a>
<h3>ADMIN WORKPLACE</h3> 
<?php
    echo "Welcome " . $_SESSION['email'];
?> <a href="includes/logout.inc.php"> LOGOUT </a> 
<h4>Delete Research Paper</h4>
<form action="admin_delete.php" method="GET">
    <label for="searchType">Search Type:</label>
    <select name="searchType" id="searchType">
        <option value="paper_id" <?php echo ($_GET['searchType'] ?? '') === 'paper_id' ? 'selected' : ''; ?>>ID</option>
        <option value="paper_title" <?php echo ($_GET['searchType'] ?? '') === 'paper_title' ? 'selected' : ''; ?>>Title</option>
        <option value="paper_date" <?php echo ($_GET['searchType'] ?? '') === 'paper_date' ? 'selected' : ''; ?>>Date</option>
        <option value="paper_author" <?php echo ($_GET['searchType'] ?? '') === 'paper_author' ? 'selected' : ''; ?>>Author</option>
    </select>

    <label for="searchTerm">Search Term:</label>
    <input type="text" name="searchTerm" id="searchTerm" placeholder="Enter your search term" value="<?php echo $_GET['searchTerm'] ?? ''; ?>">
    <button type="submit">Search</button>
    <button type="button" onclick="resetForm()">Reset</button>
    <button type="button" onclick="toggleSortOrder()">SORT: <?php echo ($_GET['searchOrder'] ?? 'ASC'); ?></button>
    <input type="hidden" name="searchOrder" id="searchOrder" value="<?php echo $_GET['searchOrder'] ?? 'ASC'; ?>">
</form>

<?php
    //display the table
    include_once "includes/delete.inc.php";
?>

</body>
</html>
