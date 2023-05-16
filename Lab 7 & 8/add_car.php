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
<form action="add_car.php" method="GET">
    <input type="text" name="make" placeholder="Make" required >
    <input type="text" name="model" placeholder="Model" required>
    <input type="text" name="price" placeholder="Price" required>
    <input type="text" name="year" placeholder="Year" required>
    <input type="text" name="description" placeholder="Description" required>
    <button type="submit">Add Car</button>
</form>
<?php
$connect = mysqli_connect('localhost', 'root', '', 'mojabaza');
if (isset($_GET['make']) && isset($_GET['model']) && isset($_GET['price']) && isset($_GET['year']) && isset($_GET['description'])) {

        $make = $_GET['make'];
        $model = $_GET['model'];
        $price = $_GET['price'];
        $year = $_GET['year'];
        $description = $_GET['description'];

    $add = "INSERT INTO samochody(id, marka, model, cena, rok, opis) VALUES ('','$make','$model','$price','$year','$description')";

    if ($connect->query($add) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $add . "<br>" . $connect->error;
    }
}else{
    exit;
}
mysqli_close($connect);
?>
</body>
</html>
