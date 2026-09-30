<?php

session_start()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="logout.php">
    <input type="submit" value="Wyloguj się">
</form>


    <?php
    
    // var_dump($_SESSION);

    if($_SESSION['zalogowano'] == True) {
        echo("czesc");

    } else {
        header('Location: index.php');
    }
    
    ?>
</body>
</html>