<?php 
    session_start();
    $usuario = $_SESSION["user"];
	$nombre_cliente = $_POST['nombre_cliente'];

    require_once("../config.php");
    // Create connection
    $conn = connect_to_database();
        $acentos = $conn->query("SET NAMES 'utf8'");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = 'INSERT INTO cliente (nombre,usuario) VALUES ("'.$nombre_cliente.'","'.$usuario.'")';
    if ($conn->query($sql) === TRUE) {
        echo "true";
    } else {
        echo "false";
    }
      
    $conn->close();


?>