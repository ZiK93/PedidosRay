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

$insertProducto = "INSERT INTO `producto` (`slug`, `nombre`) VALUES 
/*('natilla100gsal', 'Natilla 100g con sal'),*/
('mantequilla1kgconsal', 'Mantequilla de 1KG con sal')";
if ($conn->query($insertProducto)) {
    echo "<br> success insertProducto <br>";
} else {
    echo "error";
}

$conn->close();

?>