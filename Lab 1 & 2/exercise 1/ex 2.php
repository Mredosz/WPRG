<?php
// Napisz funkcję liczącą średnicę koła (w parametrze podajemy promień).



function diameter($r){
    if ($r<=0){
        return "Value must be greater than 0";
    }
    echo "Circle area for the radius ".$r." is: ";
    return (2*$r);
}

echo diameter(5).'<br>';
echo diameter(-2).'<br>';
echo diameter(10).'<br>';
echo diameter(26).'<br>';