<?php
/*
 * Napisz skrypt realizujący kalkulator prosty i kalkulator zaawansowany.
 * Kalkulator prosty ma obliczać następujące działania:
 * Dodawanie
 * Odejmowanie
 * Mnożenie
 * Dzielenie
 * Kalkulator zaawansowany ma obliczać następujące działania:
 * Cosinus
 * Sinus
 * Tangens
 * Binarne na dziesiętne
 * Dziesiętne nabinarne
 * Dziesiętne na szesnastkowe
 * Szesnastkowe na dziesiętne
 * Stopnie na radiany
 * Radiany na stopnie
 */
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Exercise 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color:firebrick">
<h1  class="h1"><b>Calculator</b></h1>
<hr>
<h1 class="h2"><b>Simple</b></h1>
<?php
if (isset($_POST['number1'])){
    $number1 = $_POST['number1'];
}else $number1 = " ";
if (isset($_POST['number2'])){
    $number2 = $_POST['number2'];
}else $number2 = " ";
if (isset($_POST['number3'])){
    $number3 = $_POST['number3'];
}else $number3 = " ";
?>
<FORM name="twice" action="ex2.php" method="post">
    <fieldset>
        <legend> Calculator</legend>
        <input type="number" name="number1" class="button" value="<?php echo $number1?>" >
        <span class="radio"><label><input type="radio" name="operation" value="1"> +</label></span>
        <span class="radio"><label><input type="radio" name="operation" value="2"> -</label></span>
        <span class="radio"><label><input type="radio" name="operation" value="3"> x</label></span>
        <span class="radio"><label><input type="radio" name="operation" value="4"> ÷</label></span>
        <input type="number" name="number2" class="button" value="<?php echo $number2?>" >
        <input type="submit" name="score" value="=" class="button2">
        <input type="text" name="score2" value='<?php echo operationSimple()?>' class="button">
    </fieldset>
</FORM>
<?php
function operationSimple(){
    $score = " ";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['operation'])) {
            switch ($_POST['operation']) {
                case 1:
                    $score = $_POST['number1'] + $_POST['number2'];
                    break;
                case 2:
                    $score = $_POST['number1'] - $_POST['number2'];
                    break;
                case 3:
                    $score = $_POST['number1'] * $_POST['number2'];
                    break;
                case 4:
                    $score = $_POST['number1'] / $_POST['number2'];
                    break;
            }
        }else return " ";
    }
    return $score;
}
?>

<p>
<hr>
<h1 class="h2"> Advanced</h1>
<FORM name="thr" action="ex2.php" method="post">
    <fieldset>
        <legend> Calculator</legend>
        <input type="number" name="number3" class="button" value="<?php echo $number3?>" required>

        <select name="operationAdvanced" required class="button">
            <option value="1">Cos</option>
            <option value="2">Sin</option>
            <option value="3">Tg</option>
            <option value="4">Binary to dean</option>
            <option value="5">Dean to binary</option>
            <option value="6">Dean to hex</option>
            <option value="7">Hex to dean</option>
            <option value="8">Degrees to radians</option>
            <option value="9">Radians to degrees</option>
        </select>

        <input type="submit" name="scoreAdvanced" value="=" class="button2">
        <input type="text" name="score2Advanced" value='<?php echo operationAdvanced()?>' class="button"><br>
    </fieldset>
</FORM>
</p>

<?php
function operationAdvanced(){
    $score = " ";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['operationAdvanced'])) {
            switch ($_POST['operationAdvanced']) {
                case 1:
                    $score = cos($_POST['number3']);
                    break;
                case 2:
                    $score = sin($_POST['number3']);
                    break;
                case 3:
                    $score = tan($_POST['number3']);
                    break;
                case 4:
                    $score = bindec($_POST['number3']);
                    break;
                case 5:
                    $score = decbin($_POST['number3']);
                    break;
                case 6:
                    $score = dechex($_POST['number3']);
                    break;
                case 7:
                    $score = hexdec($_POST['number3']);
                    break;
                case 8:
                    $score = deg2rad($_POST['number3']);
                    break;
                case 9:
                    $score = rad2deg($_POST['number3']);
                    break;
            }
        }else return " ";
    }
    return $score;
}
?>
</body>
</html>
