<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// settery, gettery, private i public

class Prostokat {
    private $a; // nie mozna tego uzywac poza ta funkcja
    private $b;
    public static $x=0; // jak chcemy tego uzyc to musimy self::$x
                        // poza klasa to nazwaklasy::$x, czyli Prostokat::$x,
                        // i jest to wspolne dla kazdego obiektu 
                        // mozna tego uzyc np. do licznika obiektow
    
    function __construct($a, $b=-1) {
        if($b == -1) {
            $b = $a;
        }
        if($a <= 0 || $b <= 0) {
            echo("popraw wartosci");
        } else {
            $this->a = $a;
            $this->b = $b;
            self::$x++;
        }

    }

    function __destruct() {
        self::$x--;
    }

    function __toString() {
        return "[$this->a x $this->b], ".self::$x." <br>";
    }

    function skaluj($xa, $xb) {
        $this->a *= $xa;
        $this->b *= $xb;
    }

    function get_a() { // getter
        return $this->a;
    }

    function get_b() { // getter
        return $this->b;
    }

    function set_a($a) { // setter
        if($a > 0) {
            $this->a = $a;
        } 
    }

    function set_b($b) { // setter
        if($b > 0) {
            $this->b = $b;
        } 
    }
}

$p1 = new Prostokat(5);
$p2 = new Prostokat(5);
$p3 = new Prostokat(5);
unset($p3);

// echo($p1->get_a());

// echo("<br>");

// $p1->set_a($p1->get_a() * 3);

// echo($p1->get_a());
// Prostokat::$x = 5;
echo $p1;
echo $p2;
// $p1->skaluj(2,3);
// echo $p1;

?>
</body>
</html>