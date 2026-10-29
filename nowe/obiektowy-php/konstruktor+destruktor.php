<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    class Samochud {
        public $marka;
        public $licznik;

        function __construct($marka, $licznik) {
            $this->marka = $marka;
            $this->licznik = $licznik;
            echo("działa konstruktor, dla samochodu $marka o liczniku $licznik<br>");
        }

        function __destruct()
        {
            echo("usunięto obiekt ".$this->marka." o liczniku: ".$this->licznik."<br>");
        }

        function jedz($ile) {
            $this->licznik += $ile;
        }
        function cofaj($ile) {
            $this->licznik -= $ile;
        }
        function przedstawSie() {
            echo("Cześć, jestem $this->marka. Na liczniku mam $this->licznik"."<br>");
        }
    }
    
    
    
    
    
    $s1 = new Samochud("bmw", random_int(0, 1000000));
    $s1->jedz(10);
    $s1->przedstawSie();
    unset($s1);
        
    $s2 = new Samochud("mercedes", 67);
    $s2->jedz(67);
    $s2->cofaj(573);
    $s2->przedstawSie();
    
    ?>
</body>
</html>