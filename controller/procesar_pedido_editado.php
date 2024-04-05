<?php  
session_start();
$usuario = $_SESSION["user"];
$flag = 0;
if($cliente = $_POST["data_id_cliente"]){

    $dataCliente = explode("|", $cliente);
    $id_cliente = $dataCliente[0];
    $id_pedido = $dataCliente[1];

    require_once("../config.php");
    // Create connection
    $conn = connect_to_database();
        $acentos = $conn->query("SET NAMES 'utf8'");
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $agregados = 0;

    if ($conn->query('DELETE FROM pedido WHERE id_pedido = '.$id_pedido.' AND usuario = "'.$usuario.'"')) {
        if ($conn -> query('DELETE FROM detalle WHERE fk_pedido = '.$id_pedido.' AND usuario = "'.$usuario.'"')) {
            if ($conn->query('INSERT INTO pedido (fk_cliente,fecha,usuario) VALUES ('.$id_cliente.',"'.getActualDate().'","'.$usuario.'")')) {
                if ($result = $conn -> query('SELECT * FROM pedido WHERE usuario = "'.$usuario.'" ORDER BY id_pedido DESC LIMIT 1')) {
                    while($obj = $result->fetch_object()){
                        $id_nuevo_pedido = $obj->id_pedido;
                    }
                } 
            }

            if(isset($id_nuevo_pedido)){
                foreach($_POST as $product_slug => $cant){
                    if($product_slug != "data_id_cliente"){
                        
                        if((strval($cant) != "") && (strval($cant) != "0")){
                            if ($conn->query('INSERT INTO detalle (fk_pedido,slug_producto,cantidad,usuario) VALUES ('.$id_nuevo_pedido.',"'.$product_slug.'",'.$cant.',"'.$usuario.'")')) {
                                if($flag == 0){
                                    $conn->query('UPDATE cliente SET completado = 1 WHERE id_cliente  = '.$id_cliente.' AND usuario = "'.$usuario.'"');
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
        if ($conn->query('DELETE FROM pedido WHERE id_pedido = '.$id_nuevo_pedido.' AND usuario = "'.$usuario.'"')) {
            if ($conn->query('UPDATE cliente SET completado = 0 WHERE id_cliente = '.$id_cliente.' AND usuario = "'.$usuario.'"')) {
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