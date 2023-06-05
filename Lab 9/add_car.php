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
<form action="add_car.php" method="GET">
    <input type="text" name="make" placeholder="Make" required >
    <input type="text" name="model" placeholder="Model" required>
    <input type="text" name="price" placeholder="Price" required>
    <input type="text" name="year" placeholder="Year" required>
    <input type="text" name="description" placeholder="Description" required>
    <button type="submit">Add Car</button>
</form>
<?php
if (isset($_GET['make']) && isset($_GET['model']) && isset($_GET['price']) && isset($_GET['year']) && isset($_GET['description'])) {

        $make = $_GET['make'];
        $model = $_GET['model'];
        $price = $_GET['price'];
        $year = $_GET['year'];
        $description = $_GET['description'];


Database::query("INSERT INTO samochody(id, marka, model, cena, rok, opis, id_uzytkownik) 
VALUES ('','$make','$model','$price','$year','$description','1')");
}else{
    exit;
}
Database::disconnect();
?>
</body>
</html>
