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
    <?php
    
    // var_dump($_SESSION);

    if($_SESSION['zalogowano'] == True) {
        echo("czesc");
        echo("<form method='post'>");
        echo("<input type='submit' value='Wyloguj się' name='logout'>");
        echo("</form>");

        if(isset($_POST["logout"])) {
            session_destroy();
            setcookie("PHPSESSID", "hihihi", time()-10);
            header('Location: index.php');
        }

    } else {
        header('Location: index.php');
    }
    
    ?>
</body>
</html>