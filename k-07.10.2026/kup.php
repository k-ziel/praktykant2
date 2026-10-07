<?php

session_start();

if(!isset($_SESSION["user"])) {
    header("Location: index.php");
    die("Najpierw sie zaloguj!");
} else {
    $user = $_SESSION["user"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            font-family: "Comic Sans MS"
        }

        table, td, th {
            border: solid 2px black;
        }
        table {
            border-collapse: collapse;
        }

        h2 {
            text-align: center;
        }

        form {
            margin: auto;
        }

        span {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }

        #przycisk {
            border: solid 2px black;
        } 

        th {
            background-color: gray;
            color: white;
        }

        td {
            text-align: center;
            padding: 0.67rem;
        }


    </style>
</head>
<body>

<form method='post'>

<table>

<tr>
    <th>Zdjęcie</th>
    <th>Nazwa</th>
    <th>Ilość</th>
</tr>



    <?php

    // var_dump($_POST); echo("<br>");
    // var_dump($_COOKIE); echo("<br>");
    // var_dump($_SESSION); echo("<br>");

    
    $dir = "./zdjecia/";




    $pliki = scandir($dir);

    $lista_zakupow = [];

    foreach($pliki as $p) {
        if(is_file("$dir$p")) {
            $p_ext = pathinfo("$dir$p")["extension"];
            
            if($p_ext == "jpeg" || $p_ext == "jpg") {
                echo("<tr> \n");
                echo("<td><img src='$dir$p' alt='$p' width='100px'></td>");
                $p_name = pathinfo("$dir$p")["filename"];
                echo("<td>$p_name</td>");
                if(isset($_POST["ilosc_$p_name"])) {
                    $_SESSION["ilosc_$p_name"] = $_POST["ilosc_$p_name"];
                    $ilosc_post = $_POST["ilosc_$p_name"];
                    $lista_zakupow[] = ["przedmiot" => $p_name, "ilosc" => $ilosc_post];
                    $czy_przeslal = True;
                }
                if(isset($_SESSION["ilosc_$p_name"])) {
                    $ilosc = $_SESSION["ilosc_$p_name"];
                    echo("<td><input type='number' name='ilosc_$p_name' id='ilosc_$p_name' value='$ilosc'></td>");
                } else {
                    echo("<td><input type='number' name='ilosc_$p_name' id='ilosc_$p_name'></td>");
                }
                echo("</tr> \n \n");

            }
        }
    }
    echo("</table> \n \n");
    
    ?>
<span><input type="submit" value="Kup" id="przycisk"></span>
</form>

<?php
    $string[] = date("Y-m-d H:i:s");
    $string[] = ": ";
    foreach($lista_zakupow as $i) {
        $string[] = $i["przedmiot"];
        $string[] = "x";
        $string[] = $i["ilosc"];
        $string[] = ", ";
    }

    if(isset($czy_przeslal)) {
        // if(isset($string[2]))
        setcookie("przedmioty_$user", implode(" ", $string), time()+60*60*24*365);
    }

    if(isset($_COOKIE["przedmioty_$user"])) {
        echo($_COOKIE["przedmioty_$user"]);
    } else {
        echo("Kup coś u nas!");
    }

    // var_dump($string);

?>


</body>
</html>