<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="plik">
        <input type="submit" name="submit">
    </form>
<?php

if (isset($_POST["submit"])) {
    var_dump($_FILES);
    sleep(5);
}

?>
</body>
</html>