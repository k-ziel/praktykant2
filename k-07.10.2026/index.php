<?php

session_start();

if(isset($_SESSION["user"])) {
    header("Location: kup.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="user">Login: <input type="text" name="user" id="user"></label><br>
        <label for="pass">Hasło: <input type="password" name="pass" id="pass"></label><br>
        <input type="submit" value="Zaloguj się">
    </form>
    <?php
    
    $dir = "./uzytkownicy/";


    if(isset($_POST["user"]) && isset($_POST["pass"])) {
        $login = $_POST["user"];
        $haslo = $_POST["pass"];

        if (file_exists("$dir$login")) {
            $plik = fopen("$dir$login","r");
            $haslo_plik = fgets($plik);
            fclose($plik);

            if ($haslo == $haslo_plik) {
                $_SESSION["user"] = $login;
                header("Location: kup.php");
            } else {
                echo("Niepoprawne hasło lub/i login");
            }
        } else {
            echo("Niepoprawne hasło lub/i login");
        }
    }

    ?>
</body>
</html>