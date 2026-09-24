<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="get">
        <?php 
        
        $dir = "./";
        $pliki = scandir($dir);
        var_dump($pliki);
        
        ?>
        <label><img src="1.jpg" alt="kot 1" width="100px"><input type="radio" name="zdjecie" value="1" id="zdjecie"></label> <br>
        <label><img src="2.jpg" alt="kot 2" width="100px"><input type="radio" name="zdjecie" value="2" id="zdjecie"></label> <br>
        <label><img src="3.jpg" alt="kot 3" width="100px"><input type="radio" name="zdjecie" value="3" id="zdjecie"></label> <br>
        <input type="submit" value="Ustaw">
    </form>
</body>
</html>