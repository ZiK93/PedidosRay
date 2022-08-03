<?php  

    
$servername = "pedidosray-server.mysql.database.azure.com";
$username = "bpgjuzgedi";
$password = ".,05zaxscd";
$dbname = "id16779907_pedidos_ray";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $sql33 = 'SELECT id_pedido FROM pedido';
    if ($conn->query($sql33)) {
        echo $conn->query($sql33)->num_rows;
    } else {
        echo $conn->query($sql33)->num_rows;
    }

    $conn->close();

?>