<?php
$serwer = "127.0.0.1";
$user = "root";
$password = "";
$dbname = "ser";
$conn = mysqli_connect($serwer, $user, $password, $dbname);

if (isset($_GET['usluga'])) {
    $sql = "INSERT INTO uslugi VALUES (NULL,\"{$_GET['rodzaj_uslugi']}\",\"{$_GET['']}\",{$_GET['rodzaj_uslugi']})";
    echo $sql;
    mysqli_query($conn,$sql);
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <label>Nazwa uslugi: <input type="text" name="usluga" placeholder="ser"></label>
        <label><input type="number" name="cena" min="5" step="5" value="5"></label>
        <label>Rodzaj<select name="rodzaj">
            <?php
            $sql = "SELECT DISTINCT rodzaj_uslugi FROM uslugi";
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option>{$row['rodzaj_uslugi']}</option>";

            }

            ?>
        </label></select>
        <input type="submit">
    </form>
    <hr>
    <?php
    $sql = "SELECT * FROM uslugi";
    $result = mysqli_query($conn,$sql);
    echo "<ol>\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>{$row['usluga']} ({$row['id_uslugi']})</li>";

    }
    echo "</ol>\n";
    ?>
</body>
</html>

<?php
mysqli_close($conn);
?>