<?php
/*
 * 2.Druga podstrona w zależności od ilości osób pozwala pobrać ich dane
 * (pobrano na pierwszej podstronie 3 osoby, druga podstrona pozwala pobrać dane od 3 osób).
 * Dodatkowo 2 przyciski zapisujący dane w sesji i pozwalający przejść do podstrony trzeciej.
 */

session_start();

if (isset($_POST['firstNames'])){
    $_SESSION['firstNames'] = $_POST['firstNames'];
}
if (isset($_POST['lastNames'])){
    $_SESSION['lastNames'] = $_POST['lastNames'];
}
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Second subpage</title>
    <style>
        body {
            background-color: black;
            color: red;
        }
    </style>
</head>
<body>
<h1>Other people</h1>
<hr color="red">
<form name="second" method="post" action="ex%201.2.php">
    <?php
    for ($i = 0; $i < $_SESSION['personnumber']; $i++) {
        echo ($i+1)." Person  ";
        echo "<input type=\"text\" name=\"firstNames[]\" placeholder=\"First name\">";
        echo "<input type=\"text\" name=\"lastNames[]\" placeholder=\"Last name\"><br>";
    }
    ?>
    <input type="submit" name="send" value="send">

</form>


<br><br>
<a href="ex%201.3.php"><button>Next</button></a>
</body>
</html>

