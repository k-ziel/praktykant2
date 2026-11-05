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
            background-color: dimgrey;
            color: white
        }
        td:hover {
            background-color: black;
            color: white;
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
$sql = "SELECT uslugi.usluga, COUNT(wykonane.id_uslugi) as 'iw', SUM(uslugi.cena) as 'zarobek' FROM uslugi INNER JOIN wykonane USING(id_uslugi) GROUP BY uslugi.id_uslugi ORDER BY zarobek DESC;";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 0) {
    echo("Brak danych");
} else {
    echo("<table>\n");
    echo("<tr>");
    echo("<th>Usługa</th>");
    echo("<th>Ile wykonano</th>");
    echo("<th>Zarobek</th>");
    echo("<th>Zar. / Wykonano</th>");
    echo("</tr>\n");
    $licznik = 0;
    while($row = mysqli_fetch_assoc($result)) {
        // if($licznik%2 == 1) {
            // echo("<tr class='ser'>");
        // } else {
        echo("<tr>");
        // }
        echo("<td>".ucfirst($row['usluga'])."</td>");
        echo("<td>{$row['iw']}</td>");
        echo("<td>".number_format($row['zarobek'], 2, ",", " ")." zł</td>");
        echo("<td>". $row['zarobek'] / $row['iw'] ." zł</td>");
        echo("</tr>\n");
        // $licznik++;
    }
    echo("</table>\n");
}



mysqli_close($conn);

?>
</body>
</html>
