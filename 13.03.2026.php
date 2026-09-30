<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-color: <?php echo $_GET["kolor"]?>
        }
    </style>

</head>
<body>
    <form>
        <label> <input type="color" name="kolor" value="<?php echo $_GET["kolor"]?>"> </label> <br>
        <input type="submit" value="Kolor">
    </form>
</body>
</html>