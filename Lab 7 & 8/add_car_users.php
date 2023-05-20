<?php
session_start();
$id = $_SESSION['id'];
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
<ul class="nav nav-pills ms-auto flex-nowrap">
    <li class="nav-item"><a class="nav-link" href="users_index.php">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="all_car_users.php">All Cars</a></li>
    <li class="nav-item"><a class="nav-link" href="add_car_users.php">Add Car</a></li>
    <li class="nav-item"><a class="nav-link" href="my_car.php">My Car</a></li>
    <li class="nav-item"><a class="nav-link" href=logout.php ><?php echo $_SESSION['userName'] ?></a></li>

</ul>
<form action="add_car_users.php" method="GET">
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


    $add = "INSERT INTO samochody(id, marka, model, cena, rok, opis, id_uzytkownik) VALUES ('','$make','$model','$price','$year','$description',$id)";

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
