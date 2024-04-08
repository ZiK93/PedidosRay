<?php 
    session_start();
    $usuario = $_SESSION["user"];

    $flag = "false";
	$nombre_producto = $_POST['nombre_producto'];
    $columna = $_POST['columna'];
	if(isset($nombre_producto)){
        require_once("../config.php");
        // Create connection
        $conn = connect_to_database();
            $acentos = $conn->query("SET NAMES 'utf8'");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $slug = str_replace(' ', '_', $nombre_producto);
        $slug = str_replace('.', '_', $slug);
        $slug = strtolower($slug);
    
        $existe = false;
        $slug_existe = mysqli_num_rows($conn -> query('SELECT slug FROM producto WHERE slug = "'.$slug.'" AND usuario = "'.$usuario.'"'));

        if ($slug_existe > 0) {
            $existe = true;
        } else {
            $existe = false;
        }
    
        if ($result = $conn -> query('SELECT MAX(pos) AS pos FROM producto WHERE columna = "'.$columna.'" AND usuario = "'.$usuario.'"')) {
            while($obj = $result->fetch_object()){
                if(isset($obj->pos)){
                    $max_pos = (int)$obj->pos;
                    $max_pos = $max_pos + 1;
                } else {
                    $max_pos = 1;
                }
            }
        }

        if($existe){
            $flag = "false";
        } else {
            $sql = 'INSERT INTO producto (nombre,slug,columna,usuario,pos) VALUES ("'.$nombre_producto.'","'.$slug.'","'.$columna.'","'.$usuario.'",'.$max_pos.')';
            if ($conn->query($sql) === TRUE) {
                $flag = "true";
            }
        }
        
          
        $conn->close();
    } else {
        $flag = "false";
    }
    echo $flag;

?>