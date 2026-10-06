<?php

session_start();



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
        <label><input type="text" name="name" id="name"></label> <br>
        <input type="submit" value="Wejdź na strone">
    </form>
    <?php


    if(isset($_SESSION["imie"])) {
        header("Location: ser.php");
    }
    
    if(isset($_POST["name"])) {
        $imie = $_POST["name"];
        $_SESSION["imie"] = $imie;
        header("Location: ser.php");
    }

    ?>
</body>
</html>