<?php
$connect = mysqli_connect('localhost', 'root', '', 'mojabaza');

$query = 'SELECT * FROM samochody ORDER BY cena LIMIT 5';

if (!$results = mysqli_query($connect,$query)){
    mysqli_close($connect);
    echo 'There was an error';
    exit;
}
?>

<table>
    <tr>
        <td>ID</td>
        <td>Make</td>
        <td>Model</td>
        <td>Price</td>
    </tr>
    <?php
    while ($row = mysqli_fetch_row($results)){
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo("<td><a href=\"about.php?id=$row[0]\">About</a></td>");
        echo "</tr>";
    }
    mysqli_close($connect);
    ?>
</table>
