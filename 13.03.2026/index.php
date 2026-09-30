<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        
    <form action="bmi.php" method="POST">
        <label>a <input type="range" name="a" required min="1" max="100" value="1" id="sigma1"> <output id="value1"></output><br>
        <label>a <input type="number" name="a" required min="1" value="1"> </label> <br>
        <label>b <input type="number" name="b" required min="1" value="1"> </label> <br>
        <!-- <input type="submit" value="Oblicz pole" name="TRAPEZ" action="prostokat.php"> -->
        <input type="submit" value="Oblicz BMI" name="BMI" action="bmi.php">
    </form>
    <form action="prostokat.php" method="POST">
        <label>a <input type="range" name="a" required min="1" max="100" value="1" id="sigma"> <output id="value"></output><br>


        </label>
        <label>b <input type="number" name="b" required min="1" value="1"> </label> <br>
        <input type="submit" value="Oblicz pole" name="TRAPEZ">
        <!-- <input type="submit" value="Oblicz BMI" name="BMI"> -->
    </form>
        <script>
            function liczenie(nazwa, output) {
                const value = document.querySelector(`${output}`);
                const input = document.querySelector(`${nazwa}`);
                value.textContent = input.value;
                input.addEventListener("input", (event) => {
                  value.textContent = event.target.value;
                });
            }

            liczenie("#sigma", "#value")
            liczenie("#sigma1", "#value1")
        </script>
</body>
</html>