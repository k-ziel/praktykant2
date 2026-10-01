<?php 

session_start();

if(!isset($_SESSION["zalogowany"])) {
    header('Location: index.php');
    die("niezalogowany");
} else {
    if($_SESSION["zalogowany"] != true) {
        header('Location: index.php');
        die("niezalogowany");
    }
}



if(isset($_POST["kolor"])) {
    $kolor = $_POST["kolor"];
    setcookie("kolor", $kolor, time()+60*60*24*30);
} elseif(isset($_COOKIE["kolor"])) {
    $kolor = $_COOKIE["kolor"];
} else {
    $kolor = "#FFFFFF";
    setcookie("kolor", $kolor, time()+60*60*24*30);
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
            background-color: <?php echo $kolor ?>;
        }
    </style>
</head>
<body>
    <form action="logout.php" method="post">
        <input type="submit" value="Wyloguj się">
    </form>

    <br>

    <form method="post">
        <input type="color" name="kolor" id="kolor" value=<?php echo $kolor ?>> <br>
        <input type="submit" value="Zmień kolor">
    </form>
</body>
</html>