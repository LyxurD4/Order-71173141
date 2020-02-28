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
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <br>
    <a href="index.php">Terug</a>
    <?php
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $informatie = $conn->query("select * from series where id = $id");
    } 
    foreach($informatie as $row) { ?>
        <h1><?php echo $row["title"]; echo " - "; echo $row["rating"] ?></h1>
        <ul>
            <li>Awards?<?php echo " - "; echo $row["has_won_awards"] ?></li>
            <li>Awards?<?php echo " - "; echo $row["seasons"] ?></li>
            <li>Awards?<?php echo " - "; echo $row["country"] ?></li>
            <li>Awards?<?php echo " - "; echo $row["language"] ?></li>
        </ul>
        <p>
            <?php echo $row["description"] ?>
        </p>
        <?php } ?>
</body>
</html>