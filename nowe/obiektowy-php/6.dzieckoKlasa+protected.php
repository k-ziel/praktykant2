<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

class Zwierze {
    protected $nazwa; // protected znaczy, ze dostep do tego ma klasa ale takze extended klasy
                      // takie jak np wlasnie pies, ale wsm to czasem nie dziala xddd

    function __construct($nazwa) {
        // echo("Stworzyłem nowe zwierze<br>");
        $this->nazwa = $nazwa;
    }

    function __toString() {
        return "Jestem zwierzęciem i nazywam się $this->nazwa<br>";
    }
}

class Pies extends Zwierze { // klasa pies to jest rozszerzenie do klasy zwierze
                             // klasa pies dziedziczy funkcje z klasy zwierze
                             // ma nazwe, konstruktor z klasy zwierze
    public $rasa;

    function __construct($nazwa, $rasa) {
        parent::__construct($nazwa);
        $this->rasa = $rasa;
    }
    
    function __toString() {
        return "Jestem psem rasy $this->rasa i nazywam się $this->nazwa<br>";
    }

}

$z1 = new Pies("Piotr", "Słupik");
$z2 = new Zwierze("Marek");
echo($z1);
echo($z2);

?>
</body>
</html>