<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    // $a = "Ala ma kota";
    // $a[0]="O";
    // $b = explode(" ", $a);
    // echo $a;
    // var_dump($b);
    // array_reverse($b)
    // foreach (array_reverse($b) as $wyraz)  {
    //     echo $wyraz . "<br>";
    // }


    // $c = implode(" ",array_reverse($b));
    // $c = implode(" ",($b));
    // echo(strrev($c));

    // for ($i=0;$i<count($b);$i++) {
    //     $d[i] = strrev($b[$i]);
    // }

    // echo implode(" ", $d);

    
    
    // function zamiana(&$x,&$y) {
    //     $x_temp = $x;
    //     $x = $y;
    //     $y = $x_temp;
    // }

    function Palindrom($tekst) {
        // function mb_strrev($string) {
        //     preg_match_all('/./us', $string, $ar);
        //     return join('',array_reverse($ar[0]));
        // }
        function mb_strrev($string) {
            $t2="";
            for($i=0;$i<mb_strlen($string);$i++) {
                $t2 = mb_substr($string,$i,1) . $t2;
            }
            return $string==$t2;
        }

        $tekst = mb_strtolower($tekst);
        return $tekst==mb_strrev($tekst);
    }

    $n = "KamilŚlimak";
    if (Palindrom($n)) { echo($n.": to jest palindrom");
    } else { echo($n.": to nie jest palindrom");}
    
    // $x=5;
    // $y=7;

    // echo("x=$x, y=$y<br>");
    // zamiana($x,$y);
    // echo("x=$x, y=$y<br>");


    ?>
</body>
</html>