<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        figcaption {
            width: 50%;
        }

        figure {
            display: inline;
        }
    </style>

</head>
<body>
    <?php 
    
    $dir = "./dane/";

    if(is_dir($dir)) {
        $pliki = scandir($dir);
        foreach($pliki as $p) {
            if(!is_dir($p)) {
                $p_info = pathinfo($p);
                if($p_info['extension'] == "jpg") {
                    echo("<figure>");
                    echo("<img src='$dir$p' alt='".$p_info['filename']."' width='300px'>");
                } elseif($p_info["extension"] == "txt") {
                    $p_p = fopen($dir.$p, 'r');

                    echo("<figcaption>");
                    while(!feof($p_p)) {
                        $linia = fgets($p_p);
                        echo $linia;
                    }
                    echo("</figcaption>");
                    echo("</figure>");

                    fclose($p_p);
                }
            }
        

        }
    } else {
        die("podaj poprawny katalog");
    }
    
    ?>
</body>
</html>