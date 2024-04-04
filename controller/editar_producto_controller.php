<?php 
    session_start();
    $usuario = $_SESSION["user"];

    $flag = "false";
	$slug = $_POST['slug'];
    $operacion = $_POST['operacion'];

    if($operacion == "editar"){
        if(isset($slug)){
            require_once("../config.php");
            // Create connection
            $conn = connect_to_database();
                $acentos = $conn->query("SET NAMES 'utf8'");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = 'UPDATE cliente SET nombre = "'.$nombre_cliente.'" WHERE cliente.id_cliente = '.$id_cliente.' AND usuario = "'.$usuario.'"';
            if ($conn->query($sql) === TRUE) {
                $flag = "true";
            }
    
              
            $conn->close();
        } else {
            $flag = "false";
        }
        echo $flag;
    }

    if($operacion == "eliminar"){
        if(isset($slug)){
            require_once("../config.php");
            // Create connection
            $conn = connect_to_database();
                $acentos = $conn->query("SET NAMES 'utf8'");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = 'DELETE FROM producto WHERE slug = "'.$slug.'" AND usuario = "'.$usuario.'"';
            if ($conn->query($sql) === TRUE) {
                $flag = "true";
            }
            
            $conn->close();
        } else {
            $flag = "false";
        }
        echo $flag;
    }
?>