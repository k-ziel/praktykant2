<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        *:hover {
            color: red;
            transition: 0.3s ease;
            /* font-size: 5rem;s */
        }

        label {
            color:black;
        }

        input[type="submit"]:hover {
            background-color: black;
            transition: 0.3s ease;
        }

        input[type="submit"] {
            background-color: white
        }

        * {
            font-family: "comic sans ms";
            margin: 3px;
        }

    </style>

</head>
<body>

<form method="get">
    <label name="a">a<input type="number" name="a" min="1" value="<?= $_GET["a"] ?? 12 ?>" require></label><br>
    <label name="b">b<input type="number" name="b" min="1" value="<?= $_GET["b"] ?? 18 ?>"require></label><br>
    <input type="submit" value="NWD" name="co_zrobic">
    <input type="submit" value="NWW" name="co_zrobic">
    <input type="submit" value="a&#x1D47" name="co_zrobic">
</form>

<?php

$tablica = array("a"=>0, "b"=>0);


function NWD($liczba1, $liczba2) {
    $temp_a = $liczba1; $temp_b = $liczba2;
    while($liczba1 != $liczba2) {
        if ($liczba1 > $liczba2 ) { $liczba1 -= $liczba2; }
        else { $liczba2 -= $liczba1; } }
    return($liczba1);
}

function NWW($liczba1, $liczba2) {
    $NWW = ( $liczba1 * $liczba2 ) / NWD($liczba1, $liczba2);
    return($NWW);
}

if(isset($_GET["a"],$_GET["b"],$_GET["co_zrobic"])) {
    if(is_numeric($_GET["a"]) && is_numeric($_GET["b"])) {

    $tablica["a"] = $_GET["a"];
    $tablica["b"] = $_GET["b"];
    // $a = $_GET["a"];
    // $b = $_GET["b"];
    $co_zrobic = $_GET["co_zrobic"];


// $_NWD = NWD($a, $b);
// $_NWW = NWW($a, $b);

$_NWD = NWD($tablica["a"], $tablica["b"]);
$_NWW = NWW($tablica["a"], $tablica["b"]);

// $_NWW = NWW($a, $b);

echo(var_dump($tablica)."<br>");

if($co_zrobic == "NWD") {
    echo("NWD(".$tablica["a"].",".$tablica["b"].")=".$_NWD);    
}
if($co_zrobic == "NWW") {
    echo("NWW(".$tablica["a"].",".$tablica["b"].")=".$_NWW);    
    // echo("NWW($tablica["a"], $tablica["b"])=".$_NWW);
}
if($co_zrobic == "aᵇ") {
    echo($tablica["a"]."<sup>".$tablica["b"]."</sup> = ".$tablica["a"]**$tablica["b"]);
}


}
}

?>

</body>
</html>