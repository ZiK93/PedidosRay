<?php 
    session_start();
    $usuario = $_SESSION["user"];

    $flag = "false";
	if(isset($_POST['slug'])){
        $slug = $_POST['slug'];
    }
    if(isset($_POST['newpos'])){
        $newpos = $_POST['newpos'];
    }
    if(isset($_POST['id_producto'])){
        $id_producto = $_POST['id_producto'];
    }
    if(isset($_POST['columna'])){
        $columna = $_POST['columna'];
    }
    
    $operacion = $_POST['operacion'];

    if($operacion == "editpos"){
        if(isset($id_producto)){
            require_once("../config.php");
            // Create connection
            $conn = connect_to_database();
                $acentos = $conn->query("SET NAMES 'utf8'");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($result1 = $conn -> query('SELECT MAX(pos) as maxposquery FROM producto WHERE columna = "'.$columna.'" AND usuario = "'.$usuario.'"')) {
                while($obj1 = $result1->fetch_object()){
                    $maxpos = $obj1->maxposquery;
                    if($newpos <= $maxpos){
                        if ($result2general = $conn -> query('SELECT id_producto,slug,pos FROM producto WHERE id_producto = "'.$id_producto.'" AND usuario = "'.$usuario.'"')) {
                            while($obj2general = $result2general->fetch_object()){
                                if($obj2general->pos == $newpos){
                                    $flag = "false";
                                } else {
                                    if($obj2general->pos > $newpos){ //subiendo producto
                                        if ($result2 = $conn -> query('SELECT id_producto,slug,pos FROM producto WHERE pos >= '.$newpos.' AND pos < '.$obj2general->pos.' AND columna = "'.$columna.'" AND usuario = "'.$usuario.'" ORDER by pos ASC')) {
                                            while($obj2 = $result2->fetch_object()){
                                                $nextposprods = $obj2->pos + 1;
                                                $sql1 = 'UPDATE producto SET pos = '.$nextposprods.' WHERE id_producto = "'.$obj2->id_producto.'" AND usuario = "'.$usuario.'"';
                                                $conn->query($sql1);
                                            }
                                        } 
                                        $sql2 = 'UPDATE producto SET pos = '.$newpos.' WHERE id_producto = "'.$id_producto.'" AND usuario = "'.$usuario.'"';
                                        if ($conn->query($sql2) === TRUE) {
                                            $flag = "true";
                                        }
                                    } else if($obj2general->pos < $newpos){ //bajando producto
                                        if ($result2 = $conn -> query('SELECT id_producto,slug,pos FROM producto WHERE pos > '.$obj2general->pos.' AND pos < '.$newpos.' AND columna = "'.$columna.'" AND usuario = "'.$usuario.'" ORDER by pos ASC')) {
                                            while($obj3 = $result2->fetch_object()){
                                                $nextpos = $obj3->pos - 1;
                                                $sql1 = 'UPDATE producto SET pos = '.$nextpos.' WHERE id_producto = "'.$obj3->id_producto.'" AND usuario = "'.$usuario.'"';
                                                $conn->query($sql1);
                                            }
                                        } 
                                        $newpos = $newpos - 1;
                                        $sql2 = 'UPDATE producto SET pos = '.$newpos.' WHERE id_producto = "'.$id_producto.'" AND usuario = "'.$usuario.'"';
                                        if ($conn->query($sql2) === TRUE) {
                                            $flag = "true";
                                        }
                                    }           
                                }
                            }
                        }
                    }
                }
            }
             
            $conn->close();
        } else {
            $flag = "false";
        }
        echo $flag;
    }

    if($operacion == "eliminar"){
        if(isset($id_producto)){
            require_once("../config.php");
            // Create connection
            $conn = connect_to_database();
                $acentos = $conn->query("SET NAMES 'utf8'");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        

            $sql = 'DELETE FROM producto WHERE id_producto = "'.$id_producto.'" AND usuario = "'.$usuario.'"';
            $flag = "true";
            if ($conn->query($sql) === TRUE) {
                if ($result2 = $conn -> query('SELECT id_producto,pos FROM producto WHERE pos > '.$newpos.' AND columna = "'.$columna.'" AND usuario = "'.$usuario.'" ORDER by pos ASC')) {
                    while($obj2 = $result2->fetch_object()){
                        $nextpos = $obj2->pos - 1;
                        $sql1 = 'UPDATE producto SET pos = '.$nextpos.' WHERE id_producto = "'.$obj2->id_producto.'" AND usuario = "'.$usuario.'"';
                        $conn->query($sql1);
                    }
                } 
            }
            $conn->close();
        } else {
            $flag = "false";
        }
        echo $flag;
    }
?>