<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'mojabaza');
$usersID = $_SESSION['id'];
$level = $_SESSION['id_rola'];

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Cars</title>
<link rel="stylesheet" href="style.css">
<!--<link rel="stylesheet" href="form.css">-->
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
    <li class="nav-item"><a class="nav-link" href="ex%201.php">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="all_car.php">All Cars</a></li>
    <li class="nav-item"><a class="nav-link" href="add_car.php">Add Car</a></li>
    <li class="nav-item"><a class="nav-link" href="my_car.php">My Car</a></li>
    <li class="nav-item"><a class="nav-link" href=logout.php ><?php echo $_SESSION['userName'] ?></a></li>

</ul>

<div class="container-fluid">
    <!--    Display errors-->
    <?php
    if (isset($error)) {
        foreach ($error as $item) {
            echo '<span class="error">' . $item . '</span>';
        }
    }
    ?>
    <div class="row row-col-2">
        <div class="col-8 text-center">
            <h1 class="h1">My car</h1>
        </div>
        <div class="col-4">
            <?php

            if ($conn === false) {
                $error[] = ("ERROR " . mysqli_connect_error());
            }


            if ($level == 2){
                $queryCars = "SELECT * FROM samochody";
                $resultCars = mysqli_query($conn, $queryCars);
            }elseif ($level ==1){
                $queryCars = "SELECT * FROM samochody WHERE id_uzytkownik = '$usersID'";
                $resultCars = mysqli_query($conn, $queryCars);
            }
            ?>
        </div>
        <div class="col-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Price</th>
                    <th scope="col">Year</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <?php
                //            mysqli_fetch_array() - associative array
                while ($row = mysqli_fetch_array($resultCars)) {
                    echo "<tbody>";
                    echo "<tr>";
                    echo("<td>$row[marka]</td>");
                    echo("<td>$row[model]</td>");
                    echo("<td>$row[cena]</td>");
                    echo("<td>$row[rok]</td>");
                    echo("<td>$row[opis]</td>");
//                    Link to a subpage for editing a given address
                    echo("<td><a class='btn btn-outline-danger' href=\"my_car_edit.php?id=$row[id]\">Edit</a></td>");
                    echo "</tr>";
                    echo "</tbody>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
