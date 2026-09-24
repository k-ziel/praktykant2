<?php 

setcookie("tapeta", $_GET["zdjecie"], time()+60*60*24*30);

if(isset($_GET["tapeta"])) {
    $tapeta = $_GET["tapeta"];
    } elseif (isset($_COOKIE["tapeta"])) {
        $tapeta = $_COOKIE["tapeta"];
        } else {
            $tapeta = "nic";
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
            background-image: url(<?php echo("$tapeta.jpg") ?>);
            background-size: 100% auto;
        }
    </style>
</head>
<body>
    <a href="zdjecia.php">Kliknij tutaj</a>
</body>
</html>