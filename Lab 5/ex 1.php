<?php
/*
 * Napisz skrypt, który odwróci kolejność wierszy w pliku tekstowym
 * (tzn. ostatni wiersz ma się stać pierwszym, przedostatni drugim itd...).
 * Do wykonania zadania stwórz prosty formularz z możliwością wyboru pliku
 * (<INPUTTYPE=”FILE”>).
 */
?>
<form name="four" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="send" value="Send">
</form>
<?php
if(isset($_POST["send"]))
{
    if(isset($_FILES["file"]))
    {
        $file = fopen($_FILES["file"]["tmp_name"], "r");
        $array = [];
        while (!feof($file)){
            $array[] = fgets($file);
            echo  $array[count($array)-1] . "<br>";
        }
        echo "<br><br>";
        for ($i = count($array)-1; $i >=0 ; $i--) {
            echo $array[$i]. "<br>";

        }
    }
}
?>
