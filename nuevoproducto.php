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

$insertProducto = "INSERT INTO `producto` (`slug`, `nombre`) VALUES ('choppers_esp', 'CHOPPERS'),('crujipan_esp', 'Crujipan')('pmundo_cartago_esp', 'Pequeño mundo cartago')";
if ($conn->query($insertProducto)) {
    echo "<br> success insert<br>  Producto 12 febrero diciembre - choppers_esp crujipan_esp pmundo_cartago_esp<br>";
} else {
    echo "error";
}

$conn->close();

?>
