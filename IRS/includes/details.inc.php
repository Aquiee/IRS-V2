<?php
session_start();
include_once "../classes/dbh.classes.php";
include_once "../classes/admin.classes.php";
include_once "../classes/admin-contr.classes.php";

$paper_id = $_GET['paper_id'];

$display = new PaperContr();
$results = $display->getPaperRow($paper_id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $update = new PaperContr();
    $update->updateRowPaper($_POST['paper_id'], $_POST['title'], $_POST['date'], $_POST['abstract'], $_POST['author']);

    header("Location: ".$_SERVER['PHP_SELF']."?paper_id=".$paper_id);
    exit();
}
// Display Table For Admin
if($_SESSION['email'] == "admin"){
if ($results) {
    echo "<a href ='../display_sort.php'>back </a>";
    echo "<h1>Paper Details</h1>";

    echo '<form method="post" action ="">';
    echo '<input type="hidden" name="paper_id" value="' . $results['paper_id'] . '">';
    echo '<label for="title">Paper Title:</label>';
    echo '<input type="text" style="width:30%" id="title" name="title" value="' . $results['paper_title'] . '"><br>';

    echo '<label for="date">Paper Date:</label>';
    echo '<input type="text" id="date" name="date" value="' . $results['paper_date'] . '"><br>';

    echo '<label for="author">Paper Author:</label>';
    echo '<input type="text" id="author" style="width:30%" name="author" value="' . $results['paper_author'] . '"><br>';

    echo '<label for="abstract">Paper Abstract:</label>';
    echo '<textarea id="abstract" rows="10" cols="80" name="abstract">' . $results['paper_abstract'] . '</textarea><br>';

        if ($results['paper_file'] !== null && $results['paper_file'] !== '') {
            echo '<p><strong>Paper File:</strong> <a href="../files/' . $results['paper_file'] . '" target="_blank"> View PDF</a></p>';
        } else {
            echo "<p><strong>Paper File:</strong> None</p>";
        }

    echo '<button type="submit">Update</button>';
    echo '</form>';
} 
// Display Table For Admin

} else {
    if ($results) {
        echo "<a href ='../display_sort.php'>back </a>
        ";
        echo "<h1>Paper Details</h1>";
        echo "<p><strong>Paper ID:</strong> {$results['paper_id']}</p>";
        echo "<p><strong>Paper Title:</strong> {$results['paper_title']}</p>";
        echo "<p><strong>Paper Date:</strong> {$results['paper_date']}</p>";

        if ($results['paper_author'] !== null && $results['paper_author'] !== '') {
            echo "<p><strong>Paper Author:</strong> " . $results['paper_author'];
        } else {
            echo "<p><strong>Paper Author:</strong> None";
        }

        echo "<p><strong>Paper Abstract:</strong> {$results['paper_abstract']}</p>";
        
        if ($results['paper_file'] !== null && $results['paper_file'] !== '') {
            echo '<p><strong>Paper File:</strong> <a href="../files/' . $results['paper_file'] . '" target="_blank"> View PDF</a></p>';
        } else {
            echo "<p><strong>Paper File:</strong> None</p>";
        }
    }
    
}