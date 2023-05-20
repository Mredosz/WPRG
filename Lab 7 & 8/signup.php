<?php
$conn = mysqli_connect('localhost', 'root', '', 'mojabaza');
//When button sign up is clicked

if (isset($_POST['submit'])) {
//mysqli_real_escape_string() remove all special characters from string
//md5 codding string into 32 hexadecimal number

    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $password = md5($_POST['password']);
    $passwordRepeat = md5($_POST['passwordRepeat']);
    if ($_POST['level']=='User'){
        $level = 1;
    }else{
        $level=2;
    }

    $select = "SELECT * FROM uzytkownik WHERE login = '$login' OR(login ='$login' AND haslo = '$password')";
    $result = mysqli_query($conn, $select);
//When there is an account in the database with the given email and password
//display error Account already exist
    if (mysqli_num_rows($result) > 0) {
        $error[] = "Account already exist!";
    } else {
        if ($_POST['password'] != $_POST['passwordRepeat']) {
            $error[] = "Passwords must be the same";
        } else {
//Add new values into sql
            $insert = "INSERT INTO uzytkownik(login, haslo, id_rola) VALUES ('$login', '$password', '$level')";
            mysqli_query($conn, $insert);
//Send users to login page
            header("Location: login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        body {
            background-color: black;
            color: red;
        }
    </style>
</head>
<body>
<ul class="nav nav-pills ms-auto flex-nowrap">
    <li class="nav-item"><a class="nav-link" href="ex%201.php">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="all_car.php">All Cars</a></li>
    <li class="nav-item"><a class="nav-link" href="add_car.php">Add Car</a></li>
    <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
    <li class="nav-item"><a class="nav-link" href=login.php>Log In</a></li>

</ul>
<!--Form to sign up-->

<form action="" method="post">
    <div class="container">
        <p>Please complete the information to create an account.</p>
        <!--Container to displays errors-->

        <?php
        if (isset($error)) {
            foreach ($error as $item) {
                echo '<span class="error">' . $item . '</span>';
            }
        }
        ?>


        <label for="login"><b>Login</b></label>
        <input type="text" name="login" placeholder="Enter Your Login" required
               value="<?php if (isset($_POST['login'])) {
                   echo $_POST['login'];
               } ?>">

        <label for="password"><b>Password</b></label>
        <input type="password" name="password" placeholder="Enter Your Password" required>

        <label for="passwordRepeat"><b>Repeat Password</b></label>
        <input type="password" name="passwordRepeat" placeholder="Repeat Password" required>

        <label>User<input type="radio" name="level" value="User" checked></label>
        <label>Admin<input type="radio" name="level" value="Admin"></label>

        <div class="clearfix">
                <button type="reset" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn" name="submit">Sign Up</button>
            <p class="p">You already have account? <a href="login.php">Log in</a></p>
        </div>
    </div>
</form>
</body>
</html>