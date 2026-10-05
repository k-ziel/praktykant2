<?php

session_start();
if(!isset($_SESSION["zalogowany"])) {
    header('Location: index.php');
    die("serek");
}

if(isset($_POST["kolor"])) {
    $kolor = $_POST["kolor"];
    setcookie("kolor", $kolor, time()+60*60*60);
} elseif(isset($_COOKIE["kolor"])) {
    $kolor = $_COOKIE["kolor"];
} else {
    $kolor = "#44ff00";
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
            background-color: <?php echo $kolor; ?>;
        }
    </style>
</head>
<body>
    <form method="POST">
        <input type="color" name="kolor" id="kolor" value="<?php echo $kolor; ?>"> <br>
        <input type="submit" value="Ustaw kolor!">
    </form>
    <br><br>
    <form action="logout.php">
        <input type="submit" value="Wyloguj się">
    </form>
</body>
</html>