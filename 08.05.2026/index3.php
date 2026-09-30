<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <?php
        for($i=1;$i<4;$i++) {
            echo("Imie osoby ".$i."<input type=\"text\" required name=\"os[]\"><br>\n");
            echo("Wzrost osoby ".$i."<input type=\"number\" required name=\"os1[]\"><br>\n");
            echo("<br>");
            // echo("<input type=\"text\" name\"os2[]\"><br>\n");
            // echo("<input type=\"text\" name\"os3[]\"><br>\n");
        }    
        ?>
        <input type="submit" value="Przeslij">
    </form>

<?php 
var_dump($_GET);

if (isset($_GET["os1"])) {
    foreach ($_GET["os1"] as $w){
        echo "$w<br>";
    }
}


// extract($_GET);

// if(isset($a)) {
//     echo "sigma";
// }

// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// var_dump(get_defined_vars());

?>

</body>
</html>