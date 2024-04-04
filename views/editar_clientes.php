<?php
   session_start();
?>
<?php if(isset($_SESSION["user"])){
    $usuario = $_SESSION["user"]; ?>


<html>
    <head>
        <title>Editar Pedido</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/style.css">
        
    </head>
    <body>
        <div class="container">
            <script src="/js/js.js"></script>
            <div class="d-flex justify-content-center header">
                <h3>Administración de clientes</h3>
            </div>
            <a href="../inicio.php" class="btn btn-primary d-flex justify-content-center">Volver</a>
            <div class="container">
                <div class="row tablaProductos">
                    <div class="col-sm bordeColumnas">
                        <?php CargarClientes($usuario); ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php } else {
    header("Location: /index.php");
    exit();
} ?>

<?php 

    function CargarClientes($usuario){
        require_once("../config.php");
        // Create connection
        $conn = connect_to_database();

        $acentos = $conn->query("SET NAMES 'utf8'");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if ($result = $conn -> query('SELECT id_cliente,nombre FROM cliente WHERE usuario = "'.$usuario.'"')) {
            while($obj = $result->fetch_object()){
                    echo '
                    <div class="d-flex justify-content-center" id="listaclientes">
                        <input type="text" class="form-control" id="'.$obj->id_cliente.'" aria-describedby="emailHelp" value="'.$obj->nombre.'">
                        <button class="btn btn-primary" id="btneditarcliente" onclick="editarCliente('.$obj->id_cliente.')">Editar</button>
                        <button class="btn btn-danger" id="btneditarcliente" onclick="eliminarCliente('.$obj->id_cliente.')">Eliminar</button>
                    </div>
                    ';
            }
        }
        $conn->close();
    }

?>
