<?php
$conn = mysqli_connect('localhost', 'root', '', 'mojabaza');

if (isset($_POST['submit'])) {
//mysqli_real_escape_string() remove all special characters from string
//md5 codding string into 32 hexadecimal number

    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $password = md5($_POST['password']);

    $select = "SELECT * FROM uzytkownik WHERE login = '$login' AND haslo = '$password'";
    $result = mysqli_query($conn, $select);
//When there is an account in the database with the given email and password
//the user is logged in
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['userName'] = $row['login'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['id_rola'] = $row['id_rola'];
        header("Location: users_index.php");
    } else {
        $error[] = "Wrong password or email";
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
<!--Form to log in-->

<form action="" method="post">
    <div class="container">
        <p>Please complete the information to log in.</p>
        <!--Container to displays errors-->

        <?php
        if (isset($error)) {
            foreach ($error as $item) {
                echo '<span class="error">' . $item . '</span>';
            }
        }
        ?>

        <label for="login"><b>Login</b></label>
        <!--               After misspelling the password, the email remains-->
        <input type="text" name="login" placeholder="Enter Your Login" required
               value="<?php if (isset($_POST['login'])) {
                   echo $_POST['login'];
               } ?>">

        <label for="password"><b>Password</b></label>
        <input type="password" name="password" placeholder="Enter Your Password" required>

        <div class="clearfix">
            <button type="reset">Cancel</button>
            <button type="submit" name="submit">Sign Up</button>
            <p>You don't have account? <a href="signup.php">Sing up</a></p>
        </div>
    </div>
</form>

</body>
</html>