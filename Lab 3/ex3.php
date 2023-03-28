<?php
/*
 * Napisz skrypt obliczający datę Wielkanocy dla podanego roku.
 */
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Exercise 3</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: black">
<h1  class="text"><b>Easter Decoding</b></h1>
<hr>
<form name="three" action="ex3.php" method="post">
    <fieldset>
        <legend class="login2">Easter</legend>
        <fieldset class="login">
            <span class="login2">Year: <input type="text" class="button3" name="year" placeholder="Year"></span><br>
            <span class="login2"> <input type="submit" class="button4" value="Log in"></span>

        </fieldset>
        <span class="login2"><?php echo getYear()?><br></span>
    </fieldset>
</form>
<?php
function getYear()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $r = $_POST['year'];
        if ($r<=1582 && $r>=1){
            $x = 15;
            $y = 6;
        }else if ($r<=1699 && $r>=1583){
            $x = 22;
            $y = 2;
        }else if ($r<=1799 && $r>=1700){
            $x = 23;
            $y = 3;
        }else if ($r<=1899 && $r>=1800){
            $x = 23;
            $y = 4;
        }else if ($r<=2099 && $r>=1900){
            $x = 24;
            $y = 5;
        }else if ($r<=2199 && $r>=2100){
            $x = 24;
            $y = 6;
        }else return "You entered the wrong year";
        
        $a = $r%19;
        $b = $r%4;
        $c = $r%7;
        $d = ((19*$a)+$x)%30;
        $f = ((2*$b)+(4*$c)+(6*$d)+$y)%7;

        if ($f==6 && $d==29){
            return "Easter is April 26";
        }else if ($f==6 && $d==28){
            return "Easter is April 18";
        }else if (($d+$f)<10){
            return "Easter is March ".(22+$d+$f);
        }else if (($d+$f)>9){
            return "Easter is April ".($d+$f-9);
        }
    }
}
?>
</body>
</html>
