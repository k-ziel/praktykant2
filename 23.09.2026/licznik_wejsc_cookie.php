<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    if(isset($_COOKIE["licznik"])) {
        $ilosc_wejsc = intval($_COOKIE["licznik"]);
        $ilosc_wejsc++;
        setcookie("licznik", $ilosc_wejsc, time()+30*24*60*60);
    } else {
        setcookie("licznik", 1, time()+30*24*60*60);
        $ilosc_wejsc = "pierwszy";
    }

    echo("Widaj! Jesteś tu po raz $ilosc_wejsc!");
    
    ?>
</body>
</html>