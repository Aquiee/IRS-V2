<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $searchType = $_GET["searchType"] ?? "paper_id";
    $searchTerm = $_GET["searchTerm"] ?? "";
    $sortOrder = $_GET["searchOrder"] ?? "ASC";
    
    $display = new PaperContr();
    $results = $display->getSortedPaper($searchType, $searchTerm, $sortOrder);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_paper_id"])) {
    $display = new PaperContr();
    $row = $display->deleteRow($_POST["delete_paper_id"]);
}
?>

<form method='post' action=''>
      <table border='1'>
        <tr>
            <th>Paper ID</th>
            <th>Paper Title</th>
            <th>Paper Date</th>
            <th>Paper Author</th>
            <th>Paper File</th>
            <th></th> <!-- Empty header for the new column -->
        </tr>

<?php
foreach ($results as $row) {
    echo "<tr>
            <td>{$row['paper_id']}</td>
            <td>{$row['paper_title']}</td>
            <td>{$row['paper_date']}</td>
            <td>";

    if ($row['paper_author'] !== null && $row['paper_author'] !== '') {
        echo $row['paper_author'];
    } else {
        echo "None";
    }

    echo "</td>
            <td>";

    if ($row['paper_file'] !== null && $row['paper_file'] !== '') {
        echo $row['paper_file'];
    } else {
        echo "None";
    }

    echo "<td>
    <a href='includes/details.inc.php?paper_id={$row['paper_id']}' target='_blank'>Open</a>
    </td>";

    echo "<td>
    <form method='post' action=''>
        <input type='hidden' name='delete_paper_id' value='{$row['paper_id']}'>
        <input type='submit' value='Delete'>
    </form>
    </td>";

}

echo "</table>
      </form>";
?>

<script>

    function resetForm() {
        document.getElementById('searchTerm').value = '';
        document.getElementById('searchType').value = 'paper_id';
        document.getElementById('searchOrder').value = 'ASC';
        document.querySelector('form').submit();
    }

    function toggleSortOrder() {
        var sortOrderInput = document.getElementById('searchOrder');
        sortOrderInput.value = sortOrderInput.value === 'ASC' ? 'DESC' : 'ASC';
        document.querySelector('form').submit();
    }
</script>