<?php
/*
 * Napisz funkcję, zwracającą maksymalny element tablicy losowych liczb
 * (bez używania gotowych funkcji PHP) w 4 wersjach: for, while, do while, foreach.
 */
for ($i = 0; $i < 100; $i++) {
    $tab[$i] = rand(1,100);
}

function maxFor($tab){
    $max = 0;
    for ($i = 0; $i < count($tab); $i++) {
        if ($tab[$i]>$max){
            $max = $tab[$i];
        }
    }
    return "Max value in for function is: ".$max.'<br>';
}
function maxWhile($tab){
    $max = 0;
    $i = 0;
    while ($i < count($tab)) {

        if ($tab[$i]>$max){
            $max = $tab[$i];
        }
        $i++;
    }
    return "Max value in while function is: ".$max.'<br>';
}
function maxDowhile($tab){
    $max = 0;
    $i = 0;
    do {
        if ($tab[$i]>$max){
            $max = $tab[$i];
        }
        $i++;
    }while ($i < count($tab));
    return "Max value in do while function is: ".$max.'<br>';
}
function maxForeach($tab){
    $max = 0;
    foreach ($tab as $item) {
        if ($item > $max) {
            $max = $item;
        }
    }
    return "Max value in foreach function is: ".$max.'<br>';
}

echo maxFor($tab);
echo maxWhile($tab);
echo maxDowhile($tab);
echo maxForeach($tab);