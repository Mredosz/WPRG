<?php
/*
 * Napisz funkcję, która sprawdzi, czy dana liczba jest liczbą pierwszą.
 * W swoim programie umieść zmienną, która policzy wszystkie iteracje pętli,
 * potrzebne dowykonania obliczeń. Spróbuj tak zmodyfikować program, by było
 * potrzeba jak najmniej iteracji (przy zachowaniu prawidłowego działania).
 */

function primeNumber($number, &$repeat){

    if($number==1){
        return false;
    }
    for ($i = 2, $repeat = 1; $i <=$number/2; $i++,$repeat++){
        if ($number%$i==0){
            return false;
        }
    }
return true;
}
$tabTest = [100,11,666,911,1234567];

foreach ($tabTest as $item){
    $repeat = 0;
    if (primeNumber($item,$repeat)){
        echo $item.' yes, repeat '.$repeat.'<br>';
    }else  echo $item.' no, repeat '.$repeat.'<br>';
}