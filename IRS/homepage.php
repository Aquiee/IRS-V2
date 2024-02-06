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
    <title>Homepage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<a href ="index.php">back </a>
<p>WELCOME TO IRS FOR RESEARCH PAPER IN TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES</p> 
<?php
    if(isset($_SESSION['email'])){
        echo "Welcome " . $_SESSION['email'];
        ?> <a href="includes/logout.inc.php"> LOGOUT </a> 
        <?php
        // CODE IF ADMIN SESSION
        if($_SESSION['email'] == "admin"){
?> 
        <h4>Modify Research Paper Database</h4>
        <li><a href="admin_insert.php">Insert</a></li>
        <li><a href="admin_delete.php">Delete</a></li>
        <li><a href="display_sort.php">View</a></li>
<?php
    } else {
        //CODE IF USER SESSION
?>
        <form action="homepage.php" method="GET">
            <br>
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
        //Table Display
        include_once "includes/display.sorted.inc.php";
        }
    } else {
?>
        <h3>You must be logged in to access our IRS</h3>
        <p>//dev notes test admin (username=admin,password=123)</p>
        <p>//dev notes test user (username=user@gmail.com,password=123)</p>
        <a href ="login.php">log in here</a>
        <br><br>
        <a href ="register.php">dont have an account yet? sign in here</a>
<?php
    }
    

?>

</body>
</html>
