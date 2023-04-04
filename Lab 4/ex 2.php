<?php
/*
 * Napisz funkcję rekurencyjną liczącą silnię lub dowolny wyraz ciągu
 * Fibonacciego oraz jej zwykły odpowiednik(nierekurencyjny).
 * Obie funkcje powinny przyjmować stosowny argument.
 * Następnie zmierz działanie obu funkcji dla argumentu podanego przez użytkownika i wyświetl iformacje o tym,
 * która funkcja i o ile działała szybciej.
 */
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Exercise 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: black">
<h1  class="text"><b>Day of birth</b></h1>
<hr>
<form name="four" action="ex%202.php" method="get">
    <fieldset>
        <legend class="login2">Day</legend>
        <fieldset class="login">
            <span class="login2">Day <input type="number" class="button3" name="number" placeholder="number"></span><br>
            <span class="login2"> <input type="submit" class="button4" value="Send"></span>
        </fieldset>
        <span class="login2"><?php timeend();?><br></span>
    </fieldset>
</form>

<?php
function silniaReku($n,&$time){
    $start = microtime(true);
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if ($n >1) {

            return $n*silniaReku($n-1,$time);
        }

        $end = microtime(true);
        $time = $end-$start;
        return $n;


    }
}
function silnia($number,&$time2){
    $start=microtime(true);
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $sum = 1;
        for ($i = 1; $i<= $number; $i++){
            $sum*=$i;
        }
        $end=microtime(true);

        $time2=$end-$start;
        return $sum;
    }
}
function timeend(){
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $number = $_GET['number'];
        $time =0;
        $time2 =0;

        $silniaReku =silniaReku($number,$time);
        $silnia =silnia($number,$time2);

        $time3 = $time2-$time;

        echo "Reku:\n
        Number: " . $silniaReku. " time ". $time."<br>";
        echo "Sil:\n
        Number: " . $silnia. " time ". $time2."<br>";
        echo "Fastest is Sil " . $time3;

    }
}
?>
</body>
</html>

