<?php

session_start();

if(isset($_COOKIE["licznik"])) {
    $liczba = $_COOKIE["licznik"];
    $liczba++;
} else {
    $liczba = 0;
}

setcookie("licznik", $liczba, time()+60*60*60*24);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    if(isset($_SESSION["imie"])) {
        $imie = $_SESSION["imie"];
        echo("Witaj ".$imie."<br>Wbiłeś tutaj: ".$liczba);
    } else {
        header("Location: index.php");
    }
    
    ?>
    <form action="logout.php">
        <input type="submit" value="Wyloguj się">
    </form>
</body>
</html>