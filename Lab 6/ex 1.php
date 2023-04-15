<?php
/*
 * 1.Pierwsza podstrona ma pobierać dane ogólne np. nr karty, dane zamawiającego, ilość osób itp.
 * 2.Druga podstrona w zależności od ilości osób pozwala pobrać ich dane
 * (pobrano na pierwszej podstronie 3 osoby, druga podstrona pozwala pobrać dane od 3 osób).
 * Dodatkowo 2 przyciski zapisujący dane w sesji i pozwalający przejść do podstrony trzeciej.
 * 3.Trzecia podstrona wyświetla podsumowanie wszystkich zebranych danych.
 */
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Exercise 1</title>
    <style>
        body {
            background: url("https://4.bp.blogspot.com/-76Wsi8Gdz9Q/XwoHD2DtwjI/AAAAAAAB7C4/FOlbbIQxMyMGIr7EKx5tXI-7Tq_qkX1PgCPcBGAsYHg/s1600/Uzaki-chan%2Bwa%2BAsobitai%2521%2B-%2BEpisode%2B1%2B-%2BFreaky%2BCat%2BFreaks%2BOut.gif");
            background-color: black;
            color: lime;
        }
    </style>
</head>

<a href="ex%201.1.php" ><h1>First subpage</h1></a><br>
<a href="ex%201.2.php"><h1>Second subpage</h1></a><br>
<a href="ex%201.3.php"><h1>Third subpage</h1></a><br>
