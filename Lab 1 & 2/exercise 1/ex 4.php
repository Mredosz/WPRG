<?php

// Napisz funkcję, która z podanego numeru PESEL odczyta datę urodzenia i zwróci ją wformacie dd-mm-rr.


function pesel($id){


if (strlen($id)!=11){
    return "You entered wrong number";
}else

    if ($id[2]>=2){
        $yy = "20".$id[0].$id[1];
    }else {
        $yy = "19" . $id[0] . $id[1];
    }
    $dd = $id[4].$id[5];
    $mm = (($id[2].$id[3]));

   if ($mm>12) {
       $mm-=20;

        if ($mm == 1 || $mm == 3 || $mm == 5 || $mm == 7 || $mm == 8 || $mm == 10 || $mm == 12) {
            if ($dd <= 31 && $dd >= 1) {
                if ($mm<10) {
                    return "Your birthday is: " . $dd . '-0' . $mm . '-' . $yy . '<br>';

                }else return "Your birthday is: " . $dd . '-' . $mm . '-' . $yy . '<br>';
            }else return "You entered wrong number<br>";
        }else if ($mm==2){
            if ($dd <= 28 && $dd >= 1) {
                return "Your birthday is: " . $dd . '-0' . $mm . '-' . $yy . '<br>';
            }else return "You entered wrong number<br>";
        }else if ($mm == 4 || $mm == 6 || $mm == 9 || $mm == 11){
            if ($dd <= 30 && $dd >= 1) {
                if ($mm<10) {
                    return "Your birthday is: " . $dd . '-0' . $mm . '-' . $yy . '<br>';

                }else return "Your birthday is: " . $dd . '-' . $mm . '-' . $yy . '<br>';
            }else return "You entered wrong number<br>";
        }
    }else if ($mm<=12){
       if ($mm == 1 || $mm == 3 || $mm == 5 || $mm == 7 || $mm == 8 || $mm == 10 || $mm == 12) {
           if ($dd <= 31 && $dd >= 1) {
               if ($mm<10) {
                   return "Your birthday is: " . $dd . '-' . $mm . '-' . $yy . '<br>';

               }else return "Your birthday is: " . $dd . '-' . $mm . '-' . $yy . '<br>';
           }else return "You entered wrong number<br>";
       }else if ($mm==2){
           if ($dd <= 28 && $dd >= 1) {
               return "Your birthday is: " . $dd . '-' . $mm . '-' . $yy . '<br>';
           }else return "You entered wrong number<br>";
       }else if ($mm == 4 || $mm == 6 || $mm == 9 || $mm == 11){
           if ($dd <= 30 && $dd >= 1) {
               if ($mm<10) {
                   return "Your birthday is: " . $dd . '-' . $mm . '-' . $yy . '<br>';

               }else return "Your birthday is: " . $dd . '-' . $mm . '-' . $yy . '<br>';
           }else return "You entered wrong number<br>";
       }
   }else return "You entered wrong number<br>";
}

echo pesel('32252301156');
echo pesel('12121678925');
echo pesel('78031139456');
echo pesel('022826081121');