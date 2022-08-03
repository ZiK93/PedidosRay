<?php  
$flag = 0;

if($cliente = $_POST["data_id_cliente"]){

    $dataCliente = explode("|", $cliente);
    $id_cliente = $dataCliente[0];
    $id_pedido = $dataCliente[1];

    $servername = "pedidosray-server.mysql.database.azure.com";
    $username = "bpgjuzgedi";
    $password = ".,05zaxscd";
    $dbname = "id16779907_pedidos_ray";
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $agregados = 0;
    if ($conn->query('DELETE FROM pedido WHERE id_pedido = '.$id_pedido)) {
        if ($conn -> query('DELETE FROM detalle WHERE fk_pedido = '.$id_pedido)) {
            if ($conn->query('INSERT INTO pedido (fk_cliente,fecha) VALUES ('.$id_cliente.',"'.getActualDate().'")')) {
                if ($result = $conn -> query("SELECT * FROM pedido ORDER BY id_pedido DESC LIMIT 1")) {
                    while($obj = $result->fetch_object()){
                        $id_nuevo_pedido = $obj->id_pedido;
                    }
                } 
            } 
            
            if(isset($id_nuevo_pedido)){
                foreach($_POST as $product_slug => $cant){
                    if($product_slug != "data_id_cliente"){
                        if((strval($cant) != "") && (strval($cant) != "0")){
                            if ($conn->query('INSERT INTO detalle (fk_pedido,slug_producto,cantidad) VALUES ('.$id_nuevo_pedido.',"'.$product_slug.'",'.$cant.')')) {
                                if($flag == 0){
                                    $conn->query('UPDATE cliente SET completado = 1 WHERE id_cliente = '.$id_cliente);
                                }
                                $flag = 1;
                                $agregados += 1;
                            } else {
                                $flag = 0;
                            }
                        }
                    }
                }
            }
        } 
    }
    if($agregados == 0){
        if ($conn->query('DELETE FROM pedido WHERE id_pedido = '.$id_nuevo_pedido)) {
            if ($conn->query('UPDATE cliente SET completado = 0 WHERE id_cliente = '.$id_cliente)) {
                $flag = 99;
            } 
        }
    } 

    $conn->close();
}


echo $flag;

function getActualDate(){
    $date = new DateTime(date('d-M-Y H:i:s'));
    $date->setTimezone(new DateTimeZone("America/Costa_Rica"));


    return strval($date->format('d-M-Y'));
}
?>