<?php
/*
 * Napisz skrypt, który za pomocą cookies zlicza liczbę odwiedzin strony
 * przez danego użytkownika i po osiągnięciu zadanej wartości wyświetla stosowną informację.
 */
?>
    <!doctype html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Exercise 2</title>
    </head>
<?php
$file = fopen("licznik.txt","r");
$counter = fgets($file);
fclose($file);

if(!isset($_COOKIE['visit'])) {
    setcookie('visit',$counter ,time()-60);
    $counter++;
    $file = fopen("licznik.txt","w");
    fwrite($file, $counter);
    fclose($file);
}
echo"Number of visits <b>$counter</b>";
?>