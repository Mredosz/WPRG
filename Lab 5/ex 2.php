<?php
/*
 * Napisz skrypt ukazujący liczbę odwiedzin witryny.
 * Dane powinny być zapisywane w postaci tekstowej w pliku licznik.txt.
 * Każde wywołanie skryptu będzie powodowało otwarcie tego pliku,
 * odczyt znajdujących się w nim danych, zwiększenie odczytanej wartości o jeden
 * i ponowny zapis – zaktualizowanych już danych – do pliku. Upewnij się, że plik
 * istnieje - jeśli nie, stwórz go i ustaw liczbę odwiedzin na 1.
 */
?>
<?php
define('COUNTER', 'licznik.txt');

if(file_exists(COUNTER))
{
    $file = fopen(COUNTER, "r");
    flock($file, 1);
    $var = fgets($file, 100);
    flock($file, 3);
    fclose($file);
    $var++;
}
else
{
    $var = 1;
}
$file = fopen(COUNTER, "w");
flock($file, 2);
fwrite($file, $var);
flock($file, 3);
fclose($file);
echo $var;
?>

    <!doctype html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Exercise 2</title>
    </head>
    <body>
<?php
define('COUNTER2', 'licznik.txt');

if(file_exists(COUNTER2))
{
    $file = fopen(COUNTER2, "r");
    flock($file, 1);
    $var = fgets($file, 100);
    flock($file, 3);
    fclose($file);
    $var++;
}
else
{
    $var = 1;
}
$file = fopen(COUNTER2, "w");
flock($file, 2);
fwrite($file, $var);
flock($file, 3);
fclose($file);
echo $var;
?>

    </body>
</html>
