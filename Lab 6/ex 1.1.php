<?php
/*
 * 1.Pierwsza podstrona ma pobierać dane ogólne np. nr karty, dane zamawiającego, ilość osób itp.
 */
session_start();
if (isset($_POST['person'])) {
    $_SESSION['personnumber'] = $_POST['person'];
}
if (isset($_POST['firstName'])) {
    $_SESSION['firstName'] = $_POST['firstName'];
}
if (isset($_POST['lastName'])) {
    $_SESSION['lastName'] = $_POST['lastName'];
}
if (isset($_POST['cardNumber'])){
    $_SESSION['cardNumber'] = $_POST['cardNumber'];
}

?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>First subpage</title>
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
<form name="first" method="post" action="ex%201.1.php">
    First name<input type="text" name="firstName" placeholder="First name"><br>
    Last name<input type="text" name="lastName" placeholder="Last name"><br>
    Card number<input type="text" name="cardNumber" placeholder="Card number"><br>
    Number <input type="number" name="person" placeholder="number of person"><br><br>
    <input type="submit" name="send" value="send">

</form>
<br><br>
<a href="ex%201.2.php"><button>Next</button></a>
</body>
</html>

