<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

class Wektor {
    private $x;
    private $y;

    function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    function __toString() {
        return "[$this->x, $this->y]";
    }

    function add($v) { // dodawanie wektorow
        return new Wektor($this->x + $v->get_x(), $this->y + $v->get_y());
    }

    function get_x() {
        return $this->x;
    }

    function get_y() {
        return $this->y;
    }

}

$v1 = new Wektor(2,2);
$v2 = new Wektor(4,4);
$v3 = $v1->add($v2);
echo($v3);


?>
</body>
</html>