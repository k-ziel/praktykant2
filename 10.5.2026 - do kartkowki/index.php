<?php

session_start();

if(isset($_SESSION["zalogowany"])) {
    header('Location: main.php');
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
        <label for="login">Użytkownik </label><input type="text" name="login" id="login"> <br>
        <label for="password">Hasło </label><input type="password" name="password" id="password"> <br>
        <input type="submit" value="Zaloguj się">
    </form>
    <?php
    
    if(isset($_POST["login"])) {
        $login = $_POST["login"];
        if(isset($_POST["password"])) {
            $haslo = $_POST["password"];

            if( ($login == "p.gubala" && $haslo = "P@olom@01") || ($login == "user" && $haslo = "haslo")) {
                $_SESSION["zalogowany"] = True;
                header('Location: main.php');
            }

        }
    }


    ?>
</body>
</html>