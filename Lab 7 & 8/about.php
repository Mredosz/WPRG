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
//
//
//if (!$results = mysqli_query($connect,$sql)) {
//    mysqli_close($connect);
//    echo 'There was an error';
//    exit;
//}
//
//$_GET['id'] = mysqli_escape_string($_GET['id']);
//
//$zap = mysqli_query("SELECT * FROM samochody WHERE id='".$_GET['id']."' LIMIT 1;");
//$rek = mysqli_fetch_assoc($zap);

if ($connect === false) {
}

$num = $_GET['id'];
$query = "SELECT * FROM samochody WHERE id = '$num'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);


$made = $row['1'];
$model = $row['2'];
$price = $row['3'];
$year = $row['4'];
$description = $row['5'];
?>
<table>
    <tr>
<!--        <td>ID</td>-->
        <td>Make</td>
        <td>Model</td>
        <td>Price</td>
        <td>Year</td>
        <td>Description</td>
    </tr>
    <?php

        echo "<tr>";
        echo "<td>$made</td>";
        echo "<td>$model</td>";
        echo "<td>$price</td>";
        echo "<td>$year</td>";
        echo "<td>$description</td>";
        echo "</tr>";
    mysqli_close($connect);
    ?>
</table>

</body>
</html>