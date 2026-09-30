<?php

if(isset($_COOKIE["licznik"])) {
    $licznik = $_COOKIE["licznik"];
    $licznik++;
} else {
    $licznik = 1;
}

if(isset($_COOKIE["data"])) {
    $data = $_COOKIE["data"];
} else {
    $data = 0;
}

if(isset($_GET["kolor"])) {
    $kolor = $_GET["kolor"];
} elseif(isset($_COOKIE["kolor"])) {
    $kolor = $_COOKIE["kolor"];        
} else {
    $kolor = "#FFFFFF";
}

setcookie("licznik", $licznik, time()+30*24*60*60);
setcookie("data", date("H:i:s"), time()+30*24*60*60);

setcookie("kolor", $kolor, time()+30*24*60*60);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: <?=$kolor?>;
        }
        form {
            position: fixed;
            right: 0.5em;
        }
    </style>
</head>
<body>
    <form>
        <input type="color" value="<?=$kolor?>" name="kolor" id="kolur">
        <br>
        <input type="submit" value="Wyślij">
    </form>

    <script>
        kolur = document.querySelector("#kolur")
        kolor = kolur
        body = document.querySelector("body")

        kolur.addEventListener("input", function() {
            body.style.backgroundColor = kolor.value
        })
    </script>

    <?php
    
    echo("Teraz jest ".date("H:i:s")."<br>");
    if($licznik==1)
        echo("Witaj! Jesteś tutaj po raz pierwszy.");
    else
        echo("Witaj! Jesteś tutaj po raz $licznik. <br> Data ostatniej wizyty $data")
    
    ?>

</body>
</html>