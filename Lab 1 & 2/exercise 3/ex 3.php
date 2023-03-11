<?php
//Napisz funkcję, która wyświetli w konsoli tabliczkę mnożenia
// w formie kwadratu o boku podanym jako parametr.

function multi($number){
    if ($number>0) {
        for ($i = 0; $i <= $number; $i++) {
            for ($j = 0; $j <= $number; $j++) {
                echo $tab[$i][$j] = $i * $j . ' ';
            }
            echo '<br>';
        }
        echo '<br><br>';
    }else echo "Enter a number greater than 0<br><br>";
}
multi(-6);
multi(1);
multi(2);
multi(3);
multi(4);