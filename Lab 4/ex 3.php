<?php
/*
 * Stwórz prosty formularz do obsługi zadania.
 * Napisz funkcję,która przyjmie jako pierwszy argument ścieżkę (np."./php/images/network"),
 * jako drugi nazwę katalogu,a jako trzeci,opcjonalny parametr rodzaj operacji dowykonania:
 * -read-odczytanie wszystkich elementów w katalogu(domyślna wartość parametru);
 * -delete-usunięcie wskazanego katalogu w podanej ścieżce;
 * -create-stworzenie katalogu w podanej ścieżce.
 * Zwróć odpowiedni komunikat (listę elementów lub czy udało się stworzyć/usunąć katalog).
 * Przy próbie odczytu pamiętaj o sprawdzeniu,czy dany katalog istnieje,
 * a przy próbie usunięcia-czy katalog jest pusty i czy istnieje.
 * Pamiętaj również o sprawdzeniu,czy ostatnim znakiem ścieżki jest"/"
 * -ułatwi to wykonanie powyższych instrukcji.
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
<h1  class="text"><b>Directory</b></h1>
<hr>
<form name="four" action="ex%203.php" method="post">
    <fieldset>
        <legend class="login2">Directory</legend>
        <fieldset class="login">
            <span class="login2">File path <input type="text" class="button3" name="path" placeholder="path"></span><br>
            <span class="login2">Directory name<input type="text" class="button3" name="name" placeholder="name"></span><br>
            <span class="login2">Operation</span>
            <select name="operation" required class="button3">
                <option value="1">Read</option>
                <option value="2">Delete</option>
                <option value="3">Create</option>

            </select>
            <span class="login2"> <input type="submit" class="button4" value="Send"></span>
        </fieldset>
        <span class="login2"><?php diretory();?><br></span>
    </fieldset>
</form>

<?php
function diretory(){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $path = $_POST['path'];

//        if ($path[strlen($path)-1] != "\." ){
//            echo "You need to add a \ at the end";
//        }
        $name = $_POST['name'];
        $dir = $path.$name;

        switch ($_POST['operation']){
            case 1:
                    opendir($dir);
                    if (!($fd = opendir($dir)))
                        exit("I can't open directory.");

                    while (($file = readdir($fd)) !==false)
                        echo "$file<br> \n";

                    closedir($fd);
                break;
            case 2:
                if (file_exists($dir)){
                    rmdir($dir);
                    echo "You delete directory";
                }else echo "The specified directory does not exist";


                break;
            case 3:
                if (file_exists($dir)){
                    mkdir($dir);
                    echo "You create a new directory";
                }else echo "The specified directory does not exist";

                break;
        }


    }
}

?>
</body>
</html>


