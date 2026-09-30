<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- 1. alA mA psA I kajaK
2. KAJAK I PSA MA ALA
3. ma, psa (jak nie jest palindromem)
4. Ala < i < kajak < ma < psa (alfabetycznie)
5. tabelka -->

<form>

<label>Tekst <input type="text" name="tekst"></label> <br>
<input type="submit" value="Wyślij">

</form>

<?php

if(isset($_GET["tekst"])) {
    $t_tekst = $_GET["tekst"];
    $tekst = explode(" ", $t_tekst);
    
    function mb_strrev($string) {
        $t = mb_str_split($string);
        $t = array_reverse($t);
        return implode("", $t);
    }
    
    
    function czyPalindrom($string) {
        $t = mb_strrev($string);
        if (mb_strtolower($t) == mb_strtolower($string)) {
            return true;
        }
        else {
            return false;
        }
    }
    
    function ileSpolglosek($string) {
        $samogloski = ["a", "e", "i", "o", "u", "y", "ą", "ę", "ó"];
    
        $ile_jest_samoglosek = 0;

        $litera = mb_str_split(mb_strtolower($string));

        foreach ($litera as $t) {
            if(!in_array($t, $samogloski)) {
                $ile_jest_samoglosek++;
            }
        }

        return($ile_jest_samoglosek);
    
    }
    
    // 1.
    
    echo "<br>";
    $t_zad1 = [];
    foreach($tekst as $t) {
        $t_zad1[] = mb_strrev(ucfirst(mb_strrev(mb_strtolower($t))));
    }
    
    $zad1 = implode(" ", $t_zad1);
    echo("1. ". $zad1);
    
    // 2.
    
    echo "<br>";
    $t_zad2 = [];
    foreach($tekst as $t) {
        $t_zad2[] = mb_strtoupper($t);
    }
    
    $zad2 = implode(" ", array_reverse($t_zad2));
    echo("2. ". $zad2);
    
    // 3.
    
    echo "<br>";
    $t_zad3 = [];
    foreach($tekst as $t) {
        if (!czyPalindrom($t)) {
            $t_zad3[] = $t;
        }
    }
    
    $zad3 = implode(", ", $t_zad3);
    echo("3. ". $zad3);
    
    // 4.
    
    echo "<br>";
    $t_zad4 = $tekst;
    // foreach($t_zad4 as $t) {
    //     $t_zad4[] = strtolower($t);
    // }
    natcasesort($t_zad4);
    
    $zad4 = implode(" < ", $t_zad4);
    echo("4. ". $zad4);
    
    // 5.
    echo "<br>";
    
    echo("5. <table border=\"1\"> <tr> <th>Wyraz</th> <th>LL</th> <th>LS</th> </tr>");
    foreach($tekst as $t) {
        echo("<tr> <td>" . $t . "</td>
        <td>" . mb_strlen($t) . "</td>
        <td>" . ileSpolglosek($t)  . "</td> </tr>");
    }
    echo("</table>");

    // 6. test mb_strreverse ale z polskim



}

?>

</body>
</html>