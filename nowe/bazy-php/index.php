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
        .ser {
            background-color: lightgray;
        }
    </style>
</head>
<body>
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "4ti_g2_samochody";

$conn = mysqli_connect($host, $user, $pass, $db);
$sql = "SELECT * FROM `samochody`;";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 0) {
    echo("Brak danych");
} else {
    echo("<table>\n");
    echo("<tr>");
    echo("<th>Nr. rejestr.</th>");
    echo("<th>Marka</th>");
    echo("<th>Rok prod.</th>");
    echo("</tr>\n");
    $licznik = 0;
    while($row = mysqli_fetch_assoc($result)) {
        if($licznik%2 == 1) {
            echo("<tr class='ser'>");
        } else {
            echo("<tr>");
        }
        echo("<td>{$row['nr_rejestracyjny']}</td>");
        echo("<td>".ucfirst($row['marka'])."</td>");
        echo("<td>{$row['rok_produkcji']}</td>");
        echo("</tr>\n");
        $licznik++;
    }
    echo("</table>\n");
}

mysqli_close($conn);

?>
</body>
</html>