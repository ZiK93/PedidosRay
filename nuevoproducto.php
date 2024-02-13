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

$insertProducto = "INSERT INTO `producto` (`slug`, `nombre`) VALUES ('quesocrema30610', 'Queso Crema Blanco 1kg (30610)')";
if ($conn->query($insertProducto)) {
    echo "<br> success insertProducto 12 febrero diciembre - quesocrema30610<br>";
} else {
    echo "error";
}

$conn->close();

?>
