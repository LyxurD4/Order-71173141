<?php
$host='localhost';
$db = 'netland';
$username = 'root';
$password = '';

$dsn= "mysql:host=$host;dbname=$db";
try {
    // create a PDO connection with the configuration data
    $conn = new PDO($dsn, $username, $password);
    
    // display a message if connected to database successfully
    if ($conn) {
        echo "Connected to the <strong>$db</strong> database successfully!";
    }
} catch (PDOException $e) {
    // report error message
    echo $e->getMessage();
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
    <br>
    <a href="index.php">Terug</a>
    <?php
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $informatie = $conn->query("select * from films where id = $id");
    }
    foreach($informatie as $row) { ?>
        <h1><?php echo $row["titel"]; echo " - "; echo $row["duur"] ?> minuten</h1>
        <ul>
            <li><?php echo $row["datum_van_uitkomst"] ?></li>
        </ul>
        <p></p>
        <a href="<?php echo $row["trailer"] ?>">Trailer</a>
        <br>
        <iframe width="420" height="345" src="<?php echo $row["trailer"] ?>"></iframe>
    <?php } ?>
</body>
</html>