<?php
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
if ($id !=0){
?>
<ul class="nav nav-pills ms-auto flex-nowrap">
    <li class="nav-item"><a class="nav-link" href="ex%201.php">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="all_car.php">All Cars</a></li>
    <li class="nav-item"><a class="nav-link" href="add_car.php">Add Car</a></li>
    <li class="nav-item"><a class="nav-link" href="my_car.php">My Car</a></li>
    <li class="nav-item"><a class="nav-link" href=logout.php ><?php echo $_SESSION['userName'] ?></a></li>

</ul>
<?php
}else{
?>
<ul class="nav nav-pills ms-auto flex-nowrap">
    <li class="nav-item"><a class="nav-link" href="ex%201.php">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="all_car.php">All Cars</a></li>
    <li class="nav-item"><a class="nav-link" href="add_car.php">Add Car</a></li>
    <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
    <li class="nav-item"><a class="nav-link" href=login.php>Log In</a></li>
</ul>

<?php
}
?>
<?php
$connect = mysqli_connect('localhost', 'root', '', 'mojabaza');
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