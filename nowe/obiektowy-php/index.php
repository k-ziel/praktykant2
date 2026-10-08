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

        function jedz($ile) {
            $this->licznik += $ile;
        }
        function cofaj($ile) {
            $this->licznik -= $ile;
        }
        function przedstawSie() {
            echo("Cześć, jestem $this->marka. Na liczniku mam $this->licznik");
        }
    }
    
    $s1 = new Samochud;
    $s1->marka="bmw";
    $s1->licznik=0;


    $s2 = new Samochud;
    $s2->marka="mercedes";
    $s2->licznik=0;


    // echo($s1->licznik."<br>");
    $s1->jedz(10);
    $s2->jedz(67);
    $s2->cofaj(573);
    // echo($s1->licznik);
    $s1->przedstawSie();
    echo("<br>");
    $s2->przedstawSie();
    // var_dump($s1);
    
    ?>
</body>
</html>