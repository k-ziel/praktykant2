<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep</title>

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

        #owoc {
            margin: 1rem;

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

    <h2>Sklep</h2>

    <form method='post'>

    <table>

    <tr>
        <th>Zdjęcie</th>
        <th>Opis</th>
        <th>Cena</th>
        <th>Kup</th>
    </tr>

    <?php
    
    $dir = "./images/";




    $pliki = scandir($dir);

    foreach($pliki as $p) {
        if(is_file("$dir$p")) {
            $p_ext = pathinfo("$dir$p")["extension"];
            
            if($p_ext == "jpeg" || $p_ext == "jpg") {
                echo("<tr> \n");
                echo("<td><img src='$dir$p' alt='$p' width='100px'></td>");

            } else if ($p_ext == "txt") {

                $plik = fopen("$dir$p", "r");
                

                while(!feof($plik)) {
                    $linijka = fgets($plik);
                    if(is_numeric($linijka)) {
                        echo("<td>$linijka zł</td> \n");
                        $cena = $linijka;
                    } else {
                        echo("<td>".ucfirst(htmlspecialchars($linijka))."</td> \n");
                    } 
                }
                $p_name = pathinfo("$dir$p")["filename"];
                echo("<td><input type='checkbox' id='owoc' name='$cena'></td>\n");

                fclose($plik);
                echo("</tr> \n \n");
            }
        }
    }
    echo("</table> \n \n");

    
    $suma = 0;
    foreach($_POST as $cena => $klucz) {
        $suma = $suma + floatval($cena);
    }
    
    echo("<span>");
    echo('<input type="submit" value="Kup" id="przycisk">');
    if($suma != 0) {
        echo("Do zapłaty ".$suma. "zł");
    } else {
        echo("Najpierw kup coś w naszym sklepie!");
    }
    echo("</span>");
    ?>


    </form>

</body>
</html>