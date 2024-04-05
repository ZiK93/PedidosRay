<?php 
    session_start();
    $usuario = $_SESSION["user"];

    $flag = "false";
    $columna = $_POST['columna'];
    
	if(isset($columna)){
        require_once("../config.php");
        // Create connection
        $conn = connect_to_database();
            $acentos = $conn->query("SET NAMES 'utf8'");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        

        if ($result = $conn -> query('SELECT MAX(pos) AS pos FROM producto WHERE columna = "'.$columna.'" AND usuario = "'.$usuario.'"')) {
            while($obj = $result->fetch_object()){
                if(isset($obj->pos)){
                    $max_pos = (int)$obj->pos;
                    $max_pos = $max_pos + 1;
                };
            }
        }

        $sql = 'INSERT INTO producto (nombre,slug,columna,usuario,pos) VALUES ("xxxxx","xxxxx","'.$columna.'","'.$usuario.'",'.$max_pos.')';
        if ($conn->query($sql) === TRUE) {
            $flag = "true";
        }
        
          
        $conn->close();
    } else {
        $flag = "false";
    }
    echo $flag;

?>