<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th {
            border: 2px solid black;
            border-collapse: collapse;
        }
        * {
            font-family: "Arial";
            text-align: center;
        }
        th {
            color: white;
            background-color: black;
        }
        tr:nth-child(odd) {
            background-color: lightgray;
        }
        th{
            padding: 0px 1em;
        }
        tr:hover {
            background-color: DimGrey;
            color: white
        }
        td:hover {
            background-color: black;
            color: white;
        }
        table {
            margin: auto
        }
    </style>
</head>
<body>

<?php 

if(isset($_POST["rocznik"])) {
    $rocznik = $_POST["rocznik"];
    $sql = "SELECT\n"
    . "    samochody.nr_rejestracyjny,\n"
    . "    samochody.marka,\n"
    . "    samochody.rok_produkcji,\n"
    . "    COUNT(wykonane.id_uslugi) AS \"iwu\"\n"
    . "FROM\n"
    . "    samochody\n"
    . "INNER JOIN wykonane USING(nr_rejestracyjny)\n"
    . "WHERE samochody.rok_produkcji=$rocznik\n"
    . "GROUP BY\n"
    . "    samochody.nr_rejestracyjny;";
} else {
    $sql = "SELECT\n"
    . "    samochody.nr_rejestracyjny,\n"
    . "    samochody.marka,\n"
    . "    samochody.rok_produkcji,\n"
    . "    COUNT(wykonane.id_uslugi) AS \"iwu\"\n"
    . "FROM\n"
    . "    samochody\n"
    . "INNER JOIN wykonane USING(nr_rejestracyjny)\n"
    . "GROUP BY\n"
    . "    samochody.nr_rejestracyjny;";
    // $rocznik = " ";
}

?>

<form method="post">
<label>Wybierz rocznik: <input type="number" <?php if(isset($rocznik)) {echo "value=$rocznik";} ?> name="rocznik" min="2000" max="2026" placeholder="np. 2026"></label>
<input type="submit" value="Wybierz">
</form>

<hr>

<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "4ti_g2_samochody";

$conn = mysqli_connect($host, $user, $pass, $db);
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 0) {
    echo("Brak danych");
} else {
    echo("<table>\n");
    echo("<tr>");
    echo("<th>Nr. rejestr.</th>");
    echo("<th>Marka</th>");
    echo("<th>Rok prod.</th>");
    echo("<th>Ilość wyk. usług</th>");
    echo("</tr>\n");
    $licznik = 0;
    while($row = mysqli_fetch_assoc($result)) {
        // if($licznik%2 == 1) {
            // echo("<tr class='ser'>");
        // } else {
        echo("<tr>");
        // }
        echo("<td>{$row['nr_rejestracyjny']}</td>");
        echo("<td>".ucfirst($row['marka'])."</td>");
        echo("<td>{$row['rok_produkcji']}</td>");
        echo("<td>{$row['iwu']}</td>");
        echo("</tr>\n");
        $licznik++;
    }
    echo("</table>\n");
}

mysqli_close($conn);

?>
</body>
</html>