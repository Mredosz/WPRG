<?php
/*
 * Napisz skrypt, który będzie pobierał ciąg znaków PESEL i z tego
 * ciągu rozkoduje informacje zawartą w nim (data urodzenia i płeć).
 */
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Exercise 4</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: black">
<h1  class="text"><b>Pesel Decoding</b></h1>
<hr>
<form name="four" action="ex4.php" method="post">
    <fieldset>
        <legend class="login2">Pesel number</legend>
        <fieldset class="login">
            <span class="login2">Pesel number: <input type="text" class="button3" name="pesel" placeholder="Pesel"></span><br>
            <span class="login2"> <input type="submit" class="button4" value="Log in"></span>

        </fieldset>
        <span class="login2"><?php pesel()?><br></span>
        <span class="login2"><?php getGender()?><br></span>
    </fieldset>
</form>

<?php
function pesel(){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_POST['pesel'];
        if (strlen($id) != 11) {
            return "You entered wrong number";
        } else
        $yy = substr($id,0,2);
        $mm = substr($id,2,2);
        $dd = substr($id,4,2);
        $gender = substr($id,9,1);

        if ($mm<=92 && $mm>= 81){
            $yy+=1800;
            $mm-=80;
        } else if ($mm<=32 && $mm>= 21) {
            $yy+=2000;
            $mm-=20;
        }else if ($mm<=52 && $mm>= 41) {
            $yy+=2100;
            $mm-=40;
        }else if ($mm<=72 && $mm>= 61) {
            $yy+=2200;
            $mm-=60;
        } else if ($mm<=12 && $mm>=1) {
            $yy+=1900;
        }
        if ($mm<10){
            echo "Your date of birth is ".$dd."-0".$mm."-".$yy;
        }else echo "Your date of birth is ".$dd."-".$mm."-".$yy;
    }
}
function getGender(){
if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_POST['pesel'];
        if (strlen($id) != 11) {
            echo "You entered wrong number";
        } else{
            if ($id[9]%2==0){
                echo "Your gender is female";
            }else echo "Your gender is male";
        }
    }
}
?>
</body>
</html>
