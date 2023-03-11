<?php
//Zmodyfikuj funkcję z zadania 1.1, by przyjmowała argument
// - liczbę rzutów kostką. I zwracała tablicę wyników.

function roll($throw) {
    if ($throw>0) {
        for ($i = 0; $i < $throw; $i++) {
            $dice[$i] = rand(1, 6);
            return $dice[$i];
        }
    }else return "Enter a number greater than 0";

}
for ($i = 0; $i < 6; $i++) {
    echo roll(6).'<br>';;
}

