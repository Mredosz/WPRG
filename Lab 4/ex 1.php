<?php
/*
 * Utwórz prosty formularz,który pozwoli na wybranie daty urodzenia.
 * Dane powinny zostać przesłane za pomocą metody GET.
 * Po podaniu daty przez użytkownika,należy zapomocą osobnych funkcji sprawdzić i wyświetlić następujące informacje:
 * -w jaki dzień tygodnia urodził się użytkownik;
 * -ukończone lata użytkownika;
 * -ilość dni do najbliższych,przyszłych urodzin.
 */
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Exercise 1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: black">
<h1  class="text"><b>Day of birth</b></h1>
<hr>
<form name="four" action="ex%201.php" method="get">
    <fieldset>
        <legend class="login2">Day</legend>
        <fieldset class="login">
            <span class="login2">Day <input type="date" class="button3" name="day" placeholder="day"></span><br>
            <span class="login2"> <input type="submit" class="button4" value="Log in"></span>
        </fieldset>
        <span class="login2"><?php dayOfWeek();?><br></span>
        <span class="login2"><?php completedYears();?><br></span>
        <span class="login2"><?php nearestBirthday();?><br></span>
    </fieldset>
</form>

<?php
function dayOfWeek(){
    if ($_SERVER['REQUEST_METHOD'] == "GET") {

        $day = $_GET['day'];

        // week day of birth
        $yy = substr($day,0,4);
        $mm = substr($day,5,2);
        $dd = substr($day,8,2);
        $time1 = mktime(0,0,0,$mm,$dd,$yy);
        $data = getdate($time1);
        $dayOfWeek = $data["weekday"];

        echo "You were born in " . $dayOfWeek;

    }
}
function completedYears(){
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $day = $_GET['day'];

        // completed years
        $yy = substr($day,0,4);
        $mm = substr($day,5,2);
        $dd = substr($day,8,2);
        $time1 = mktime(0,0,0,$mm,$dd,$yy);
        $currentDateTime = date('Y-m-d');
        $yy2 = substr($currentDateTime,0,4);
        $mm2 = substr($currentDateTime,5,2);
        $dd2 = substr($currentDateTime,8,2);
        $time2 = mktime(0,0,0,$mm2,$dd2,$yy2);
        $years = abs(ceil(($time1-$time2)/86400));
        $years = floor($years/365);

        echo "You are over the age of  " . $years;

    }
}
function nearestBirthday(){
    if ($_SERVER['REQUEST_METHOD'] == "GET") {

        $day = $_GET['day'];

        $mm = substr($day,5,2);
        $dd = substr($day,8,2);
        $currentDateTime = date('Y-m-d');

        $mm2 = substr($currentDateTime,5,2);
        $dd2 = substr($currentDateTime,8,2);

        // nearest birthday
        $time3 = mktime(0,0,0,$mm,$dd,0);
        $time4 = mktime(0,0,0,$mm2,$dd2,0);
        $birth = ceil(($time4-$time3)/86400);
        if ($birth<0){
            $birth+=365;
        }
        echo "Your next birthday is " . $birth. " days";
    }
}
?>
</body>
</html>
