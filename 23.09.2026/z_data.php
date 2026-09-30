<?php

if(isset($_COOKIE["ostatni_raz"])) {
    setcookie("ostatni_raz", date("H:i").":67");
    $orm = $_COOKIE["ostatni_raz"];
    $ostatni_raz = "Byłeś tutaj ostatni raz $orm.";
} else {
    setcookie("ostatni_raz", date("H:i:s"));
    $ostatni_raz = "";
}

if(isset($_COOKIE["licznik"])) {
    $ilosc_wejsc = intval($_COOKIE["licznik"]);
    $ilosc_wejsc++;
    setcookie("licznik", $ilosc_wejsc, time()+30*24*60*60);
} else {
    setcookie("licznik", 1, time()+30*24*60*60);
    $ilosc_wejsc = "pierwszy";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *:hover {
            font-family: "Comic Sans MS";
            color: red;
        }
    </style>
</head>
<body>
    <?php

    setcookie("serek", time(), time()+30*24*60*60);
    echo(time() - $_COOKIE["serek"]);

    echo("Witaj! Jesteś tu po raz $ilosc_wejsc! <br>");
    echo($ostatni_raz."<br>");
    echo("Teraz jest ". date("H:i:s"));
    
    ?>
</body>
</html>