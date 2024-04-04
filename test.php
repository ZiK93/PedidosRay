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
        <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"> 
        <script src= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"> </script> 
        <script> 
            $(function () { 
                $("#datepicker").datepicker({  
                    autoclose: true,  
                    todayHighlight: true
                }).datepicker('update', new Date()); 
            }); 
        </script> 


        <link rel="stylesheet" href="css/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>    
    </head>
<body>

<button type="button" class="btn btn-primary btn-historial" data-toggle="collapse" data-target="#collapse_historial" aria-expanded="false" aria-controls="collapse_historial">Historial pedido</button>
                <div class="collapse" id="collapse_historial">
                    <div class="card card-body nCliente">
                        <div class="form-group">
                            <form action="views/test_view.php" method="POST" id="buscar_pedido">
                                <label for="NombreCliente">Fecha: </label>
                                <div id="datepicker" class="input-group date container col" data-date-format="d-M-yyyy"> 
                                    <input name="buscar_pedido" form="buscar_pedido" class="form-control" type="text" readonly id="fechapedido"/> 
                                    <span class="input-group-addon inline" style="display: block;"> 
                                        <i class="glyphicon glyphicon-calendar"></i> 
                                    </span>
                                </div>
                            
                        
                                <input value="Buscar" class="btn btn-primary" style="width: -webkit-fill-available;margin-top: 15px;" type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

</body>
</html>