<?php  


$servername = "testmysqlpedidosray.mysql.database.azure.com";
$username = "pedidosray";
$password = ".,05zaxscdvf";
$dbname = "id16779907_pedidos_ray";
    
    
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

if($conn->query('UPDATE cliente SET completado = 0 WHERE 1')){
    echo getActualDate();
}
    
$conn->close();


function getActualDate(){
    $date = new DateTime(date('d-M-Y H:i:s'));
    $date->setTimezone(new DateTimeZone("America/Costa_Rica"));


    return strval($date->format('d-M-Y H:i:s'));
}
?>