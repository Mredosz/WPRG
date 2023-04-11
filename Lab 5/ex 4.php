<?php
/*
 * Napisz skrypt, w którym użytkownikom łączącym z wybranych adresów IP
 * zapisanych w pliku tekstowym będzie wyświetlana inna strona niż wszystkim pozostałym.
 * Podpowiedź: do sprawdzenia IP można użyć $_SERVER['REMOTE_ADDR'],
 * a osobne strony (pliki PHP) można podłączyć poprzez include/require.
 */
?>



<?php

function ip()
{
    define('ADRESS', 'ip.txt');

    $ip = $_SERVER['REMOTE_ADDR'];
    if (file_exists(ADRESS)) {
        $file = fopen(ADRESS, "r");
        $array = [];
        while (!feof($file)) {
            $array[] = fgets($file);
        }
        for ($i = 0; $i <count($array)-1 ; $i++) {
            if ($array[$i] == $ip){
                echo $array[$i];
                return true;
            }
        }
        return false;
    }
}
    if (ip()){
        include "ex4.1.php";
    }else include "ex4.2.php";



?>
