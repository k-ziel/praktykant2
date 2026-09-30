<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



    <?php 

    $dir = "./users/";


    if(isset($_POST["login"]) && isset($_POST["haslo"])) {
        $login = $_POST["login"];
        $haslo = $_POST["haslo"];

        if (file_exists("$dir$login")) {
            $plik = fopen("$dir$login","r");
            $haslo_hash = fgets($plik);
            fclose($plik);

            if (password_verify($haslo ,$haslo_hash)) {
                if(file_exists("$dir$login.jpg")) {
                    echo("Witaj <br>");
                    echo("<img src='$dir$login.jpg' alt='$login.jpg'>");
                    echo("<form method='post' enctype='multipart/form-data'> <input type='file' accept='image/jpg'> <input type='submit' value='Przeslij'> </form> <br> <br>");
                    
                    $plik_zdjecie = $dir . basename($_FILES[""])
                
                }


            } else {
                echo("Blędny login lub haslo");

            }
            

        } else {
            $plik = fopen("$dir$login","w");
            fwrite($plik, password_hash($haslo, PASSWORD_BCRYPT));
            fclose($plik);

            echo("Poprawnie utworzono użytkownika o loginie $login");

        }
    }

    ?>

    <form method="POST">
        <label>Login <input type="text" name="login" value=<?php if(isset($_POST["login"])) { echo $_POST["login"]; } ?>></label> <br>
        <label>Haslo <input type="password" name="haslo"></label> <br>
        <input type="submit" value="Zaloguj sie">
    </form>




</body>
</html>