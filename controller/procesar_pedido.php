<?php 
session_start();
$usuario = $_SESSION["user"];

$flag = false;

if($id_cliente = $_POST["data_id_cliente"]){

    require_once("../config.php");
    // Create connection
    $conn = connect_to_database();
        $acentos = $conn->query("SET NAMES 'utf8'");
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    $sum = 0;
    foreach($_POST as $product_slug => $cant){
        if($product_slug != "data_id_cliente"){
            if((strval($cant) != "") && (strval($cant) != "0")){
                $sum = $sum + 1;
            }
        }
    }
    if($sum > 0){
        $sql33 = 'SELECT id_pedido FROM pedido WHERE fk_cliente = '.$id_cliente.' AND fecha = "'.getActualDate().'" AND usuario = "'.$usuario.'"';
        $myquery = $conn->query($sql33);
        if ($myquery->num_rows < 1 || $myquery == NULL) {
            $sql = 'INSERT INTO pedido (fk_cliente,fecha,usuario) VALUES ('.$id_cliente.',"'.getActualDate().'","'.$usuario.'")';
            if ($conn->query($sql) === TRUE) {
                if ($result = $conn -> query('select * from pedido WHERE usuario = "'.$usuario.'" order by id_pedido desc limit 1')) {
                    while($obj = $result->fetch_object()){
                        $id_nuevo_pedido = $obj->id_pedido;
                    }
                } 
            } 
            
            if(isset($id_nuevo_pedido)){
                foreach($_POST as $product_slug => $cant){
                    if($product_slug != "data_id_cliente"){
                        if((strval($cant) != "") && (strval($cant) != "0")){
                            $sql = 'INSERT INTO detalle (fk_pedido,slug_producto,cantidad,usuario) VALUES ('.$id_nuevo_pedido.',"'.$product_slug.'",'.$cant.',"'.$usuario.'")';
                            if ($conn->query($sql) === TRUE) {
                                if(!$flag){
                                    $sql2 = 'UPDATE cliente SET completado = 1 WHERE id_cliente = '.$id_cliente.' AND usuario = "'.$usuario.'"';
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