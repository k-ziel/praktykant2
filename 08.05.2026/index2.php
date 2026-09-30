<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $tab = array(43,67,53,23,"sdf");
    $tab[76]=676765;
    $tab[-5]="fghj";

    var_dump($tab);

    
    
    // for($i=count($tab)-1;$i>=0;$i--) {
        //     echo($tab[$i]."<br>");
        // }
        
    // echo("<br>odwrocona <br><br>");
    
    // for($i=count($reversed)-1;$i>=0;$i--) {
        //     echo($reversed[$i]."<br>");
        // }
    
    // var_dump($tab);
    // $reversed = array_reverse($tab);
    // var_dump($reversed);
    foreach(array_reverse($tab) as $e) {
        echo($e."<br>");
    }

    echo("<br>");
    echo("<br>");
    echo("<br>");

    $tab2 = ["ala"=>"wartosc","wspeed"=>67,"iusearch"=>"btw"];

    foreach ($tab2 as $k=>$v) {
        echo($k." = ".$v."<br>");
    }

    ?>
</body>
</html>