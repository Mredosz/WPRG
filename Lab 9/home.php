<?php
require_once "Database.php";

?>

<table>
    <tr>
        <td>ID</td>
        <td>Make</td>
        <td>Model</td>
        <td>Price</td>
    </tr>
    <?php
    $results = Database::query('SELECT * FROM samochody ORDER BY cena LIMIT 5');
    while ($row = mysqli_fetch_row($results)){
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo("<td><a class='btn btn-danger' href=\"about.php?id=$row[0]\">About</a></td>");
        echo "</tr>";
    }
    Database::disconnect();
    ?>
</table>
