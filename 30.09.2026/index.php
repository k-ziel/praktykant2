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

<form method="post">
    <label>Login <input type="text" name="login"></label> <br>
    <label>Hasło <input type="password" name="pass"></label> <br>
    <input type="submit" value="Zaloguj się">
</form>

<?php

if(isset($_SESSION['zalogowano'])) {
    if($_SESSION['zalogowano'] == True) {
        header('Location: main.php');
    }
}

if(isset($_POST['login'])) {
    $login = $_POST['login'];
    if(isset($_POST['pass'])) {
        $password = $_POST['pass'];

        if($login=='franek' && $password=='ser') {
            $_SESSION['zalogowano'] = True;
            header('Location: main.php');
        } else {
            echo("Wprowadzono niepoprawny login lub/i hasło");
        }

    } else {
        echo("wprowadz haslo!");
    }
}

?>

</body>
</html>