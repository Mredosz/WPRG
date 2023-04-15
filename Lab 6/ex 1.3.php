<?php
/*
 * 3.Trzecia podstrona wyświetla podsumowanie wszystkich zebranych danych.
 */
session_start();

?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Third subpage</title>
    <style>
        body {
            background-color: black;
            color: red;
        }
    </style>
</head>

<body>
<h1>General information</h1>
<hr color="red">
<?php
echo "First name ". $_SESSION['firstName']."<br>";
echo "Last name ". $_SESSION['lastName']."<br>";
echo "Card ". $_SESSION['cardNumber']."<br>";

?>
<h1>Other people</h1>
<hr color="red">

<?php
for ($i = 0; $i < $_SESSION['personnumber']; $i++) {
    echo ($i+1) . " Person: <br> First name ".$_SESSION['firstNames'][$i]." Last name ".$_SESSION['lastNames'][$i]."<br>";
}
?>


<br><br>
<a href="ex%201.php"><button>Main page</button></a>
<?php
session_destroy();
?>
</body>
</html>
