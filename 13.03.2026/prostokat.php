<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

$a = $_POST["a"];
$b = $_POST["b"];
// $h = $_GET["h"];

// $pole = ( ( $a + $b ) * $h ) / 2;
$pole = $a * $b;

echo "Pole trapezu wynosi $pole cm."

?>
</body>
</html>