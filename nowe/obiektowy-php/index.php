<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

abstract class Figura {
    protected $opis;
    protected $nazwa;
    abstract function pole();
    function __construct($nazwa, $opis) {
        $this->nazwa = $nazwa;
        $this->opis = $opis;
    }
}

interface Ruchome {
    function ruch();
}

class Kwadrat extends Figura implements Ruchome {
    private $a;
    function __construct($nazwa, $opis, $a) {
        parent::__construct($nazwa, $opis);
        $this->a = $a;
    }

    function __toString() {
        return "$this->nazwa, $this->opis, $this->a<br>";
    }

    function pole() {
        return $this->a * $this->a;
    }

    function ruch() {
        return "ser";
    }
}

$k1 = new Kwadrat("marek", "polna", 4);
echo($k1->ruch());
echo($k1->pole());


?>
</body>
</html>