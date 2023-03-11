<?php
/*
 * Program do cenzurowania.
 * Napisz funkcję, która zastąpi wszystkie niepożądane słowa gwiazdkami (*).
 * Funkcja ma zawierać w sobie tablicę niepożądanych słów.
 * Zdanie do ocenzurowania powinna otrzymać w parametrze.
 */



function censorship($text){
    $tab =['ala', '911', 'wege'];

    foreach ($tab as $item){
     $cens = str_repeat('*',strlen($item));
     $text= str_ireplace($item, $cens, $text);
    }
    return $text;
}
echo censorship("Ala jest wege i ma kota ktory lubi liczbe 911");