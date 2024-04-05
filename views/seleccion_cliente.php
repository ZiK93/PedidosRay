<?php
    session_start();
?>
<?php if(isset($_SESSION["user"])){
    $usuario = $_SESSION["user"]; ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Nuevo Pedido</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/style.css">
        
    </head>
    <body>
        <?php
            $datos_cliente = GetDataCliente();
        ?>
            <script src="/js/js.js"></script>
            <div class="d-flex justify-content-center header">
                <h2><?php echo $datos_cliente["nombre"]; ?></h2>
            </div>
            <div  class="container"><a href="../inicio.php" class="btn btn-primary d-flex justify-content-center">Volver</a></div>
            <form action="/controller/procesar_pedido.php" method="post" id="products_list">
                <div class="container">
                    <div class="row tablaProductos">
                        <div class="col-sm bordeColumnas">
                            <?php echo CargarProductos(1); ?>
                            
                        </div>

                        <div class="col-sm bordeColumnas">
                            <?php CargarProductos(2); ?>
                            <div>
                                <input class="form-control quantity" style="visibility:hidden;" type="number" id="data_id_cliente" name="data_id_cliente" value="<?php echo $datos_cliente["id_cliente"]; ?>">
                            </div>
                        </div>    
                    </div>
                    <script type="text/javascript">
                        $("input[type=number]").focus(function(){	   
                            this.select();
                        });
                    </script>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-success btn-lg" type="submit" value="Submit" onclick="enviarPedido()">Agregar Pedido</button>
                    </div>
                </div>
            </form>
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
    </body>
</html>
<?php } else {
    header("Location: /index.php");
    exit();
} ?>


<?php 
    function CargarProductos($columna){
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
        if ($result = $conn -> query('SELECT * FROM producto WHERE columna = '.$columna.' AND usuario = "'.$usuario.'"')) {

            while($obj = $result->fetch_object()){
                if($obj->slug != "xxxxx"){
                    echo '
                    <div>
                        <input class="form-control quantity" type="number" min="0" max="999" id="'.$obj->slug.'" name="'.$obj->slug.'" value="0">
                        <label for="'.$obj->slug.'">'.$obj->nombre.'</label>
                    </div>
                    ';
                } else {
                    echo '<br>';
                }
                
            }
        } 
    }

    function GetDataCliente(){
        $usuario = $_SESSION["user"];
        if(isset($_POST['clients_list'])){
            $id_cliente = $_POST['clients_list'];
            
            require_once("../config.php");
            // Create connection
            $conn = connect_to_database();
            $acentos = $conn->query("SET NAMES 'utf8'");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            if ($result = $conn -> query('SELECT nombre FROM cliente WHERE id_cliente = '.$id_cliente.' AND usuario = "'.$usuario.'"')) {
                while($obj = $result->fetch_object()){
                    $nombreCliente = $obj->nombre;
                }
            }
            
            $conn->close();
            $DataCliente = array("nombre" => $nombreCliente, "id_cliente" => $id_cliente);

            return $DataCliente;            
        }
        else {
            return "Sin cliente seleccionado";
        }
    }
?>
