<?php  

    
$servername = "pedidosray-server.mysql.database.azure.com";
$username = "xlpoxuildk";
$password = "17US2Z3XPENOSC1G$";
$dbname = "id16779907_pedidos_ray";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    /* $sql33 = 'SELECT id_pedido FROM pedido';
    if ($conn->query($sql33)) {
        echo $conn->query($sql33)->num_rows;
    } else {
        echo $conn->query($sql33)->num_rows;
    }
    */
    $sql33 = 'ALTER TABLE `cliente`
    ADD PRIMARY KEY (`id_cliente`)';
    if ($conn->query($sql33)) {
        echo "success";
    } else {
        echo "error";
    }

    
    $conn->close();

?>