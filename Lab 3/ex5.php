<?php
/*
 * Napisz skrypt logowania(bez obsługi sesji).
 */
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Exercise 5</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: black">
<h1  class="text"><b>Login form</b></h1>
<hr>
<form name="five" action="ex5.php" method="post">
    <fieldset>
        <legend class="login2">Log in</legend>
        <fieldset class="login">
        <span class="login2">Login: <input type="text" class="button3" name="login" placeholder="Login"></span><br>
        <span class="login2">Password: <input type="password" class="button3" name="password" placeholder="Password"></span><br><br>
        <span class="login2"> <input type="submit" class="button4" value="Log in"></span>

        </fieldset>
        <span class="login2"><?php login()?></span>
    </fieldset>
</form>

<?php
function login(){
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if ($_POST['login'] != 'admin' && $_POST['password'] != 'abcd1234') {
        echo "You entered wrong login and password";
    }else if ($_POST['login'] == 'admin') {
            if ($_POST['password'] == 'abcd1234') {
                echo "You have logged in";
            }else echo "You entered the wrong password";
        }else echo "You entered wrong login";
    }
}
?>

</body>
</html>