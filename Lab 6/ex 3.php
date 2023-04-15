<?php
/*
 * Zmodyfikuj skrypt licznika, który nie będzie uwzględniał przeładowań
 * (odświeżania) strony. Wykorzystaj pliki cookie.
 */
?>
    <!doctype html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Exercise 3</title>
    </head>
<?php
$file = fopen("licznik2.txt","r");
$counter = fgets($file);
fclose($file);

if(!isset($_COOKIE['visit'])) {
    setcookie("visit", 1);
    $counter++;
    $file = fopen("licznik2.txt","w");
    fwrite($file, $counter);
    fclose($file);
}
echo"Number of visits <b>$counter</b>";
?>