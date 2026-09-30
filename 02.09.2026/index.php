<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: "Comic Sans MS";
        }
    </style>
</head>
<body>
    <?php
    // $plik = fopen("plik.txt", 'r');
    // while(!feof($plik)) {
    //     $l = fgets($plik);
    //     echo ($l . "<br>");
    // }
    // fclose($plik);
    // $path = pathinfo("plik.txt");
    // foreach($path as $ll) {
    //     echo($ll . "<br>");
    // }

// ---------------------------------

    // $dir = "./zdjecia/";

    // if (is_dir($dir)){
    //   if ($dh = opendir($dir)){
    //     while (($file = readdir($dh)) !== false) {
    //         $ext = pathinfo($file)["extension"];
    //         if ($ext == "jpg" || $ext == "png" || $ext == "jpeg") { 
    //             if($file == "." || $file == ".." ) {} else {
    //                 echo("<img src=\"" . $dir . "\\" . $file . "\" alt=\"" . $file . "\">");
    //             }
    //         }
    //     }
    //     closedir($dh);
    //   }
    // }

    $dir = "./zdjecia/";
    $tab = scandir($dir);
    if ($tab){
        foreach($tab as $t) {
            if($t == "." || $t == "..") { } else {
                $ext = pathinfo($t)["extension"];
                if ($ext == "jpg" || $ext == "png" || $ext == "jpeg") { 
                    echo("<img src=\"" . $dir . "\\" . $t . "\" alt=\"" . $t . "\">");
                }
            }
        }




    }
    ?>
</body>
</html>
