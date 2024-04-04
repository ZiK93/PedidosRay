<?php  


require_once("../config.php");
// Create connection
$conn = connect_to_database();
$acentos = $conn->query("SET NAMES 'utf8'");
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