<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 2px;
        }
    </style>
</head>
<body>
    <form>
        <label>1. <input type="text" name="wyrazy[]"></label><br>
        <label>2. <input type="text" name="wyrazy[]"></label><br>
        <label>3. <input type="text" name="wyrazy[]"></label><br>
        <label>4. <input type="text" name="wyrazy[]"></label><br>
        <label>5. <input type="text" name="wyrazy[]"></label><br>
        <label>6. <input type="text" name="wyrazy[]"></label><br>
        <label>7. <input type="text" name="wyrazy[]"></label><br>
        <label>8. <input type="text" name="wyrazy[]"></label><br>
        <label>9. <input type="text" name="wyrazy[]"></label><br>
        <label>0. <input type="text" name="wyrazy[]"></label><br>
        <input type="submit" value="Wyslij"><br><br>
    </form>

    <?php
    
    isset($_GET["wyrazy"]) {
        $wyrazy = $_GET["wyrazy"];

        $wyrazy = sort(strtolower($wyrazy));

        foreach ($wyrazy as $w) {
            echo $w . "<br>";
        }

    }
    
    ?>
</body>
</html>