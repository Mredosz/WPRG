<?php
//Wykonaj poniższy formularz a następnie wyświetl
// wszystkie wypełnione pola w postaci nieuporządkowanej listy.
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>exercise 1</title>

</head>
<body>

<html>

<FORM name="first" action="ex1.php" method="POST">
    <fieldset>
        <legend>Contact form</legend>
        <table>
        <ul>
            <TR>
                <TD>
                    <li>Name and Surname*</li>
                </TD>
                <td>
                    <input name="name" i placeholder="Your name and surname" required>
                </td>
            </tr>
            <tr>
                <td>
                    <li>E-mail adress*</li>
                </td>
                <td>
                    <input type="email" name="email" placeholder="Your e-mail" required>
                </td>
            </tr>
            <tr>
                <td>
                    <li>Phone number*</li>
                </td>
                <td>
                    <input name="phone" placeholder="Allowed characters digits, spaces" required>
                </td>
            </tr>
            <tr>
                <td>
                    <li>Select theme*</li>
                </td>
                <td>
                    <select name="list" required>
                        <option>Making a website</option>
                        <option>Making a mobile application</option>
                        <option>Graphics</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <li>Message Content*</li>
                </td>
                <td>
                    <textarea name="textarea" rows="4" cols="50"
                              placeholder="Enter the content of your message here...." required></textarea>
                </td>
            </tr>


            <tr>
                <td>
                    <li>Preferred form of contact</li>
                </td>
            </tr>
            <tr>
                <td>
                    <input type=checkbox name="contact" value="E-mail">E-mail
                </td>
            </tr>
            <tr>
                <td>
                    <input type=checkbox name="contact" value="Phone number">Phone number
                </td>
            </tr>
            <tr>
                <td>
                    <li>Do you already have a website?</li>
                </td>
            </tr>
            <tr>
                <td>
                    <input type=radio name="website" value="Yes">Yes
                </td>
            </tr>
            <tr>
                <td>
                    <input type=radio name="website" value="No" checked="checked">No
                </td>
            </tr>
            <tr>
                <td>
                    <input type=file name="file" value="Select file">
                </td>
            </tr>

        </ul>
        </table>

    </fieldset>
    <tr>
        <td><input type=submit value="Send form"></td>
    </tr>
</FORM>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    echo "You entered this data: <br>";
    echo "Name and surname: {$_POST['name']} <br>";
    echo "E-mail adress: {$_POST['email']} <br>";
    echo "Phone number: {$_POST['phone']} <br>";
    echo "Theme: {$_POST['list']} <br>";
    echo "Message: {$_POST['textarea']} <br>";
    if (isset($_POST['contact'])){
        echo "Contact form: {$_POST['contact']} <br>";
    }else echo "Contact form: You mast pick up one.<br>";
    echo "Website: {$_POST['website']} <br>";
    echo "File: {$_POST['file']} <br>";

}
?>
</body>
</html>

