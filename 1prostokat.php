<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content>

    <style>
        .tekst {
            font-family: "MS Gothic";
            color: red;
            text-align: center;
            font-size: 50px;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        img {
            justify-content: center;
        }
    </style>
    

</head>
<body>
    <?php
    if (isset($_GET["masa"]) && isset($_GET["wzrost"]))  {
        $masa = $_GET["masa"];
        $wzrost = $_GET["wzrost"] / 100;
    
        if(is_numeric($masa) && is_numeric($wzrost))  {
            if ($masa > 0 && $wzrost > 0)  {
                $bmi = $masa / ($wzrost**2);
                $bmi_floor = floor($bmi);

                if($bmi > 18.5)  {
                    if($bmi > 24.9) {
                        echo "<div class='tekst'>Masz nadwage:  $bmi_floor</div><img src=https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc8.alamy.com%2Fcomp%2FGJ4Y4H%2Fvery-obese-man-GJ4Y4H.jpg&f=1&nofb=1&ipt=1091b1f58a7d030e408f9846ba6523f10feaeb6b9ee120a45465aa80fc403894 width=200px";
                    } 
                     
                    else {

                        echo "<div class='tekst'>Jestes sigma git:  $bmi_floor </div><img width=200px src=https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimg.freepik.com%2Fpremium-photo%2Fprofessional-photoshoot-pose-male-stock-image-portrait-paris-high-res-free-jpg_883241-11247.jpg%3Fw%3D1060&f=1&nofb=1&ipt=9dc7a72cdce9a37bf5e20120826e4c931c0c918eb12c9200cdbe04bc675d1c8c>";
                    } 
                     
                    
                }
                else  {
                    echo "<div class='tekst'>Masz niedowage:  $bmi_floor </div><img width=200px src=https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fthumbs.dreamstime.com%2Fb%2Fdwarf-little-man-4339718.jpg&f=1&nofb=1&ipt=fdcc725abb8c333635dff33a0d7bac1a141d504a4946a697ab65f34baf3f7fdf>";

                }
                                 
             
            }
            else {

                echo "daj wieksze niz 0 ";
            }  
             
         
         
        }
        else {

            echo "tekst";
        }  
    } 
    else {

        echo "wez tam daj jakies dane cn?";
    }
    


    ?>
</body>
</html>