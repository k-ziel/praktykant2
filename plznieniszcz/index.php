<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        <label>Nick<input type="text" name="user"></label><br>
        <label>Wiadomosc<input type="text" name="message"></label><br>
        <input type="submit" value="Wyslij">
    </form>

    <?php
    $plik = "./plik.txt";
    
    if(isset($_POST["user"], $_POST["message"])) {
        $user = $_POST["user"];
        $message = $_POST["message"];
        $tresc_wiadomosc = fopen($plik, 'a');
        
        fwrite($tresc_wiadomosc, date("d.m.Y") . " " . date("H:i") . " " . $user . ": " . $message . "\n");
        
        fclose($tresc_wiadomosc);
    }
    
    $tresc_wiadomosc = fopen($plik, "r");

    while(! feof($tresc_wiadomosc)) {
      $linia = fgets($tresc_wiadomosc);
      echo htmlspecialchars($linia). "<br>";
    }
    
    fclose($tresc_wiadomosc);
    htmlspecialchars(file_get_contents($plik));
    
    ?>

</body>
</html>