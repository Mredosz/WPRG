<?php
/*
 * Napisz skrypt tworzący listę odnośników.
 * Wszystkie adresy wraz z ich opisami przechowywane będą w pliku tekstowym.
 * Każdy wiersz pliku będzie miał schematyczną postać
 * (adres;opis):http://ardes_odnośnika/;opisadresu
 */
?>
    <form name="four" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" enctype="multipart/form-data">
        <input type="text" name="link">
        <input type="text" name="description">
        <input type="file" name="file">
        <input type="submit" name="send" value="Send">
    </form>
    <?php
    if(isset($_POST["send"]))
    {
        if(isset($_FILES["file"]))
        {
            $link = $_POST['link'].";".$_POST['description']."\n";

            if (!($fd = fopen("text.txt", "a+"))) {
                exit("I can't open file.");
            }else if(fwrite($fd,$link) ===false){
                echo "The entry was not made";
            }else echo "File was write";
            fclose($fd);
        }
    }
    ?>
