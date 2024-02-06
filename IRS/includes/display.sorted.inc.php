<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $searchType = $_GET["searchType"] ?? "paper_id";
    $searchTerm = $_GET["searchTerm"] ?? "";
    $sortOrder = $_GET["searchOrder"] ?? "ASC";
    
    $display = new PaperContr();
    $results = $display->getSortedPaper($searchType, $searchTerm, $sortOrder);
}
?>

<br>
<table border='1'>
    <tr>
        <th>Paper ID</th>
        <th>Paper Title</th>
        <th>Paper Date</th>
        <th>Paper Author</th>
        <th>Paper File</th>
        <th></th> 
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
    <a href='details.php?paper_id={$row['paper_id']}'>Open</a>
    </td>";

}

echo "</table>";



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