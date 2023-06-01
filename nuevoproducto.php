<?php  

$servername = "testmysqlpedidosray.mysql.database.azure.com";
$username = "pedidosray";
$password = ".,05zaxscdvf";
$dbname = "id16779907_db2";
$conn = new mysqli($servername, $username, $password, $dbname);
$acentos = $conn->query("SET NAMES 'utf8'");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$insertProducto = "INSERT INTO `producto` (`slug`, `nombre`) VALUES ('especial_block_de_1kg', 'Especial block de 1KG')";
if ($conn->query($insertProducto)) {
    echo "<br> success insertProducto 31 mayo <br>";
} else {
    echo "error";
}

$conn->close();

?>