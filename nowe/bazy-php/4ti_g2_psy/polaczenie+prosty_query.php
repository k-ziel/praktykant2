<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     
    # to jest metoda nieobiektywa (procedularna)

    $host = "127.0.0.1"; # to musimy dac
    $uzytkownik = "root"; # to musimy dac
    $haslo = ""; # to musimy dac
    $baza = "4ti_g2_psy"; # tego nie musimy, ale zaleca sie 
                          # (mozna zmieniac bazy w locie)

    $polaczenie = mysqli_connect($host, $uzytkownik, $haslo, $baza);
    # tworzymy polaczenie, w takiej kolejnosci trzeba (baza jest opcjonalna)
    # jak tego nie zrobilismy = mysqli_select_db($polaczenie, $baza)

    /*
    # tego sprawdzenia nie trzeba robic, ale mozna 
    if(!$polaczenie) {
        echo("polaczenie nieudane");
    } else {
        echo("polaczenie udane");
    }
    */

    $sql = "SELECT nazwisko, imię FROM `osoby` ORDER BY nazwisko, imię ASC;";
    # trzeba zrobic taki podwojny srednik:
    # jeden wymagany przez sql a drugi przez php
    
    $resultat = mysqli_query($polaczenie, $sql);

    if(mysqli_num_rows($resultat) /* <- ile zwrocilo wierszy */ > 0) {
        while($wiersz = mysqli_fetch_assoc($resultat) /* <- cos w stylu feof w plikach */) {
            $imie = $wiersz['imię'];
            $nazwisko = $wiersz['nazwisko'];
            echo("$imie $nazwisko<br>");
        
            // echo("{$wiersz['imię']} {$wiersz['nazwisko']}<br>");
        }
    } else {
        echo("Nic nie znaleziono");
    }

    mysqli_close($polaczenie); # zakonczenie polaczenia

    ?>
</body>
</html>