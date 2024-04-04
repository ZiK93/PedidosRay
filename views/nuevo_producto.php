<?php
    session_start();
?>
<?php if(isset($_SESSION["user"])){
    $usuario = $_SESSION["user"]; ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Nuevo Producto</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/style.css">
        
    </head>
    <body>
            <script src="/js/js.js"></script>
            <div class="d-flex justify-content-center header">
                <h3>Productos</h3>
                
            </div>
            <div  class="container"><a href="../inicio.php" class="btn btn-primary d-flex justify-content-center">Volver</a></div>
            <div class="container">
                    <div class="row tablaProductos">
                        <div class="col-sm bordeColumnas">
                            
                            <div>
                                <button id="btnAgregarP1" type="button" class="btn btn-success btn-lg" type="submit" value="Submit" onclick="agregarproductoBTN1()">Agregar Producto</button>
                                <button id="btnAgregarespacio1" type="button" class="btn btn-primary btn-sm" type="submit" style="margin-left: 10%;" value="Submit" onclick="agragarespacio(1)">Agregar Espaciador</button>
                                <div id="showformagregar1" style="visibility: hidden; height: 20px;">
                                    <div class="form-group row">
                                        <div class="col"><input type="text" class="form-control" id="NombreProducto1" aria-describedby="emailHelp" placeholder="Ingrese el nombre del producto"></div>
                                        <div class="col-md-auto btnagregarnuevo"><button class="btn btn-primary" id="agregarProducto" onclick="agregarProducto(1)">Agregar</button></div>
                                    </div>
                                </div>
                            </div>
                            <?php echo mostrarProductos(1); ?>
                        </div>

                        <div class="col-sm bordeColumnas">
                            
                            <div>
                                <button id="btnAgregarP2" type="button" class="btn btn-success btn-lg" type="submit" value="Submit" onclick="agregarproductoBTN2()">Agregar Producto</button>
                                <button id="btnAgregarespacio2" type="button" class="btn btn-primary btn-sm" type="submit" style="margin-left: 10%;" value="Submit" onclick="agragarespacio(2)">Agregar Espaciador</button>
                                <div id="showformagregar2" style="visibility: hidden; height: 20px;">
                                    <div class="form-group row">
                                        <div class="col"><input type="text" class="form-control" id="NombreProducto2" aria-describedby="emailHelp" placeholder="Ingrese el nombre del producto"></div>
                                        <div class="col-md-auto btnagregarnuevo"><button class="btn btn-primary" id="agregarProducto" onclick="agregarProducto(2)">Agregar</button></div>
                                    </div>
                                </div>
                            </div> 
                            <?php echo mostrarProductos(2); ?>        
                        </div>    
                    </div>
                    <script type="text/javascript">
                        $("input[type=number]").focus(function(){	   
                            this.select();
                        });
                    </script>
                </div>
            
    </body>
    <script type="text/javascript">
                var frm = $('#products_list');

                frm.submit(function (e) {

                    e.preventDefault();

                    $.ajax({
                        type: frm.attr('method'),
                        url: frm.attr('action'),
                        data: frm.serialize(),
                        success: function (data) {
                            if(data){
                                alert('Pedido creado correctamente');
                                window.location.replace("../inicio.php");
                            } else {
                                alert('Ha ocurrido un error, intente nuevamente.');
                                window.location.replace("../inicio.php");
                            }   
                        },
                        error: function (data) {
                            console.log('An error occurred.');
                            console.log(data);
                        },
                    });
                });
            </script>
    
</html>
<?php } else {
    header("Location: /index.php");
    exit();
} ?>
<?php
        function mostrarProductos($columna){
            $usuario = $_SESSION["user"];
            require_once("../config.php");
            // Create connection
            $conn = connect_to_database();
    
            $rows = "";
            $cliente_pedido = array();
            $producto_slug_nombre = array();
            $cliente_id_nombre = array();
    
            $acentos = $conn->query("SET NAMES 'utf8'");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            if ($result = $conn -> query('SELECT * FROM producto WHERE columna = "'.$columna.'" AND usuario = "'.$usuario.'" ORDER BY pos ASC')) {
                while($obj = $result->fetch_object()){
                    if($obj->slug != "xxxxx"){
                        echo '<div><input class="form-control quantity listprdsbox" type="text" id="'.$obj->slug.'" name="'.$obj->slug.'" value="'.$obj->pos.'">
                        <label class="listprds" for="'.$obj->slug.'">'.$obj->nombre.'</label>
                        <button class="btn btn-danger" id="btneliminarproducto" onclick="eliminarProducto(`'.$obj->slug.'`)">Eliminar</button></div>
                        ';
                    } else {
                        echo '<div><input class="form-control quantity listprdsbox" type="text" id="'.$obj->slug.'" name="'.$obj->slug.'" value="'.$obj->pos.'">
                        <label class="listprds" for="'.$obj->slug.'">-----Espaciador------</label>
                        <button class="btn btn-danger" id="btneliminarproducto" onclick="eliminarProducto(`'.$obj->slug.'`)">Eliminar</button></div>';
                    }
                    
                }
            } 

        }
    ?>


