<html>
    <head>
        <title>Sistema de pedidos</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>


        <link rel="stylesheet" href="css/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>    
    </head>
    <body>
    <?php $verificado = verificarPedidos(); ?>
        <div class="container backg">
            <script src="js/js.js"></script>
            <div class="d-flex justify-content-center header">
                <h2>Seleccione el cliente</h2>
                <button type="button" class="btn btn-primary btn-cliente" data-toggle="collapse" data-target="#collapse_nCliente" aria-expanded="false" aria-controls="collapse_nCliente">Nuevo Cliente</button>
                
                <div class="collapse" id="collapse_nCliente">
                    <div class="card card-body nCliente">
                        <div class="form-group">
                            <label for="NombreCliente">Nombre: </label>
                            <input type="text" class="form-control" id="NombreCliente" aria-describedby="emailHelp" placeholder="Ingrese el nombre del cliente">
                        </div>
                        <button class="btn btn-primary" id="agregarCliente" onclick="agregarCliente()">Agregar</button>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center header">
                <div class="col-8 justify-content-end">
                    <select id="clients" name="clients_list" form="clients_list" class="form-control selectpicker" data-live-search="true">
                        <option disabled selected value> -- </option>
                        <?php
                        
                        $clientes = obtenerClientes();
                        foreach($clientes as $id => $cliente){
                            if($cliente["completado"] == 0){
                                echo '<option data-tokens="'.$cliente["nombre"].'" id="sin_'.$id.'" value="'.$id.'">&#10006;&nbsp;&nbsp;'.$cliente["nombre"].'</option>';
                            } else {
                                echo '<option data-tokens="'.$cliente["nombre"].'" id="completado_'.$id.'" value="'.$id.'">&#10004;&nbsp;&nbsp;'.$cliente["nombre"].'</option>';//completado
                            }
                        }
                        ?>
                    </select>
                    <script type="text/javascript">
                        $('#clients').change(function(){ 
                            var idOption = $( "#clients option:selected" ).attr('id');
                            var separador = idOption.search("_");
                            var status = idOption.substring(0, separador);
                            var idCliente = idOption.substring(separador+1);
                            if(status == "sin"){
                                $("#btnSubmit").text("Agregar Pedido");
                                $("#clients_list").attr("action","views/seleccion_cliente.php");                                
                            } else {
                                $("#btnSubmit").text("Editar Pedido");
                                $("#clients_list").attr("action","views/editar_pedido.php");
                            }
                        });
                    </script>
                </div>
                <div class="col-2 justify-content-start">
                    <form action="views/seleccion_cliente.php" method="post" id="clients_list">
                        <button id="btnSubmit" type="button" class="btn btn-success" type="submit" value="Submit" onclick="agregarPedido()">Agregar Pedido</button>
                    </form>
                </div>
                       
            </div>
            <p class="d-flex justify-content-end">Fecha: <?php echo getActualDate(); ?></p>
            <?php if($verificado){ ?>
                <div class="d-flex justify-content-center">
                    <h3 class="pedidos_tittle">Pedidos realizados hoy</h3>
                </div>
                <div class="d-flex justify-content-center" style="margin-bottom: 20px;">
                    <button id="btnDownload" type="button" class="btn btn-warning">Descargar Reportes</button>
                </div>
                
                <div id="tablasClientes">
                    <?php echo mostrarPedidos(getActualDate()); ?>
                </div>
                <hr>
                <div id="tablaTotales">
                    <?php echo TotalProductos(getActualDate()); ?>
                </div>


                <script>
                    //doc.addPage();
                    $(function() {
                        $("#btnDownload").click(function() {

                            var doc = new jsPDF('l', 'mm', 'a4');
                            html2canvas($("#page_1"), {
                                onrendered: function(canvas) {
                                    var pag = 1;
                                    var pag2 = pag + 1;
                                    var imgData = canvas.toDataURL('image/png');
                                    var imgProps = doc.getImageProperties(imgData);
                                    var width = doc.internal.pageSize.getWidth() - 20;
                                    var height = (imgProps.height * width) / imgProps.width;
                                    if(height <= 190){
                                        doc.addImage(imgData, 'PNG', 10, 10, width, height);
                                        if(!$('#page_'+pag2.toString()).length){
                                            doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                        }
                                    } else {
                                        doc.addImage(imgData, 'PNG', 10, 10, width, 190);
                                        if(!$('#page_'+pag2.toString()).length){
                                            doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                        }
                                    }

                                    pag = pag + 1;
                                    pag2 = pag + 1;
                                    if($('#page_'+pag.toString()).length){
                                        doc.addPage();
                                        html2canvas($("#page_"+pag.toString()), {
                                            onrendered: function(canvas) {
                                                imgData = canvas.toDataURL('image/png');              
                                                imgProps= doc.getImageProperties(imgData);
                                                width = doc.internal.pageSize.getWidth() - 20;
                                                height = (imgProps.height * width) / imgProps.width;
                                                if(height <= 190){
                                                    doc.addImage(imgData, 'PNG', 10, 10, width, height);
                                                    if(!$('#page_'+pag2.toString()).length){
                                                        doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                    }
                                                } else {
                                                    doc.addImage(imgData, 'PNG', 10, 10, width, 190);
                                                    if(!$('#page_'+pag2.toString()).length){
                                                        doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                    }
                                                }
                                                pag = pag + 1;
                                                pag2 = pag + 1;
                                                if($('#page_'+pag.toString()).length){
                                                    doc.addPage();
                                                    html2canvas($("#page_"+pag.toString()), {
                                                        onrendered: function(canvas) {
                                                            imgData = canvas.toDataURL('image/png');              
                                                            imgProps= doc.getImageProperties(imgData);
                                                            width = doc.internal.pageSize.getWidth() - 20;
                                                            height = (imgProps.height * width) / imgProps.width;
                                                            if(height <= 190){
                                                                doc.addImage(imgData, 'PNG', 10, 10, width, height);
                                                                if(!$('#page_'+pag2.toString()).length){
                                                                    doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                }
                                                            } else {
                                                                doc.addImage(imgData, 'PNG', 10, 10, width, 190);
                                                                if(!$('#page_'+pag2.toString()).length){
                                                                    doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                }
                                                            }
                                                            pag = pag + 1;
                                                            pag2 = pag + 1;
                                                            if($('#page_'+pag.toString()).length){
                                                                doc.addPage();
                                                                html2canvas($("#page_"+pag.toString()), {
                                                                    onrendered: function(canvas) {
                                                                        imgData = canvas.toDataURL('image/png');              
                                                                        imgProps= doc.getImageProperties(imgData);
                                                                        width = doc.internal.pageSize.getWidth() - 20;
                                                                        height = (imgProps.height * width) / imgProps.width;
                                                                        if(height <= 190){
                                                                            doc.addImage(imgData, 'PNG', 10, 10, width, height);
                                                                            if(!$('#page_'+pag2.toString()).length){
                                                                                doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                            }
                                                                        } else {
                                                                            doc.addImage(imgData, 'PNG', 10, 10, width, 190);
                                                                            if(!$('#page_'+pag2.toString()).length){
                                                                                doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                            }
                                                                        }
                                                                        pag = pag + 1;
                                                                        pag2 = pag + 1;
                                                                        if($('#page_'+pag.toString()).length){
                                                                            doc.addPage();
                                                                            html2canvas($("#page_"+pag.toString()), {
                                                                                onrendered: function(canvas) {
                                                                                    imgData = canvas.toDataURL('image/png');              
                                                                                    imgProps= doc.getImageProperties(imgData);
                                                                                    width = doc.internal.pageSize.getWidth() - 20;
                                                                                    height = (imgProps.height * width) / imgProps.width;
                                                                                    if(height <= 190){
                                                                                        doc.addImage(imgData, 'PNG', 10, 10, width, height);
                                                                                        if(!$('#page_'+pag2.toString()).length){
                                                                                            doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                                        }
                                                                                    } else {
                                                                                        doc.addImage(imgData, 'PNG', 10, 10, width, 190);
                                                                                        if(!$('#page_'+pag2.toString()).length){
                                                                                            doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                                        }
                                                                                    }
                                                                                    pag = pag + 1;
                                                                                    pag2 = pag + 1;
                                                                                    if($('#page_'+pag.toString()).length){
                                                                                        doc.addPage();
                                                                                        html2canvas($("#page_"+pag.toString()), {
                                                                                            onrendered: function(canvas) {
                                                                                                imgData = canvas.toDataURL('image/png');              
                                                                                                imgProps= doc.getImageProperties(imgData);
                                                                                                width = doc.internal.pageSize.getWidth() - 20;
                                                                                                height = (imgProps.height * width) / imgProps.width;
                                                                                                if(height <= 190){
                                                                                                    doc.addImage(imgData, 'PNG', 10, 10, width, height);
                                                                                                    if(!$('#page_'+pag2.toString()).length){
                                                                                                        doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                                                    }
                                                                                                } else {
                                                                                                    doc.addImage(imgData, 'PNG', 10, 10, width, 190);
                                                                                                    if(!$('#page_'+pag2.toString()).length){
                                                                                                        doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                                                    }
                                                                                                }
                                                                                                pag = pag + 1;
                                                                                                pag2 = pag + 1;
                                                                                                if($('#page_'+pag.toString()).length){
                                                                                                    doc.addPage();
                                                                                                    html2canvas($("#page_"+pag.toString()), {
                                                                                                        onrendered: function(canvas) {
                                                                                                            imgData = canvas.toDataURL('image/png');              
                                                                                                            imgProps= doc.getImageProperties(imgData);
                                                                                                            width = doc.internal.pageSize.getWidth() - 20;
                                                                                                            height = (imgProps.height * width) / imgProps.width;
                                                                                                            if(height <= 190){
                                                                                                                doc.addImage(imgData, 'PNG', 10, 10, width, height);
                                                                                                                if(!$('#page_'+pag2.toString()).length){
                                                                                                                    doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                                                                }
                                                                                                            } else {
                                                                                                                doc.addImage(imgData, 'PNG', 10, 10, width, 190);
                                                                                                                if(!$('#page_'+pag2.toString()).length){
                                                                                                                    doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                                                                }
                                                                                                            }
                                                                                                            pag = pag + 1;
                                                                                                            pag2 = pag + 1;
                                                                                                            if($('#page_'+pag.toString()).length){
                                                                                                                doc.addPage();
                                                                                                                html2canvas($("#page_"+pag.toString()), {
                                                                                                                    onrendered: function(canvas) {
                                                                                                                        imgData = canvas.toDataURL('image/png');              
                                                                                                                        imgProps= doc.getImageProperties(imgData);
                                                                                                                        width = doc.internal.pageSize.getWidth() - 20;
                                                                                                                        height = (imgProps.height * width) / imgProps.width;
                                                                                                                        if(height <= 190){
                                                                                                                            doc.addImage(imgData, 'PNG', 10, 10, width, height);
                                                                                                                            if(!$('#page_'+pag2.toString()).length){
                                                                                                                                doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                                                                            }
                                                                                                                        } else {
                                                                                                                            doc.addImage(imgData, 'PNG', 10, 10, width, 190);
                                                                                                                            if(!$('#page_'+pag2.toString()).length){
                                                                                                                                doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                                                                            }
                                                                                                                        }
                                                                                                                        pag = pag + 1;
                                                                                                                        pag2 = pag + 1;
                                                                                                                        if($('#page_'+pag.toString()).length){
                                                                                                                            doc.addPage();
                                                                                                                            html2canvas($("#page_"+pag.toString()), {
                                                                                                                                onrendered: function(canvas) {
                                                                                                                                    imgData = canvas.toDataURL('image/png');              
                                                                                                                                    imgProps= doc.getImageProperties(imgData);
                                                                                                                                    width = doc.internal.pageSize.getWidth() - 20;
                                                                                                                                    height = (imgProps.height * width) / imgProps.width;
                                                                                                                                    if(height <= 190){
                                                                                                                                        doc.addImage(imgData, 'PNG', 10, 10, width, height);
                                                                                                                                        if(!$('#page_'+pag2.toString()).length){
                                                                                                                                            doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                                                                                        }
                                                                                                                                    } else {
                                                                                                                                        doc.addImage(imgData, 'PNG', 10, 10, width, 190);
                                                                                                                                        if(!$('#page_'+pag2.toString()).length){
                                                                                                                                            doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            });
                                                                                                                        } 
                                                                                                                    }
                                                                                                                });
                                                                                                            } 
                                                                                                        }
                                                                                                    });
                                                                                                } 
                                                                                            }
                                                                                        });
                                                                                    } 
                                                                                }
                                                                            });
                                                                        } 
                                                                    }
                                                                });
                                                            } 
                                                        }
                                                    });
                                                } 
                                            }
                                        });
                                    }                                          
                                }
                            });
                            
                            
                            
                            
                            
                            /*html2canvas($("#tablasClientes"), {
                                onrendered: function(canvas) {
                                    var imgData = canvas.toDataURL(
                                        'image/png');              
                                    var doc = new jsPDF('l', 'mm', 'a4');
                                    var imgProps= doc.getImageProperties(imgData);
                                    var width = doc.internal.pageSize.getWidth() - 20;
                                    var height = (imgProps.height * width) / imgProps.width;
                                    if(height <= 190){
                                        doc.addImage(imgData, 'PNG', 10, 10, width, height);
                                        doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                    } else {
                                        doc.addImage(imgData, 'PNG', 10, 10, width, 190);
                                        doc.save('<?php echo getActualDate(); ?>_Pedidos.pdf');
                                    }
                                }
                            });*/

                            html2canvas($("#tablaTotales"), {
                                onrendered: function(canvas) {
                                    var imgData = canvas.toDataURL('image/png');              
                                    var doc = new jsPDF('p', 'mm', 'a4');
                                    var imgProps= doc.getImageProperties(imgData);
                                    var width = doc.internal.pageSize.getWidth() - 20;
                                    var height = (imgProps.height * width) / imgProps.width;
                                    if(height <= 275){
                                        doc.addImage(imgData, 'PNG', 10, 10, width, height);
                                        doc.save('<?php echo getActualDate(); ?>_Totales.pdf');
                                    } else {
                                        doc.addImage(imgData, 'PNG', 10, 10, width, 275);
                                        doc.save('<?php echo getActualDate(); ?>_Totales.pdf');
                                    }
                                }
                            });
                        });

                        function saveAs(uri, filename) {
                            var link = document.createElement('a');
                            if (typeof link.download === 'string') {
                            link.href = uri;
                            link.download = filename;

                            //Firefox requires the link to be in the body
                            document.body.appendChild(link);

                            //simulate click
                            link.click();

                            //remove the link when done
                            document.body.removeChild(link);
                            } else {
                            window.open(uri);
                            }
                        }
                    });
                </script>

            <?php } ?>
            
        </div>
    </body>
</html>


<?php
    function obtenerClientes(){
        $servername = "testmysqlpedidosray.mysql.database.azure.com";
        $username = "pedidosray";
        $password = ".,05zaxscdvf";
        $dbname = "id16779907_db2";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $acentos = $conn->query("SET NAMES 'utf8'");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if ($result = $conn -> query("SELECT id_cliente, nombre, completado FROM cliente ORDER BY nombre ASC")) {
            while($obj = $result->fetch_object()){
                $nombres[$obj->id_cliente] = array("nombre" => $obj->nombre, "completado" =>  $obj->completado);
            }
        } 
        
        $conn->close();

        return $nombres;
    }

    function getActualDate(){
        $date = new DateTime(date('d-M-Y H:i:s'));
        $date->setTimezone(new DateTimeZone("America/Costa_Rica"));


        return strval($date->format('d-M-Y'));
    }

    function verificarPedidos(){
        $servername = "testmysqlpedidosray.mysql.database.azure.com";
        $username = "pedidosray";
        $password = ".,05zaxscdvf";
        $dbname = "id16779907_db2";
        $existen = false;
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $acentos = $conn->query("SET NAMES 'utf8'");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $result = $conn -> query('SELECT COUNT(*) as cantFecha FROM pedido WHERE fecha = "'.getActualDate().'"');
        $pedidos_completados = mysqli_num_rows($conn -> query('SELECT id_cliente FROM cliente WHERE completado = 1'));
        if ($result && $pedidos_completados > 0) {
            while($obj = $result->fetch_object()){
                if($obj->cantFecha > 0){
                    $existen = true;
                } else {
                    if($conn->query('UPDATE cliente SET completado = 0 WHERE 1')){
                        $existen = false;
                    }
                }
            }
        }
        
        $conn->close();

        return $existen;
    }

    function mostrarPedidos($fecha){
        $servername = "testmysqlpedidosray.mysql.database.azure.com";
        $username = "pedidosray";
        $password = ".,05zaxscdvf";
        $dbname = "id16779907_db2";

        $rows = "";
        $cliente_pedido = array();
        $producto_slug_nombre = array();
        $cliente_id_nombre = array();

        $conn = new mysqli($servername, $username, $password, $dbname);
        $acentos = $conn->query("SET NAMES 'utf8'");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if ($result = $conn -> query('SELECT id_pedido, fk_cliente, fecha FROM pedido WHERE fecha = "'.$fecha.'"')) {
            while($obj = $result->fetch_object()){
                $cliente_pedido[$obj->fk_cliente] = $obj->id_pedido;
            }
        } 

        if ($result = $conn -> query('SELECT slug, nombre FROM producto WHERE 1')) {
            while($obj = $result->fetch_object()){
                $producto_slug_nombre[$obj->slug] = $obj->nombre;
            }
        } 

        if ($result = $conn -> query('SELECT id_cliente, nombre FROM cliente WHERE 1')) {
            while($obj = $result->fetch_object()){
                $cliente_id_nombre[$obj->id_cliente] = $obj->nombre;
            }
        } 

        $cont = 1;
        $n_pedido = 1;
        $page = 1;
        $divs_rows = 1;
        $fin_3ra_fila = true;
        $n_pedidos_totales = count($cliente_pedido);
        foreach($cliente_pedido as $idCliente => $id_pedido){
            if($cont == 1){
                if($fin_3ra_fila){
                    $rows .= '<div class="downloadList" id="page_'.$page.'">';
                    $fin_3ra_fila = false;
                }
                $rows .= '<div class="row"><div class="col tabla_cliente"><h4 class="align_center tittle_color">'.$cliente_id_nombre[$idCliente].'</h4><table class="table"><thead><tr><th scope="col">Producto</th><th scope="col" class="align_end">Cantidad</th></tr></thead><tbody>';
                if ($result = $conn -> query('SELECT slug_producto, cantidad FROM detalle WHERE fk_pedido = '.$id_pedido)) {
                    while($obj = $result->fetch_object()){
                        $rows .= '<tr><td>'.$producto_slug_nombre[$obj->slug_producto].'</td><th scope="row" class="align_end">'.$obj->cantidad.'</th></tr>';
                    }
                }
                $rows .= '</tbody></table></div>';

                if($n_pedido == $n_pedidos_totales){
                    $rows .= '</div></div>';
                }
            }

            if($cont == 2){
                $rows .= '<div class="col tabla_cliente"><h4 class="align_center tittle_color">'.$cliente_id_nombre[$idCliente].'</h4><table class="table"><thead><tr><th scope="col">Producto</th><th scope="col" class="align_end">Cantidad</th></tr></thead><tbody>';
                if ($result = $conn -> query('SELECT slug_producto, cantidad FROM detalle WHERE fk_pedido = '.$id_pedido)) {
                    while($obj = $result->fetch_object()){
                        $rows .= '<tr><td>'.$producto_slug_nombre[$obj->slug_producto].'</td><th scope="row" class="align_end">'.$obj->cantidad.'</th></tr>';
                    }
                }
                $rows .= '</tbody></table></div>';

                if($n_pedido == $n_pedidos_totales){
                    $rows .= '</div></div>';
                }
            }  
            
            if($cont == 3){
                $rows .= '<div class="col tabla_cliente"><h4 class="align_center tittle_color">'.$cliente_id_nombre[$idCliente].'</h4><table class="table"><thead><tr><th scope="col">Producto</th><th scope="col" class="align_end">Cantidad</th></tr></thead><tbody>';
                if ($result = $conn -> query('SELECT slug_producto, cantidad FROM detalle WHERE fk_pedido = '.$id_pedido)) {
                    while($obj = $result->fetch_object()){
                        $rows .= '<tr><td>'.$producto_slug_nombre[$obj->slug_producto].'</td><th scope="row" class="align_end">'.$obj->cantidad.'</th></tr>';
                    }
                }
                $rows .= '</tbody></table></div></div>';

                

                if($divs_rows == 3){
                    $rows .= '</div>';
                    $fin_3ra_fila = true;
                    $page += 1;
                    $divs_rows = 0;
                } else if($n_pedido == $n_pedidos_totales){
                    $rows .= '</div>';
                }
                
                $divs_rows += 1;
                $cont = 0; 
            }

            $cont += 1; 
            $n_pedido += 1; 
            
            
        }
        $conn->close();

        return $rows;        
    }

    function TotalProductos($fecha){
        $servername = "testmysqlpedidosray.mysql.database.azure.com";
        $username = "pedidosray";
        $password = ".,05zaxscdvf";
        $dbname = "id16779907_db2";

        $rows = "";
        $producto_slug_nombre = array();
        $producto_cantidad = array();

        $conn = new mysqli($servername, $username, $password, $dbname);
        $acentos = $conn->query("SET NAMES 'utf8'");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        

        if ($result = $conn -> query('SELECT slug, nombre FROM producto WHERE 1')) {
            while($obj = $result->fetch_object()){
                $producto_slug_nombre[$obj->slug] = $obj->nombre;
            }
        } 
        if ($result = $conn -> query('SELECT prod.nombre, d.slug_producto, SUM(d.cantidad) as cantidad FROM cliente c INNER JOIN pedido p ON p.fk_cliente = c.id_cliente INNER JOIN detalle d ON d.fk_pedido = p.id_pedido INNER JOIN producto prod ON prod.slug = d.slug_producto WHERE p.fecha = "'.getActualDate().'" GROUP BY prod.nombre, d.slug_producto ORDER BY prod.nombre ASC')) {
            while($obj = $result->fetch_object()){
                $producto_cantidad[$obj->slug_producto] = $obj->cantidad;
            }
        }
        $conn->close();
        $cant_productos = count($producto_cantidad);
        $mitad = round($cant_productos/2);
        $c1 = 1;
        
        $rows .= '<h4 class="align_center">Total de productos</h4><div class="row" id="totals">';  

        foreach($producto_cantidad as $slug_prod => $cantidad){ 
            if($c1 == 1 || $c1 == $mitad+1){
                $rows .= '<div class="col tabla_totales"><table class="table large_font"><thead><tr><th scope="col">Producto</th><th scope="col" class="align_end">Cantidad</th></tr></thead><tbody>';
            }
            $rows .= '<tr><td class="tot">'.$producto_slug_nombre[$slug_prod].'</td><th scope="row" class="align_end tot">'.$cantidad.'</th></tr>';
            if($c1 == $mitad || $c1 == $cant_productos){
                $rows .= '</tbody></table></div>';
            }
            $c1 += 1;
        }

        $rows .= '</div>';       

        return $rows;        
    }
?>

