<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Cars</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: black;
            color: red;
        }
    </style>
</head>
<body>

<ul class="nav nav-tabs ">
    <li><a href="ex%201.php">Home</a></li>
    <li><a href="all_car.php">All Cars</a></li>
    <li><a href="add_car.php">Add Car</a></li>
</ul>
<?php
$connect = mysqli_connect('localhost', 'root', '', 'mojabaza');

$query = 'SELECT *  FROM samochody ORDER BY rok ';

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
</body>
</html>