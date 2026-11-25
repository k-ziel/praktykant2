<?php 

$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "4ti_g2_filmy";

$conn = mysqli_connect($host, $user, $pass, $db);

if(isset($_POST['gatunek'])) {
    $wybrany_gatunek = $_POST['gatunek'];
} else {
    $wybrany_gatunek = '%';
}

if(isset($_POST['kraj'])) {
    $wybrany_kraj = $_POST['kraj'];
} else {
    $wybrany_kraj = '%';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        table, tr, th, td {
            border: 2px solid black;
            border-collapse: collapse;
        }
        table {
            margin: auto;
        }
        header {
            display: flex;
            justify-content: center;
        }
        th {
            background-color: rgb(77, 77, 77);
            color: white;
        }
        tr:nth-child(odd) {
            background-color: lightgray;
        }
        tr {
            text-align: center;
        }
        h2 {
            text-align: center;
        }
        .podsumowanie{
            font-weight: bolder;
        }
        .brak {
            font-weight: bolder;
            color: red;
            background-color: black;
            padding: 2rem;
            font-size: larger;
        }
        * {
            font-family: 'Arial';
        }
        td {
            padding: .5rem;
        }
        .podsumowaniee {
            background-color:rgb(77, 77, 77);
            color: white;
            padding: 0
        }
    </style>
</head>
<body>
    <header>
        <form method="POST">
            <label> Gatunek
            <select name="gatunek">
                <option value="%">Wszystkie</option>
                <?php 
                $sql = "SELECT DISTINCT gatunek FROM filmy INNER JOIN wypozyczenia USING(ID_filmu) ORDER BY gatunek ASC;";
                $result = mysqli_query($conn, $sql);
    
                if(mysqli_num_rows($result) != 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $nazwa = ucfirst($row['gatunek']);
                        if($wybrany_gatunek == $row['gatunek']) {
                            echo("<option value='{$row['gatunek']}' selected>$nazwa</option>\n");
                        } else {
                            echo("<option value='{$row['gatunek']}'>$nazwa</option>\n");
                        }
                    }
                } else {
                    echo("<option>Brak wyników</option>");
                }
                ?>
            </select>
            </label>
            <label> Kraj produkcji
            <select name="kraj">
                <option value="%">Wszystkie</option>
                <?php 
                $sql = "SELECT DISTINCT Kraj_produkcji FROM filmy INNER JOIN wypozyczenia USING(ID_filmu) ORDER BY Kraj_produkcji ASC;";
                $result = mysqli_query($conn, $sql);
    
                if(mysqli_num_rows($result) != 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $nazwa = ucfirst($row['Kraj_produkcji']);
                        if($wybrany_kraj == $row['Kraj_produkcji']) {
                            echo("<option value='{$row['Kraj_produkcji']}' selected>$nazwa</option>\n");
                        } else {
                            echo("<option value='{$row['Kraj_produkcji']}'>$nazwa</option>\n");
                        }
                    }
                } else {
                    echo("<option>Brak wyników</option>");
                }
                ?>
            </select>
            </label>
            <input type="submit" value="Pokaż">
        </form>
    </header>
    <h2>
        <?php 
        
        if($wybrany_gatunek != '%') {
            echo("Filmy z gatunku $wybrany_gatunek");
        } else {
            echo("Filmy z wszystkich gatunków");
        }
        
        ?>
    </h2>
    <hr>
    <table>
        <tr>
            <th>Tytuł</th>
            <?php 
            if($wybrany_gatunek == '%') {
                echo("<th>Gatunek</th>\n");
            }
            if($wybrany_kraj == '%') {
                echo("<th>Kraj produkcji</th>\n");
            }
            ?>
            <th>Wypożyczenia</th>
            <th>Dochód</th>
        </tr>
        <?php 

        $lacznie_wypozyczenia = 0;
        $laczny_dochod = 0;
        
        $sql = "SELECT filmy.Kraj_produkcji, filmy.Tytul, filmy.Gatunek, count(wypozyczenia.ID_filmu) as 'iw', filmy.Cena_w_zl as 'cena' FROM `filmy` INNER JOIN wypozyczenia USING(ID_filmu) WHERE (filmy.gatunek LIKE '$wybrany_gatunek') AND (filmy.Kraj_produkcji LIKE '$wybrany_kraj') GROUP BY filmy.Tytul ORDER BY `iw` DESC;";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) != 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $tytul = $row['Tytul'];
                $gatunek = ucfirst($row['Gatunek']);
                $iloscwypozyczen = $row['iw'];
                $cena = $row['cena'];
                $dochod = $cena * $iloscwypozyczen;
                $kraj = $row['Kraj_produkcji'];
                echo("<tr>");
                echo("<td>$tytul</td>");
                if($wybrany_gatunek == '%') {
                    echo("<td>$gatunek</td>");
                }
                if($wybrany_kraj == '%') {
                    echo("<td>$kraj</td>");
                }
                echo("<td>$iloscwypozyczen</td>");
                echo("<td>$dochod zł</td>");
                echo("</tr>\n");
                $lacznie_wypozyczenia+=$iloscwypozyczen;
                $laczny_dochod+=$dochod;
            }
            echo("\n<tr class='podsumowanie'>");
            $colspan = 1;
            if($wybrany_gatunek == '%') {
                $colspan+=1;
            }
            if($wybrany_kraj == '%') {
                $colspan+=1;
            }
            echo("<td class='podsumowaniee' colspan='$colspan''>Łącznie</td>");
            echo("<td class='podsumowaniee'>$lacznie_wypozyczenia</td>");
            echo("<td class='podsumowaniee'>$laczny_dochod zł</td>");
            echo("</tr>\n");

        } else {
            echo("<tr><td colspan='4' class='brak'>Brak wyników</tr>");
        }
        ?>
    </table>
</body>
</html>
<?php
mysqli_close($conn);
?>