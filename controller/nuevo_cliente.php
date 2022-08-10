<?php 

	$nombre_cliente = $_POST['nombre_cliente'];
	
    $servername = "pedidosray-server.mysql.database.azure.com";
    $username = "xlpoxuildk";
    $password = "17US2Z3XPENOSC1G$";
    $dbname = "id16779907_pedidos_ray";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = 'INSERT INTO cliente (nombre) VALUES ("'.$nombre_cliente.'")';
    if ($conn->query($sql) === TRUE) {
        echo "true";
    } else {
        echo "false";
    }
      
    $conn->close();


?>