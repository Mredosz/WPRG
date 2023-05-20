<?php
session_start();
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
<?php
require_once 'home_users.php';
?>
</body>
</html>


