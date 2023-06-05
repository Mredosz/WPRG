<?php

class Car
{
final static function myCarEdit($result){
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
        Database::query("UPDATE samochody SET marka = ' " . $_POST['make'] . " ', 
                model = ' " . $_POST['model'] . " ', cena = ' " . $_POST['price'] . " ', rok = ' " . $_POST['year'] . " ', 
                opis = ' " . $_POST['description'] . "' WHERE id = $_GET[id]");
        header("Location:my_car_edit.php?id=$row[id]");
        Database::disconnect();
    }
}

final static function navBars($id){
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
}
}