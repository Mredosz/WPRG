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
<!--Short navbar to navigate to main website and user staff-->
<ul class="nav nav-pills ms-auto flex-nowrap">
    <li class="nav-item"><a class="nav-link" href="users_index.php">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="all_car_users.php">All Cars</a></li>
    <li class="nav-item"><a class="nav-link" href="add_car_users.php">Add Car</a></li>
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
        <div class="col-4 text-center">
            <h1 class="h1">Edit Car</h1>
        </div>
        <div class="col-8 text-center">
            <h1 class="h1">All car</h1>
        </div>
        <div class="col-4">
            <?php

            if ($conn === false) {
                $error[] = ("ERROR " . mysqli_connect_error());
            }

            if ($level ==2){
            $num = $_GET['id'];
            $query = "SELECT * FROM samochody WHERE id = '$num'";
            $queryCars = "SELECT * FROM samochody";
            $result = mysqli_query($conn, $query);
            $resultCars = mysqli_query($conn, $queryCars);
            //            mysqli_fetch_array() - associative array
            $row = mysqli_fetch_array($result);
            ?>
            <!--   echo "$row[city]" ---   Display information about this address and give user possibility to edit-->
            <form action="" method="post">
                <label for="make"><b>Make</b></label>
                <input type="text" name="make" value="<?php echo "$row[marka]"; ?>">

                <label for="model"><b>Model</b></label>
                <input type="text" name="model" value="<?php echo "$row[model]"; ?>">

                <label for="price"><b>Price</b></label>
                <input type="text" name="price" value="<?php echo "$row[cena]"; ?>">

                <label for="year"><b>Year</b></label>
                <input type="text" name="year" value="<?php echo "$row[rok]"; ?>">

                <label for="description"><b>Description</b></label>
                <input type="tel" name="description" value="<?php echo "$row[opis]"; ?>">

                <button type="submit" name="update">Update</button>
                <?php
                //                Update changes into database
                if (isset($_POST['update'])) {
                    $sql = "UPDATE samochody SET marka = ' " . $_POST['make'] . " ', 
                model = ' " . $_POST['model'] . " ', cena = ' " . $_POST['price'] . " ', rok = ' " . $_POST['year'] . " ', 
                opis = ' " . $_POST['description'] . "' WHERE id = $_GET[id]";
                    mysqli_query($conn, $sql);
                    header("Location:my_car_edit.php?id=$row[id]");
                    mysqli_close($conn);
                }
            }elseif ($level == 1){
            $num = $_GET['id'];
            $query = "SELECT * FROM samochody WHERE id = '$num'";
            $queryCars = "SELECT * FROM samochody WHERE id_uzytkownik = '$usersID'";
            $result = mysqli_query($conn, $query);
            $resultCars = mysqli_query($conn, $queryCars);
            //            mysqli_fetch_array() - associative array
            $row = mysqli_fetch_array($result);
            if ($usersID == $row['id_uzytkownik']){
            ?>
            <!--   echo "$row[city]" ---   Display information about this address and give user possibility to edit-->
            <form action="" method="post">
                <label for="make"><b>Make</b></label>
                <input type="text" name="make" value="<?php echo "$row[marka]"; ?>">

                <label for="model"><b>Model</b></label>
                <input type="text" name="model" value="<?php echo "$row[model]"; ?>">

                <label for="price"><b>Price</b></label>
                <input type="text" name="price" value="<?php echo "$row[cena]"; ?>">

                <label for="year"><b>Year</b></label>
                <input type="text" name="year" value="<?php echo "$row[rok]"; ?>">

                <label for="description"><b>Description</b></label>
                <input type="tel" name="description" value="<?php echo "$row[opis]"; ?>">

                <button type="submit" name="update">Update</button>
                <?php
                //                Update changes into database
                if (isset($_POST['update'])) {
                    $sql = "UPDATE samochody SET marka = ' " . $_POST['make'] . " ', 
                model = ' " . $_POST['model'] . " ', cena = ' " . $_POST['price'] . " ', rok = ' " . $_POST['year'] . " ', 
                opis = ' " . $_POST['description'] . "' WHERE id = $_GET[id] AND id_uzytkownik = '$usersID'";
                    mysqli_query($conn, $sql);
                    header("Location:my_car_edit.php?id=$row[id]");
                    mysqli_close($conn);
                }
                }else{
                    echo " ";
//                    header("Location: 404Error.php");
                }

            }
            ?>

            </form>
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
