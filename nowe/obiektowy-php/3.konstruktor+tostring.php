<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ser</title>
</head>
<body>
    
<?php 

class Prostokat {
    public $a;
    public $b;

    function __construct($a=0, $b=0) {
        $this->a = $a;
        $this->b = $b;
        // echo("pomyslnie utworzono prostokat o $a, $b");
    }

    function __toString() {
        return "Prostokąt o wymiarach $this->a x $this->b";
    }

    function obliczPole() {
        return $this->a * $this->b; 
    }


    function obliczObwod() {
        return ($this->a + $this->b) * 2; 
    }

    function obliczPrzekatna() {
        return round(sqrt(($this->a * $this->a) + ($this->b * $this->b)), 2); 
    }

}


$p1 = new Prostokat(3, 4);
echo $p1->obliczPole()."<br>";
echo $p1->obliczPrzekatna()."<br>";
echo $p1->obliczObwod()."<br>";

?>

</body>
</html>