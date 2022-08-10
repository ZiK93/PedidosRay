<?php 

	$nombre_cliente = $_POST['nombre_cliente'];
	
    $servername = "testmysqlpedidosray.mysql.database.azure.com";
    $username = "pedidosray";
    $password = ".,05zaxscdvf";
    $dbname = "id16779907_db2";

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