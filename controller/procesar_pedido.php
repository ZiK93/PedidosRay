<?php  
$flag = false;

if($id_cliente = $_POST["data_id_cliente"]){

    $servername = "testmysqlpedidosray.mysql.database.azure.com";
    $username = "pedidosray";
    $password = ".,05zaxscdvf";
    $dbname = "id16779907_db2";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
        $acentos = $conn->query("SET NAMES 'utf8'");
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $sql33 = 'SELECT id_pedido FROM pedido WHERE fk_cliente = '.$id_cliente.' AND fecha = "'.getActualDate().'"';
    $myquery = $conn->query($sql33);
    if ($myquery->num_rows < 1 || $myquery == NULL) {
        $sql = 'INSERT INTO pedido (fk_cliente,fecha) VALUES ('.$id_cliente.',"'.getActualDate().'")';
        if ($conn->query($sql) === TRUE) {
            if ($result = $conn -> query("select * from pedido order by id_pedido desc limit 1")) {
                while($obj = $result->fetch_object()){
                    $id_nuevo_pedido = $obj->id_pedido;
                }
            } 
        } 
        
        if(isset($id_nuevo_pedido)){
            foreach($_POST as $product_slug => $cant){
                if($product_slug != "data_id_cliente"){
                    if((strval($cant) != "") && (strval($cant) != "0")){
                        $sql = 'INSERT INTO detalle (fk_pedido,slug_producto,cantidad) VALUES ('.$id_nuevo_pedido.',"'.$product_slug.'",'.$cant.')';
                        if ($conn->query($sql) === TRUE) {
                            if(!$flag){
                                $sql2 = 'UPDATE cliente SET completado = 1 WHERE id_cliente = '.$id_cliente;
                                $conn->query($sql2);
                            }
                            $flag = true;
                        } else {
                            $flag = false;
                        }
                    }
                }
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