<?php
/*
 * Kalkulator pól powierzchni (używając switch).
 * -program zapytuje, jaką figurę chcemy obliczyć (trójkąt, prostokąt, trapez)
 * -w zależności od wybranej figury program uruchamia odpowiednią funkcję
 * -każda figura ma mieć swoją osobną funkcję, która zapyta o wymiary i policzy pole
 */

function triangle($a,$h){
    if ($a<=0) {
        return" Number 'a' in triangle is less than 0 ".'<br>';
    }
    if ($h<=0){
        return " Number 'h' in triangle is less than 0 ".'<br>';
    }
    return "Triangle area " . $a*(0.5*$h).'<br>';

}
function rectangle($a,$h){
    if ($a<=0) {
        return" Number 'a' in rectangle is less than 0 ".'<br>';
    }
    if ($h<=0){
        return " Number 'h' in rectangle is less than 0 ".'<br>';
    }
    return "Rectangle area " . $a*$h.'<br>';
}
function trapeze($a,$b,$h){
    if ($a<=0) {
        return" Number 'a' in trapeze is less than 0 ".'<br>';

    }
    if ($b<=0){
        return " Number 'b' in trapeze is less than 0 ".'<br>';
    }
    if ($h<=0) {
        return" Number 'h' in trapeze is less than 0 ".'<br>';
    }

    return "Trapeze area " . ((($a+$b)*$h)*0.5).'<br>';
}
function choice($num, $a, $b  , $h){
    switch ($num){
        case 1:
            return triangle($a,$h);
        case 2:
            return rectangle($a,$h);
        case 3:
            return trapeze($a,$b,$h);
        default:
            echo "You pick wrong number try 1 - 3";
    }
}
echo choice(1,3,0,5).'<br>';
echo choice(2,3,0,5).'<br>';
echo choice(3,3,4,5).'<br>';
echo choice(1,-2,0,5).'<br>';
echo choice(2,3,0,-5).'<br>';
echo choice(3,3,-8,5).'<br>';
echo choice(5,3,0,5).'<br>';