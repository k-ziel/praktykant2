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

$wybrany_sedzia = isset($_POST["sedzia"]) && $_POST['sedzia'] != "Obojętne";
if($wybrany_sedzia) {
    $sedziaa = $_POST["sedzia"];
} else {
    $sedziaa = "%";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>18.11.2026, 19.11.2026</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST">
        <header>
            <div>
                <?php

                    if(isset($_POST["gdzie"])) {
                        $gdzie = $_POST["gdzie"];
                    } else {
                        $gdzie = "%";
                    }
                
                ?>
                <label onclick="form.submit()">Wyjazdowy<input type="radio" <?php if($gdzie == "W") {echo("checked");} ?> name="gdzie" value="W"></label>
                <label onclick="form.submit()">U siebie<input type="radio" <?php if($gdzie == "D") {echo("checked");} ?> name="gdzie" value="D"></label>
                <label onclick="form.submit()">Obojętnie<input type="radio" <?php if($gdzie == "%") {echo("checked");} ?> name="gdzie" value="%"></label>
            </div>

            <div>
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

                <label>Sędzia
                    <select name="sedzia" onchange="form.submit()">
                        <option>Obojętne</option>
                        <?php
                        
                        $sql = "SELECT DISTINCT imie, nazwisko, nr_licencji FROM sedziowie ORDER BY imie;";

                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) == 0) {
                            echo("Brak drużyn!");
                        } else {
                            while($row = mysqli_fetch_assoc($result)) {
                                $sedzia = "{$row['imie']} {$row['nazwisko']}";
                                $id_sedziego = $row['nr_licencji'];
                                if($id_sedziego == $sedziaa) {
                                    echo("<option value='$id_sedziego' selected>$sedzia</option>\n");
                                } else {
                                    echo("<option value='$id_sedziego'>$sedzia</option>\n");
                                }
                            }
                        }
                        
                        ?>
                    </select>
                </label>
            </div>
        </header>
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

        $sql = "SELECT * FROM wyniki JOIN druzyny USING(Id_druzyny) JOIN sedziowie USING(nr_licencji) WHERE (druzyny.id_druzyny LIKE '$druzyna') AND (Gdzie LIKE '$gdzie') AND (nr_licencji LIKE '$sedziaa') ORDER BY Data_meczu;";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0) {
            $niema = True;
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
    <?php 
    
    if(isset($niema)) {
        echo("<span onclick='resett' class='komunikat'>\n");
        echo("Nie ma danych, zmień wybrane opcje\n");
        echo("</span>");
    }
    
    ?>
</body>
<script>
    function resett() {
        document.forms[0].reset()
    }
</script>
</html>
<?php

mysqli_close($conn);

?>