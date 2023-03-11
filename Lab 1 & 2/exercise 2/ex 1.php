<?php
/*
 * Napisz funkcję, która zawiera w sobie tablicę losowych liczb.
 * Funkcja powinna zwracać wartość elementu tablicy o indeksie podanym jako argument.
 */

function returnIndex($index){
    $tab = [];
    if ($index<0){
        return "Value must be greater than 0";
    }
    for ($i = 0; $i<$index+1; $i++){
        $tab[$i] = array_unshift($tab,PHP_INT_MIN,PHP_INT_MAX);
    }
    return $tab[$index].'<br>';
}

echo returnIndex(0);
echo returnIndex(1);
echo returnIndex(99);
echo returnIndex(-1);