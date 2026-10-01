<?php

session_start()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel logowania</title>
</head>
<body>
    <form method="post">
        <label>Login <input type="text" name="login" id="login"></label> <br>
        <label>Hasło <input type="text" name="password" id="password"></label> <br>
        <input type="submit" value="Zaloguj się">
    </form>
    <?php 
    
    if(isset($_SESSION["zalogowany"])) {
        if($_SESSION["zalogowany"] == true) {
            header('Location: main.php');
        }
    }

    if(isset($_POST["login"])) {
        $login = $_POST["login"];
        if(isset($_POST["password"])) {
            $haslo = $_POST["password"];

            $pop_login = "franek";
            $pop_haslo = "ser";

            if($haslo == $pop_haslo && $login == $pop_login) {
                $_SESSION["zalogowany"] = true;
                header('Location: main.php');
            } else {
                echo("Nie poprawny login lub/i hasło!");
            }

        } else {
            echo("Najpierw wpisz hasło!");
        }
    } else {
        // echo("Najpierw wpisz login!");
    }
    
    
    ?>
</body>
</html>