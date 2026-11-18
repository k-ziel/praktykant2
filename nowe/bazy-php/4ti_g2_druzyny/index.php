<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "4ti_g2_druzyny";

$conn = mysqli_connect($host, $user, $pass, $db);

$wybrana_druzyna = isset($_POST["druzyna"]) && $_POST['druzyna'] != "Wszystkie";
if($wybrana_druzyna) {
    $druzyna = $_POST["druzyna"];
} else {
    $druzyna = "%";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>18.11.2026</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST">
        <label>Drużyna
            <select name="druzyna" onchange="form.submit()">
                <option>Wszystkie</option>
                <?php
                
                $sql = "SELECT DISTINCT nazwa, id_druzyny FROM druzyny ORDER BY nazwa;";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) == 0) {
                    echo("Brak drużyn!");
                } else {
                    while($row = mysqli_fetch_assoc($result)) {
                        $druzyny = $row['nazwa'];
                        $id_druzyna = $row['id_druzyny'];
                        if($id_druzyna == $druzyna) {
                            echo("<option value='$id_druzyna' selected>$druzyny</option>\n");
                        } else {
                            echo("<option value='$id_druzyna'>$druzyny</option>\n");
                        }
                    }
                }
                
                ?>
            </select>
        </label>
    </form>
    <hr>
    <table>
        <tr>
            <th>Data</th>
            <th>Rodzaj</th>
            <th>Gdzie</th>
            <?php 
            if($wybrana_druzyna == False) {
                echo("<th>Nazwa drużyny</th>");
            }          
            ?>
            <th>Sędzia</th>
            <th>Wynik</th>
        </tr>
        <?php 

        $sql = "SELECT * FROM wyniki JOIN druzyny USING(Id_druzyny) JOIN sedziowie USING(nr_licencji) WHERE druzyny.id_druzyny LIKE '$druzyna' ORDER BY Data_meczu;";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0) {
            echo("Nie ma danych!");
        } else {
            while($row = mysqli_fetch_assoc($result)) {
                echo("<tr>");
                $data = $row['Data_meczu'];
                $rodzaj = $row['Rodzaj_meczu'];
                if($row['Rodzaj_meczu'] == "T") {
                    $rodzaj = "Ligowy";
                }
                else if($row['Rodzaj_meczu'] == "L") {
                    $rodzaj = "Ligowy";
                }
                else if($row['Rodzaj_meczu'] == "P") {
                    $rodzaj = "Pucharowy";
                }


                $gdzie = "{$row['Gdzie']} ({$row['Miasto']})";
                if($row['Gdzie'] == "W") {
                    $gdzie = "Wyjazdowy";
                } else if($row['Gdzie'] == "D") {
                        $gdzie = "U siebie";
                }


                $druzyna = $row['Nazwa'];
                $sedzia = "{$row['Imie']} {$row['Nazwisko']}";
                $wynik = "{$row['Bramki_zdobyte']}:{$row['Bramki_stracone']}";
                echo("<td>$data</td>");
                echo("<td>$rodzaj</td>");
                echo("<td>$gdzie</td>");
                if($wybrana_druzyna == False) {
                    echo("<td>$druzyna</td>");
                }
                echo("<td>$sedzia</td>");
                echo("<td>$wynik</td>");
                echo("</tr>");
            }
        }
        
        ?>
    </table>
</body>
</html>
<?php

mysqli_close($conn);

?>