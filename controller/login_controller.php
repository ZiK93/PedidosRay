<?php 
    session_start();
	$usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $user = "false";
	if(isset($usuario) && isset($contrasenia)){
        require_once("../config.php");
        // Create connection
        // Create connection
        $conn = connect_to_database();
        $acentos = $conn->query("SET NAMES 'utf8'");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($result = $conn -> query('SELECT usuario, pago FROM usuarios WHERE usuario = "'.$usuario.'" AND contrasenia = "'.$contrasenia.'"')) {
            while($obj = $result->fetch_object()){
                if(isset($obj->usuario)){
                    $user = "true";
                    $_SESSION["user"] = $obj->usuario;
                    $_SESSION["pago"] = $obj->pago;
                };
            }
        }
          
        $conn->close();
    }
    echo $user;
?>