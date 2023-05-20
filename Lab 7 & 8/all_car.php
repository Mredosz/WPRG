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
    echo("<td><a class='btn btn-danger' href=\"about.php?id=$row[0]\">About</a></td>");
    echo "</tr>";
}
mysqli_close($connect);
?>
</table>
</body>
</html>