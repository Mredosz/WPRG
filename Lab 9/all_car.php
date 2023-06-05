<?php
require_once "Database.php";
require_once "Car.php";
session_start();
if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}else{
    $id=0;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Cars</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        body {
            background-color: black;
            color: red;
        }
    </style>
</head>
<body>

<?php
Car::navBars($id);
?>
<table>
    <tr>
        <td>ID</td>
        <td>Make</td>
        <td>Model</td>
        <td>Price</td>
    </tr>
<?php
$results = Database::query('SELECT *  FROM samochody ORDER BY rok ');
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
</body>
</html>