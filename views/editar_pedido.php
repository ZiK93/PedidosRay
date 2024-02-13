<html>
    <head>
        <title>Editar Pedido</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/style.css">
        
    </head>
    <body>
        <?php
            $datos_cliente = GetDataCliente();
            $productos = getProductosPedido($datos_cliente["id_cliente"]);
        ?>
            <script src="/js/js.js"></script>
            <div class="d-flex justify-content-center header">
                <h2>Editando pedido de <?php echo $datos_cliente["nombre"]; ?></h2>
            </div>
            <form action="/controller/procesar_pedido_editado.php" method="post" id="products_list">
                <div class="container">
                    <div class="row tablaProductos">
                        <div class="col-sm bordeColumnas">
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="crema_40_grasa" name="crema_40_grasa" value="<?php if(isset($productos["crema_40_grasa"])){echo $productos["crema_40_grasa"];} else {echo "0";} ?>">
                                <label for="crema_40_grasa">Crema 40% grasa</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="crema_15kg" name="crema_15kg" value="<?php if(isset($productos["crema_15kg"])){echo $productos["crema_15kg"];} else {echo "0";} ?>">
                                <label for="crema_15kg">Crema 40% bolsa 15kg</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="crema_70_75" name="crema_70_75" value="<?php if(isset($productos["crema_70_75"])){echo $productos["crema_70_75"];} else {echo "0";} ?>">
                                <label for="crema_70_75">Crema 70-75% grasa</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="crema_litro" name="crema_litro" value="<?php if(isset($productos["crema_litro"])){echo $productos["crema_litro"];} else {echo "0";} ?>">
                                <label for="crema_litro">Crema litro 40%</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="crema_dulce_galon" name="crema_dulce_galon" value="<?php if(isset($productos["crema_dulce_galon"])){echo $productos["crema_dulce_galon"];} else {echo "0";} ?>">
                                <label for="crema_dulce_galon">Crema dulce galon 3.8</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semi_mantequilla_nosal" name="semi_mantequilla_nosal" value="<?php if(isset($productos["semi_mantequilla_nosal"])){echo $productos["semi_mantequilla_nosal"];} else {echo "0";} ?>">
                                <label for="semi_mantequilla_nosal">Mantequilla 1KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="mantequilla1kgconsal" name="mantequilla1kgconsal" value="<?php if(isset($productos["mantequilla1kgconsal"])){echo $productos["mantequilla1kgconsal"];} else {echo "0";} ?>">
                                <label for="mantequilla1kgconsal">Mantequilla de 1KG con sal</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_especial" name="semiduro_especial" value="<?php if(isset($productos["semiduro_especial"])){echo $productos["semiduro_especial"];} else {echo "0";} ?>">
                                <label for="semiduro_especial">Semiduro Especial</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_corriente" name="semiduro_corriente" value="<?php if(isset($productos["semiduro_corriente"])){echo $productos["semiduro_corriente"];} else {echo "0";} ?>">
                                <label for="semiduro_corriente">Semiduro Block</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_1KG_grapado" name="semiduro_1KG_grapado" value="<?php if(isset($productos["semiduro_1KG_grapado"])){echo $productos["semiduro_1KG_grapado"];} else {echo "0";} ?>">
                                <label for="semiduro_1KG_grapado">Queso Semiduro 1KG Grapado</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_1KG_vacio" name="semiduro_1KG_vacio" value="<?php if(isset($productos["semiduro_1KG_vacio"])){echo $productos["semiduro_1KG_vacio"];} else {echo "0";} ?>">
                                <label for="semiduro_1KG_vacio">Semiduro Block 1KG Al Vacio</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_500g_grapado" name="semiduro_500g_grapado" value="<?php if(isset($productos["semiduro_500g_grapado"])){echo $productos["semiduro_500g_grapado"];} else {echo "0";} ?>">
                                <label for="semiduro_500g_grapado">Queso Semiduro 500g Grapado</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_segundo" name="semiduro_segundo" value="<?php if(isset($productos["semiduro_segundo"])){echo $productos["semiduro_segundo"];} else {echo "0";} ?>">
                                <label for="semiduro_segundo">Semiduro Segundo</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_350g_Alun" name="semiduro_350g_Alun" value="<?php if(isset($productos["semiduro_350g_Alun"])){echo $productos["semiduro_350g_Alun"];} else {echo "0";} ?>">
                                <label for="semiduro_350g_Alun">Queso Semiduro 350g (Alun)</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_400g_vacio" name="semiduro_400g_vacio" value="<?php if(isset($productos["semiduro_400g_vacio"])){echo $productos["semiduro_400g_vacio"];} else {echo "0";} ?>">
                                <label for="semiduro_400g_vacio">Queso Semiduro 400g vacio</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_500g_vacio" name="semiduro_500g_vacio" value="<?php if(isset($productos["semiduro_500g_vacio"])){echo $productos["semiduro_500g_vacio"];} else {echo "0";} ?>">
                                <label for="semiduro_500g_vacio">Queso Semiduro 500g vacio</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="poroso_blanco_500g" name="poroso_blanco_500g" value="<?php if(isset($productos["poroso_blanco_500g"])){echo $productos["poroso_blanco_500g"];} else {echo "0";} ?>">
                                <label for="poroso_blanco_500g">Poroso Blanco 500g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="poroso_blanco_1kg" name="poroso_blanco_1kg" value="<?php if(isset($productos["poroso_blanco_1kg"])){echo $productos["poroso_blanco_1kg"];} else {echo "0";} ?>">
                                <label for="poroso_blanco_1kg">Poroso Blanco 1KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_huecos_1KG" name="semiduro_huecos_1KG" value="<?php if(isset($productos["semiduro_huecos_1KG"])){echo $productos["semiduro_huecos_1KG"];} else {echo "0";} ?>">
                                <label for="semiduro_huecos_1KG">Queso semiduro con huecos 1KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_huecos_450g" name="semiduro_huecos_450g" value="<?php if(isset($productos["semiduro_huecos_450g"])){echo $productos["semiduro_huecos_450g"];} else {echo "0";} ?>">
                                <label for="semiduro_huecos_450g">Queso semiduro con huecos 450g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_huecos_500" name="semiduro_huecos_500" value="<?php if(isset($productos["semiduro_huecos_500"])){echo $productos["semiduro_huecos_500"];} else {echo "0";} ?>">
                                <label for="semiduro_huecos_500">Semiduro con huecos 500g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="semiduro_huecos_250g" name="semiduro_huecos_250g" value="<?php if(isset($productos["semiduro_huecos_250g"])){echo $productos["semiduro_huecos_250g"];} else {echo "0";} ?>">
                                <label for="semiduro_huecos_250g">Queso semiduro con huecos 250g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="granel_block" name="granel_block" value="<?php if(isset($productos["granel_block"])){echo $productos["granel_block"];} else {echo "0";} ?>">
                                <label for="granel_block">Block Semiduro Con Huecos</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="barrasemiduro" name="barrasemiduro" value="<?php if(isset($productos["barrasemiduro"])){echo $productos["barrasemiduro"];} else {echo "0";} ?>">
                                <label for="barrasemiduro">Barra de Semiduro</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="tierno" name="tierno" value="<?php if(isset($productos["tierno"])){echo $productos["tierno"];} else {echo "0";} ?>">
                                <label for="tierno">Tierno Block</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="tierno_1kg_grapado" name="tierno_1kg_grapado" value="<?php if(isset($productos["tierno_1kg_grapado"])){echo $productos["tierno_1kg_grapado"];} else {echo "0";} ?>">
                                <label for="tierno_1kg_grapado">Tierno 1KG grapado</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="tierno_1kg_vacio" name="tierno_1kg_vacio" value="<?php if(isset($productos["tierno_1kg_vacio"])){echo $productos["tierno_1kg_vacio"];} else {echo "0";} ?>">
                                <label for="tierno_1kg_vacio">Tierno 1KG al vacio</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="tierno_1_5_vacio" name="tierno_1_5_vacio" value="<?php if(isset($productos["tierno_1_5_vacio"])){echo $productos["tierno_1_5_vacio"];} else {echo "0";} ?>">
                                <label for="tierno_1_5_vacio">Tierno 1.5K al vacio</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="tierno_500g_grapado" name="tierno_500g_grapado" value="<?php if(isset($productos["tierno_500g_grapado"])){echo $productos["tierno_500g_grapado"];} else {echo "0";} ?>">
                                <label for="tierno_500g_grapado">Tierno 500g grapado</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="tierno_300g_suave" name="tierno_300g_suave" value="<?php if(isset($productos["tierno_300g_suave"])){echo $productos["tierno_300g_suave"];} else {echo "0";} ?>">
                                <label for="tierno_300g_suave">Tierno 300g suave</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="tierno_400g_vacio" name="tierno_400g_vacio" value="<?php if(isset($productos["tierno_400g_vacio"])){echo $productos["tierno_400g_vacio"];} else {echo "0";} ?>">
                                <label for="tierno_400g_vacio">Tierno 400g al vacio</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="tierno_500g_vacio" name="tierno_500g_vacio" value="<?php if(isset($productos["tierno_500g_vacio"])){echo $productos["tierno_500g_vacio"];} else {echo "0";} ?>">
                                <label for="tierno_500g_vacio">Tierno 500g al vacio</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="fresco_barra" name="fresco_barra" value="<?php if(isset($productos["fresco_barra"])){echo $productos["fresco_barra"];} else {echo "0";} ?>">
                                <label for="fresco_barra">Barra Fresco</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="fresco_1KG_vacio" name="fresco_1KG_vacio" value="<?php if(isset($productos["fresco_1KG_vacio"])){echo $productos["fresco_1KG_vacio"];} else {echo "0";} ?>">
                                <label for="fresco_1KG_vacio">Queso Fresco 1KG al vacio</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="fresco_500g" name="fresco_500g" value="<?php if(isset($productos["fresco_500g"])){echo $productos["fresco_500g"];} else {echo "0";} ?>">
                                <label for="fresco_500g">Fresco 500g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="fresco_250g" name="fresco_250g" value="<?php if(isset($productos["fresco_250g"])){echo $productos["fresco_250g"];} else {echo "0";} ?>">
                                <label for="fresco_250g">Fresco 250g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="fresco_500g_grapado" name="fresco_500g_grapado" value="<?php if(isset($productos["fresco_500g_grapado"])){echo $productos["fresco_500g_grapado"];} else {echo "0";} ?>">
                                <label for="fresco_500g_grapado">Fresco 500g grapado</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="fresco_rebanado_2kg" name="fresco_rebanado_2kg" value="<?php if(isset($productos["fresco_rebanado_2kg"])){echo $productos["fresco_rebanado_2kg"];} else {echo "0";} ?>">
                                <label for="fresco_rebanado_2kg">Fresco rebanado 2KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="fresco_rebanado_1kg" name="fresco_rebanado_1kg" value="<?php if(isset($productos["fresco_rebanado_1kg"])){echo $productos["fresco_rebanado_1kg"];} else {echo "0";} ?>">
                                <label for="fresco_rebanado_1kg">Fresco rebanado 1KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="fresco_rebanado_350g" name="fresco_rebanado_350g" value="<?php if(isset($productos["fresco_rebanado_350g"])){echo $productos["fresco_rebanado_350g"];} else {echo "0";} ?>">
                                <label for="fresco_rebanado_350g">Fresco rebanado 350g</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="mozarella_500g_vacio" name="mozarella_500g_vacio" value="<?php if(isset($productos["mozarella_500g_vacio"])){echo $productos["mozarella_500g_vacio"];} else {echo "0";} ?>">
                                <label for="mozarella_500g_vacio">Queso Mozarella 500g al vacio</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="mozarella_rallado_250g" name="mozarella_rallado_250g" value="<?php if(isset($productos["mozarella_rallado_250g"])){echo $productos["mozarella_rallado_250g"];} else {echo "0";} ?>">
                                <label for="mozarella_rallado_250g">Queso Mozarella Rallado 250g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="mozarella_rebanado_350g" name="mozarella_rebanado_350g" value="<?php if(isset($productos["mozarella_rebanado_350g"])){echo $productos["mozarella_rebanado_350g"];} else {echo "0";} ?>">
                                <label for="mozarella_rebanado_350g">Mozarella de 350g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="mozarella_500gg" name="mozarella_500gg" value="<?php if(isset($productos["mozarella_500gg"])){echo $productos["mozarella_500gg"];} else {echo "0";} ?>">
                                <label for="mozarella_500gg">Mozzarella de 500g Rayado</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="especial_rebanado_2kg" name="especial_rebanado_2kg" value="<?php if(isset($productos["especial_rebanado_2kg"])){echo $productos["especial_rebanado_2kg"];} else {echo "0";} ?>">
                                <label for="especial_rebanado_2kg">Especial Rebanado 2KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="especial_rebanado_1kg" name="especial_rebanado_1kg" value="<?php if(isset($productos["especial_rebanado_1kg"])){echo $productos["especial_rebanado_1kg"];} else {echo "0";} ?>">
                                <label for="especial_rebanado_1kg">Especial Rebanado 1KG</label>
                            </div>                      
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="especial_barra" name="especial_barra" value="<?php if(isset($productos["especial_barra"])){echo $productos["especial_barra"];} else {echo "0";} ?>">
                                <label for="especial_barra">Especial Barra</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="especial_rallada_1y5kg" name="especial_rallada_1y5kg" value="<?php if(isset($productos["especial_rallada_1y5kg"])){echo $productos["especial_rallada_1y5kg"];} else {echo "0";} ?>">
                                <label for="especial_rallada_1y5kg">Especial Rallada 1.5KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="mozarella_250g_block" name="mozarella_250g_block" value="<?php if(isset($productos["mozarella_250g_block"])){echo $productos["mozarella_250g_block"];} else {echo "0";} ?>">
                                <label for="mozarella_250g_block">Queso Mozarella 250g block</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="especial_block_de_1kg" name="especial_block_de_1kg" value="<?php if(isset($productos["especial_block_de_1kg"])){echo $productos["especial_block_de_1kg"];} else {echo "0";} ?>">
                                <label for="especial_block_de_1kg">Especial block de 1KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="especialrallado2k" name="especialrallado2k" value="<?php if(isset($productos["especialrallado2k"])){echo $productos["especialrallado2k"];} else {echo "0";} ?>">
                                <label for="especialrallado2k">Especial rallado 2 kilos</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="especial_rallada_2da" name="especial_rallada_2da" value="<?php if(isset($productos["especial_rallada_2da"])){echo $productos["especial_rallada_2da"];} else {echo "0";} ?>">
                                <label for="especial_rallada_2da">Especial Rallada de 2da</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="rayado_especial_250" name="rayado_especial_250" value="<?php if(isset($productos["rayado_especial_250"])){echo $productos["rayado_especial_250"];} else {echo "0";} ?>">
                                <label for="rayado_especial_250">Rayado Especial 250g</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="queso_5k" name="queso_5k" value="<?php if(isset($productos["queso_5k"])){echo $productos["queso_5k"];} else {echo "0";} ?>">
                                <label for="queso_5k">Queso Molido 5KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="queso_2k" name="queso_2k" value="<?php if(isset($productos["queso_2k"])){echo $productos["queso_2k"];} else {echo "0";} ?>">
                                <label for="queso_2k">Queso Molido 2KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="queso_100g" name="queso_100g" value="<?php if(isset($productos["queso_100g"])){echo $productos["queso_100g"];} else {echo "0";} ?>">
                                <label for="queso_100g">Queso Molido 100 g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="queso_200g" name="queso_200g" value="<?php if(isset($productos["queso_200g"])){echo $productos["queso_200g"];} else {echo "0";} ?>">
                                <label for="queso_200g">Queso Molido 200 g</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla_kg" name="natilla_kg" value="<?php if(isset($productos["natilla_kg"])){echo $productos["natilla_kg"];} else {echo "0";} ?>">
                                <label for="natilla_kg">Natilla 1K</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla_sal_kg" name="natilla_sal_kg" value="<?php if(isset($productos["natilla_sal_kg"])){echo $productos["natilla_sal_kg"];} else {echo "0";} ?>">
                                <label for="natilla_sal_kg">Natilla Con Sal 1KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="blanca_250_sin_sal" name="blanca_250_sin_sal" value="<?php if(isset($productos["blanca_250_sin_sal"])){echo $productos["blanca_250_sin_sal"];} else {echo "0";} ?>">
                                <label for="blanca_250_sin_sal">Natilla Blanca 250g sin sal</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="blanca_250_con_sal" name="blanca_250_con_sal" value="<?php if(isset($productos["blanca_250_con_sal"])){echo $productos["blanca_250_con_sal"];} else {echo "0";} ?>">
                                <label for="blanca_250_con_sal">Natilla Blanca 250g con sal</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla_250g_parque" name="natilla_250g_parque" value="<?php if(isset($productos["natilla_250g_parque"])){echo $productos["natilla_250g_parque"];} else {echo "0";} ?>">
                                <label for="natilla_250g_parque">Natilla 250g Parque</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="blanca_300g_sin_sal" name="blanca_300g_sin_sal" value="<?php if(isset($productos["blanca_300g_sin_sal"])){echo $productos["blanca_300g_sin_sal"];} else {echo "0";} ?>">
                                <label for="blanca_300g_sin_sal">Natilla Blanca 300g sin sal</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="blanca_300g_con_sal" name="blanca_300g_con_sal" value="<?php if(isset($productos["blanca_300g_con_sal"])){echo $productos["blanca_300g_con_sal"];} else {echo "0";} ?>">
                                <label for="blanca_300g_con_sal">Natilla Blanca 300g con sal</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla_300g_parque" name="natilla_300g_parque" value="<?php if(isset($productos["natilla_300g_parque"])){echo $productos["natilla_300g_parque"];} else {echo "0";} ?>">
                                <label for="natilla_300g_parque">Natilla 300g Parque</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="blanca_500g_sin_sal" name="blanca_500g_sin_sal" value="<?php if(isset($productos["blanca_500g_sin_sal"])){echo $productos["blanca_500g_sin_sal"];} else {echo "0";} ?>">
                                <label for="blanca_500g_sin_sal">Natilla Blanca 500g sin sal</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="blanca_500g_con_sal" name="blanca_500g_con_sal" value="<?php if(isset($productos["blanca_500g_con_sal"])){echo $productos["blanca_500g_con_sal"];} else {echo "0";} ?>">
                                <label for="blanca_500g_con_sal">Natilla Blanca 500g con sal</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla_500g_parque" name="natilla_500g_parque" value="<?php if(isset($productos["natilla_500g_parque"])){echo $productos["natilla_500g_parque"];} else {echo "0";} ?>">
                                <label for="natilla_500g_parque">Natilla 500g Parque</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla_lechera" name="natilla_lechera" value="<?php if(isset($productos["natilla_lechera"])){echo $productos["natilla_lechera"];} else {echo "0";} ?>">
                                <label for="natilla_lechera">Natilla Lechera (1.9ML)</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla_10kg" name="natilla_10kg" value="<?php if(isset($productos["natilla_10kg"])){echo $productos["natilla_10kg"];} else {echo "0";} ?>">
                                <label for="natilla_10kg">Natilla 10KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla_20kg" name="natilla_20kg" value="<?php if(isset($productos["natilla_20kg"])){echo $productos["natilla_20kg"];} else {echo "0";} ?>">
                                <label for="natilla_20kg">Natilla 20KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla_doypack" name="natilla_doypack" value="<?php if(isset($productos["natilla_doypack"])){echo $productos["natilla_doypack"];} else {echo "0";} ?>">
                                <label for="natilla_doypack">Natilla Doypack 450g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla_galon" name="natilla_galon" value="<?php if(isset($productos["natilla_galon"])){echo $productos["natilla_galon"];} else {echo "0";} ?>">
                                <label for="natilla_galon">Natilla Galón</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla100gsal" name="natilla100gsal" value="<?php if(isset($productos["natilla100gsal"])){echo $productos["natilla100gsal"];} else {echo "0";} ?>">
                                <label for="natilla100gsal">Natilla 100g con sal</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natillagalonconsal" name="natillagalonconsal" value="<?php if(isset($productos["natillagalonconsal"])){echo $productos["natillagalonconsal"];} else {echo "0";} ?>">
                                <label for="natillagalonconsal">Natilla Galon con sal</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="natilla100gnosal" name="natilla100gnosal" value="<?php if(isset($productos["natilla100gnosal"])){echo $productos["natilla100gnosal"];} else {echo "0";} ?>">
                                <label for="natilla100gnosal">Natilla 100g sin sal</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="aderezo_PCA" name="aderezo_PCA" value="<?php if(isset($productos["aderezo_PCA"])){echo $productos["aderezo_PCA"];} else {echo "0";} ?>">
                                <label for="aderezo_PCA">Aderezo Piña Coco Albahaca</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" maajo parmesanox="999" id="aderezo_cebolla" name="aderezo_cebolla" value="<?php if(isset($productos["aderezo_cebolla"])){echo $productos["aderezo_cebolla"];} else {echo "0";} ?>">
                                <label for="aderezo_cebolla">Aderezo de Cebolla Cremosa</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" maajo parmesanox="999" id="ajo_parmesano" name="ajo_parmesano" value="<?php if(isset($productos["ajo_parmesano"])){echo $productos["ajo_parmesano"];} else {echo "0";} ?>">
                                <label for="ajo_parmesano">Ajo Parmesano</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" maajo parmesanox="999" id="pimienta_pepinillos" name="pimienta_pepinillos" value="<?php if(isset($productos["pimienta_pepinillos"])){echo $productos["pimienta_pepinillos"];} else {echo "0";} ?>">
                                <label for="pimienta_pepinillos">Pimienta Pepinillos</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" maajo parmesanox="999" id="romero_parmesano" name="romero_parmesano" value="<?php if(isset($productos["romero_parmesano"])){echo $productos["romero_parmesano"];} else {echo "0";} ?>">
                                <label for="romero_parmesano">Romero Parmesano</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="mezcla_pizza_1kg" name="mezcla_pizza_1kg" value="<?php if(isset($productos["mezcla_pizza_1kg"])){echo $productos["mezcla_pizza_1kg"];} else {echo "0";} ?>">
                                <label for="mezcla_pizza_1kg">Mezcla Pizza 1KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="mezcla_pizza_250g" name="mezcla_pizza_250g" value="<?php if(isset($productos["mezcla_pizza_250g"])){echo $productos["mezcla_pizza_250g"];} else {echo "0";} ?>">
                                <label for="mezcla_pizza_250g">Mezcla Pizza 250g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="nachos_1kg" name="nachos_1kg" value="<?php if(isset($productos["nachos_1kg"])){echo $productos["nachos_1kg"];} else {echo "0";} ?>">
                                <label for="nachos_1kg">Mezcla Nachos 1KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="nachos_250" name="nachos_250" value="<?php if(isset($productos["nachos_250"])){echo $productos["nachos_250"];} else {echo "0";} ?>">
                                <label for="nachos_250">Mezcla Nachos 250g</label>
                            </div>
                        </div>

                        <div class="col-sm bordeColumnas">
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="queso_seco" name="queso_seco" value="<?php if(isset($productos["queso_seco"])){echo $productos["queso_seco"];} else {echo "0";} ?>">
                                <label for="queso_seco">Queso Seco</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="queso_seco_especial" name="queso_seco_especial" value="<?php if(isset($productos["queso_seco_especial"])){echo $productos["queso_seco_especial"];} else {echo "0";} ?>">
                                <label for="queso_seco_especial">Queso Ahumado 1KG</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="yogurt38" name="yogurt38" value="<?php if(isset($productos["yogurt38"])){echo $productos["yogurt38"];} else {echo "0";} ?>">
                                <label for="yogurt38">Yogurt 3.8 Natural</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="yogurt_litro" name="yogurt_litro" value="<?php if(isset($productos["yogurt_litro"])){echo $productos["yogurt_litro"];} else {echo "0";} ?>">
                                <label for="yogurt_litro">Yogurt Natural de Litro</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="yogurt19" name="yogurt19" value="<?php if(isset($productos["yogurt19"])){echo $productos["yogurt19"];} else {echo "0";} ?>">
                                <label for="yogurt19">Yogurt Natural 1.9L</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="litro_Fresa" name="litro_Fresa" value="<?php if(isset($productos["litro_Fresa"])){echo $productos["litro_Fresa"];} else {echo "0";} ?>">
                                <label for="litro_Fresa">Litro Fresa</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="litro_Mora" name="litro_Mora" value="<?php if(isset($productos["litro_Mora"])){echo $productos["litro_Mora"];} else {echo "0";} ?>">
                                <label for="litro_Mora">Litro Mora</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="litro_Frutas" name="litro_Frutas" value="<?php if(isset($productos["litro_Frutas"])){echo $productos["litro_Frutas"];} else {echo "0";} ?>">
                                <label for="litro_Frutas">Litro Frutas</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="litro_Guanabana" name="litro_Guanabana" value="<?php if(isset($productos["litro_Guanabana"])){echo $productos["litro_Guanabana"];} else {echo "0";} ?>">
                                <label for="litro_Guanabana">Litro Guanabana</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="litro_Melocoton" name="litro_Melocoton" value="<?php if(isset($productos["litro_Melocoton"])){echo $productos["litro_Melocoton"];} else {echo "0";} ?>">
                                <label for="litro_Melocoton">Litro Melocoton</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="litro_piña_colada" name="litro_piña_colada" value="<?php if(isset($productos["litro_piña_colada"])){echo $productos["litro_piña_colada"];} else {echo "0";} ?>">
                                <label for="litro_piña_colada">Litro Piña Colada</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="litro_pie_limon" name="litro_pie_limon" value="<?php if(isset($productos["litro_pie_limon"])){echo $productos["litro_pie_limon"];} else {echo "0";} ?>">
                                <label for="litro_pie_limon">Litro Pie Limón</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="1_9_Fresa" name="1_9_Fresa" value="<?php if(isset($productos["1_9_Fresa"])){echo $productos["1_9_Fresa"];} else {echo "0";} ?>">
                                <label for="1_9_Fresa">1.9L Fresa</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="1_9_Mora" name="1_9_Mora" value="<?php if(isset($productos["1_9_Mora"])){echo $productos["1_9_Mora"];} else {echo "0";} ?>">
                                <label for="1_9_Mora">1.9L Mora</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="1_9_Frutas" name="1_9_Frutas" value="<?php if(isset($productos["1_9_Frutas"])){echo $productos["1_9_Frutas"];} else {echo "0";} ?>">
                                <label for="1_9_Frutas">1.9L Frutas</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="1_9_Guanabana" name="1_9_Guanabana" value="<?php if(isset($productos["1_9_Guanabana"])){echo $productos["1_9_Guanabana"];} else {echo "0";} ?>">
                                <label for="1_9_Guanabana">1.9L Guanabana</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="1_9_Melocoton" name="1_9_Melocoton" value="<?php if(isset($productos["1_9_Melocoton"])){echo $productos["1_9_Melocoton"];} else {echo "0";} ?>">
                                <label for="1_9_Melocoton">1.9L Melocoton</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="1_9_piña_colada" name="1_9_piña_colada" value="<?php if(isset($productos["1_9_piña_colada"])){echo $productos["1_9_piña_colada"];} else {echo "0";} ?>">
                                <label for="1_9_piña_colada">1.9L Piña Colada</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="1_9_pie_limon" name="1_9_pie_limon" value="<?php if(isset($productos["1_9_pie_limon"])){echo $productos["1_9_pie_limon"];} else {echo "0";} ?>">
                                <label for="1_9_pie_limon">1.9L Pie Limón</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="galon_Fresa" name="galon_Fresa" value="<?php if(isset($productos["galon_Fresa"])){echo $productos["galon_Fresa"];} else {echo "0";} ?>">
                                <label for="galon_Fresa">Galón Fresa</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="galon_Mora" name="galon_Mora" value="<?php if(isset($productos["galon_Mora"])){echo $productos["galon_Mora"];} else {echo "0";} ?>">
                                <label for="galon_Mora">Galón Mora</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="galon_Frutas" name="galon_Frutas" value="<?php if(isset($productos["galon_Frutas"])){echo $productos["galon_Frutas"];} else {echo "0";} ?>">
                                <label for="galon_Frutas">Galón Frutas</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="galon_Guanabana" name="galon_Guanabana" value="<?php if(isset($productos["galon_Guanabana"])){echo $productos["galon_Guanabana"];} else {echo "0";} ?>">
                                <label for="galon_Guanabana">Galón Guanabana</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="galon_Melocoton" name="galon_Melocoton" value="<?php if(isset($productos["galon_Melocoton"])){echo $productos["galon_Melocoton"];} else {echo "0";} ?>">
                                <label for="galon_Melocoton">Galón Melocoton</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="galon_piña_colada" name="galon_piña_colada" value="<?php if(isset($productos["galon_piña_colada"])){echo $productos["galon_piña_colada"];} else {echo "0";} ?>">
                                <label for="galon_piña_colada">Galón Piña Colada</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="galon_pie_limon" name="galon_pie_limon" value="<?php if(isset($productos["galon_pie_limon"])){echo $productos["galon_pie_limon"];} else {echo "0";} ?>">
                                <label for="galon_pie_limon">Galón Pie Limón</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="200ml_Fresa" name="200ml_Fresa" value="<?php if(isset($productos["200ml_Fresa"])){echo $productos["200ml_Fresa"];} else {echo "0";} ?>">
                                <label for="200ml_Fresa">200ml Fresa</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="200ml_Mora" name="200ml_Mora" value="<?php if(isset($productos["200ml_Mora"])){echo $productos["200ml_Mora"];} else {echo "0";} ?>">
                                <label for="200ml_Mora">200ml Mora</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="200ml_Frutas" name="200ml_Frutas" value="<?php if(isset($productos["200ml_Frutas"])){echo $productos["200ml_Frutas"];} else {echo "0";} ?>">
                                <label for="200ml_Frutas">200ml Frutas</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="200ml_Guanabana" name="200ml_Guanabana" value="<?php if(isset($productos["200ml_Guanabana"])){echo $productos["200ml_Guanabana"];} else {echo "0";} ?>">
                                <label for="200ml_Guanabana">200ml Guanabana</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="200ml_Melocoton" name="200ml_Melocoton" value="<?php if(isset($productos["200ml_Melocoton"])){echo $productos["200ml_Melocoton"];} else {echo "0";} ?>">
                                <label for="200ml_Melocoton">200ml Melocoton</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="200ml_piña_colada" name="200ml_piña_colada" value="<?php if(isset($productos["200ml_piña_colada"])){echo $productos["200ml_piña_colada"];} else {echo "0";} ?>">
                                <label for="200ml_piña_colada">200ml Piña Colada</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="200ml_pie_limon" name="200ml_pie_limon" value="<?php if(isset($productos["200ml_pie_limon"])){echo $productos["200ml_pie_limon"];} else {echo "0";} ?>">
                                <label for="200ml_pie_limon">200ml Pie Limón</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="yogurt_sixpack" name="yogurt_sixpack" value="<?php if(isset($productos["yogurt_sixpack"])){echo $productos["yogurt_sixpack"];} else {echo "0";} ?>">
                                <label for="yogurt_sixpack">Six pack yogurt surtido</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="Fresa_Fresa" name="Fresa_Fresa" value="<?php if(isset($productos["Fresa_Fresa"])){echo $productos["Fresa_Fresa"];} else {echo "0";} ?>">
                                <label for="Fresa_Fresa">Fresa - Fresa</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="Fresa_Pie_Limon" name="Fresa_Pie_Limon" value="<?php if(isset($productos["Fresa_Pie_Limon"])){echo $productos["Fresa_Pie_Limon"];} else {echo "0";} ?>">
                                <label for="Fresa_Pie_Limon">Fresa - Pie Limón</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="Fresa_Guanabana" name="Fresa_Guanabana" value="<?php if(isset($productos["Fresa_Guanabana"])){echo $productos["Fresa_Guanabana"];} else {echo "0";} ?>">
                                <label for="Fresa_Guanabana">Fresa - Guanabana</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="Fresa_Pina_Conalda" name="Fresa_Pina_Conalda" value="<?php if(isset($productos["Fresa_Pina_Conalda"])){echo $productos["Fresa_Pina_Conalda"];} else {echo "0";} ?>">
                                <label for="Fresa_Pina_Conalda">Fresa - Piña Conalda</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="Melocoton_Mora" name="Melocoton_Mora" value="<?php if(isset($productos["Melocoton_Mora"])){echo $productos["Melocoton_Mora"];} else {echo "0";} ?>">
                                <label for="Melocoton_Mora">Melocotón - Mora</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="Natural_Natural" name="Natural_Natural" value="<?php if(isset($productos["Natural_Natural"])){echo $productos["Natural_Natural"];} else {echo "0";} ?>">
                                <label for="Natural_Natural">Natural - Natural</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="griego_125g" name="griego_125g" value="<?php if(isset($productos["griego_125g"])){echo $productos["griego_125g"];} else {echo "0";} ?>">
                                <label for="griego_125g">Yogurt Griego 125g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="econopack_griego" name="econopack_griego" value="<?php if(isset($productos["econopack_griego"])){echo $productos["econopack_griego"];} else {echo "0";} ?>">
                                <label for="econopack_griego">ECONOPACK Griego</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="americano_40" name="americano_40" value="<?php if(isset($productos["americano_40"])){echo $productos["americano_40"];} else {echo "0";} ?>">
                                <label for="americano_40">Amarillo tipo americano 40 ud</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="americano_16" name="americano_16" value="<?php if(isset($productos["americano_16"])){echo $productos["americano_16"];} else {echo "0";} ?>">
                                <label for="americano_16">Amarillo tipo americano 16 ud</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="queso_americano40" name="queso_americano40" value="<?php if(isset($productos["queso_americano40"])){echo $productos["queso_americano40"];} else {echo "0";} ?>">
                                <label for="queso_americano40">Blanco tipo Americano 40 ud</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="palmito_pelota" name="palmito_pelota" value="<?php if(isset($productos["palmito_pelota"])){echo $productos["palmito_pelota"];} else {echo "0";} ?>">
                                <label for="palmito_pelota">Palmito 400g al vacío</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="palmitobolsa400g" name="palmitobolsa400g" value="<?php if(isset($productos["palmitobolsa400g"])){echo $productos["palmitobolsa400g"];} else {echo "0";} ?>">
                                <label for="palmitobolsa400g">Palmito en bolsa 400g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="palmito_romero_300g" name="palmito_romero_300g" value="<?php if(isset($productos["palmito_romero_300g"])){echo $productos["palmito_romero_300g"];} else {echo "0";} ?>">
                                <label for="palmito_romero_300g">Queso Palmito romero 300g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="palmito_chile_300g" name="palmito_chile_300g" value="<?php if(isset($productos["palmito_chile_300g"])){echo $productos["palmito_chile_300g"];} else {echo "0";} ?>">
                                <label for="palmito_chile_300g">Queso Palmito chile 300g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="especial_albahaca_300" name="especial_albahaca_300" value="<?php if(isset($productos["especial_albahaca_300"])){echo $productos["especial_albahaca_300"];} else {echo "0";} ?>">
                                <label for="especial_albahaca_300">Especial Albahaca 300g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="palmito_romero_1kg" name="palmito_romero_1kg" value="<?php if(isset($productos["palmito_romero_1kg"])){echo $productos["palmito_romero_1kg"];} else {echo "0";} ?>">
                                <label for="palmito_romero_1kg">Queso Palmito romero 1KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="palmito_chile_1kg" name="palmito_chile_1kg" value="<?php if(isset($productos["palmito_chile_1kg"])){echo $productos["palmito_chile_1kg"];} else {echo "0";} ?>">
                                <label for="palmito_chile_1kg">Queso Palmito chile 1KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="especial_albahaca_1kg" name="especial_albahaca_1kg" value="<?php if(isset($productos["especial_albahaca_1kg"])){echo $productos["especial_albahaca_1kg"];} else {echo "0";} ?>">
                                <label for="especial_albahaca_1kg">Especial Albahaca 1KG</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="quesocrema_1kg" name="quesocrema_1kg" value="<?php if(isset($productos["quesocrema_1kg"])){echo $productos["quesocrema_1kg"];} else {echo "0";} ?>">
                                <label for="quesocrema_1kg">Queso Crema 1KG doypack</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="queso_crema_caja500" name="queso_crema_caja500" value="<?php if(isset($productos["queso_crema_caja500"])){echo $productos["queso_crema_caja500"];} else {echo "0";} ?>">
                                <label for="queso_crema_caja500">Caja Queso Crema 500g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="queso_crema_caja100" name="queso_crema_caja100" value="<?php if(isset($productos["queso_crema_caja100"])){echo $productos["queso_crema_caja100"];} else {echo "0";} ?>">
                                <label for="queso_crema_caja100">Caja Queso Crema 100g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="quesocremacaja100gblanca" name="quesocremacaja100gblanca" value="<?php if(isset($productos["quesocremacaja100gblanca"])){echo $productos["quesocremacaja100gblanca"];} else {echo "0";} ?>">
                                <label for="quesocremacaja100gblanca">Queso crema caja 100g blanca</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="quesocrema_pastelero" name="quesocrema_pastelero" value="<?php if(isset($productos["quesocrema_pastelero"])){echo $productos["quesocrema_pastelero"];} else {echo "0";} ?>">
                                <label for="quesocrema_pastelero">Queso Crema Kilo Pastelero</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="quesocrema_duro" name="quesocrema_duro" value="<?php if(isset($productos["quesocrema_duro"])){echo $productos["quesocrema_duro"];} else {echo "0";} ?>">
                                <label for="quesocrema_duro">Queso Crema Kilo Duro</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="quesocrema_galon" name="quesocrema_galon" value="<?php if(isset($productos["quesocrema_galon"])){echo $productos["quesocrema_galon"];} else {echo "0";} ?>">
                                <label for="quesocrema_galon">Queso Crema Galón</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="quesocrema_5kg" name="quesocrema_5kg" value="<?php if(isset($productos["quesocrema_5kg"])){echo $productos["quesocrema_5kg"];} else {echo "0";} ?>">
                                <label for="quesocrema_5kg">Queso Crema 5KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="bolsa_200g" name="bolsa_200g" value="<?php if(isset($productos["bolsa_200g"])){echo $productos["bolsa_200g"];} else {echo "0";} ?>">
                                <label for="bolsa_200g">Queso Crema Bolsa de 200g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="bolsa_100g" name="bolsa_100g" value="<?php if(isset($productos["bolsa_100g"])){echo $productos["bolsa_100g"];} else {echo "0";} ?>">
                                <label for="bolsa_100g">Queso Crema Bolsa de 100g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="caja_250g" name="caja_250g" value="<?php if(isset($productos["caja_250g"])){echo $productos["caja_250g"];} else {echo "0";} ?>">
                                <label for="caja_250g">Queso Crema Caja de 250g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="quesocrema30610" name="quesocrema30610" value="<?php if(isset($productos["quesocrema30610"])){echo $productos["quesocrema30610"];} else {echo "0";} ?>">
                                <label for="quesocrema30610">Queso Crema Blanco 1kg (30610)</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="jugonaranja_galon" name="jugonaranja_galon" value="<?php if(isset($productos["jugonaranja_galon"])){echo $productos["jugonaranja_galon"];} else {echo "0";} ?>">
                                <label for="jugonaranja_galon">Jugo de Naranja Galón</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="jugonaranja_19" name="jugonaranja_19" value="<?php if(isset($productos["jugonaranja_19"])){echo $productos["jugonaranja_19"];} else {echo "0";} ?>">
                                <label for="jugonaranja_19">Jugo de Naranja 1.9 L</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="jugonaranja_litro" name="jugonaranja_litro" value="<?php if(isset($productos["jugonaranja_litro"])){echo $productos["jugonaranja_litro"];} else {echo "0";} ?>">
                                <label for="jugonaranja_litro">Jugo de Naranja Litro</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="gualberto250" name="gualberto250" value="<?php if(isset($productos["gualberto250"])){echo $productos["gualberto250"];} else {echo "0";} ?>">
                                <label for="gualberto250">Natilla Gualberto 250g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="gualberto500" name="gualberto500" value="<?php if(isset($productos["gualberto500"])){echo $productos["gualberto500"];} else {echo "0";} ?>">
                                <label for="gualberto500">Natilla Gualberto 500g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="quesocrema1kggualberto" name="quesocrema1kggualberto" value="<?php if(isset($productos["quesocrema1kggualberto"])){echo $productos["quesocrema1kggualberto"];} else {echo "0";} ?>">
                                <label for="quesocrema1kggualberto">Queso Crema 1KG Blanco Gualberto</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="cheddar200" name="cheddar200" value="<?php if(isset($productos["cheddar200"])){echo $productos["cheddar200"];} else {echo "0";} ?>">
                                <label for="cheddar200">Queso Cheddar 200g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="cheddar300" name="cheddar300" value="<?php if(isset($productos["cheddar300"])){echo $productos["cheddar300"];} else {echo "0";} ?>">
                                <label for="cheddar300">Queso Cheddar 300g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="cheddar1k" name="cheddar1k" value="<?php if(isset($productos["cheddar1k"])){echo $productos["cheddar1k"];} else {echo "0";} ?>">
                                <label for="cheddar1k">Queso Cheddar 1KG</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="homex" name="homex" value="<?php if(isset($productos["homex"])){echo $productos["homex"];} else {echo "0";} ?>">
                                <label for="homex">Homex</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="pmmoravia" name="pmmoravia" value="<?php if(isset($productos["pmmoravia"])){echo $productos["pmmoravia"];} else {echo "0";} ?>">
                                <label for="pmmoravia">Peq. Mundo Moravia</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="pmtrestios" name="pmtrestios" value="<?php if(isset($productos["pmtrestios"])){echo $productos["pmtrestios"];} else {echo "0";} ?>">
                                <label for="pmtrestios">Peq. Mundo Tres Rios</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="pmalajuelita" name="pmalajuelita" value="<?php if(isset($productos["pmalajuelita"])){echo $productos["pmalajuelita"];} else {echo "0";} ?>">
                                <label for="pmalajuelita">Peq. Mundo Alajuelita</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="rompope920" name="rompope920" value="<?php if(isset($productos["rompope920"])){echo $productos["rompope920"];} else {echo "0";} ?>">
                                <label for="rompope920">Rompope 920g</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="rompope210" name="rompope210" value="<?php if(isset($productos["rompope210"])){echo $productos["rompope210"];} else {echo "0";} ?>">
                                <label for="rompope210">Rompope 210g</label>
                            </div><br>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="choppers_esp" name="choppers_esp" value="<?php if(isset($productos["choppers_esp"])){echo $productos["choppers_esp"];} else {echo "0";} ?>">
                                <label for="choppers_esp">CHOPPERS</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="crujipan_esp" name="crujipan_esp" value="<?php if(isset($productos["crujipan_esp"])){echo $productos["crujipan_esp"];} else {echo "0";} ?>">
                                <label for="crujipan_esp">Crujipan</label>
                            </div>
                            <div>
                                <input class="form-control quantity" type="number" min="0" max="999" id="pmundo_cartago_esp" name="pmundo_cartago_esp" value="<?php if(isset($productos["pmundo_cartago_esp"])){echo $productos["pmundo_cartago_esp"];} else {echo "0";} ?>">
                                <label for="pmundo_cartago_esp">Pequeño mundo cartago</label>
                            </div>
                            <div>
                                <input class="form-control quantity" style="visibility:hidden;" type="text" id="data_id_cliente" name="data_id_cliente" value="<?php echo $datos_cliente["id_cliente"]."|".$productos["id_pedido"] ?>">
                            </div>
                        </div>    
                    </div>
                    <script type="text/javascript">
                        $("input[type=number]").focus(function(){	   
                            this.select();
                        });
                    </script>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-success btn-lg" type="submit" value="Submit" onclick="enviarPedido()">Editar Pedido</button>
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
                            if(data == 1){
                                alert('Pedido editado correctamente.');
                                window.location.replace("(/../../");
                            } else if(data == 0) {
                                alert('Ha ocurrido un error, intente nuevamente.');
                                window.location.replace("(/../../");
                            } else if(data == 99) {
                                alert('Se ha eliminado el pedido');
                                window.location.replace("(/../../");
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


<?php 
    function GetDataCliente(){
        if(isset($_POST['clients_list'])){
            $id_cliente = $_POST['clients_list'];
            
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
            
            if ($result = $conn -> query("SELECT nombre FROM cliente WHERE id_cliente = ".$id_cliente)) {
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

    function getProductosPedido($id_cliente){
        if(isset($id_cliente)){
            
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
            
            if ($result = $conn -> query('SELECT id_pedido FROM pedido WHERE fk_cliente = '.$id_cliente.' AND fecha = "'.getActualDate().'"')) {
                while($obj = $result->fetch_object()){
                    $id_pedido = $obj->id_pedido;
                }
            } 

            if ($result2 = $conn -> query('SELECT slug_producto, cantidad FROM detalle WHERE fk_pedido = '.$id_pedido)) {
                while($obj = $result2->fetch_object()){
                    $ProductosPedido[$obj->slug_producto] = $obj->cantidad;
                }
            } 

            $ProductosPedido["id_pedido"] = $id_pedido;

            $conn->close();

            return $ProductosPedido;            
        }
        else {
            return "Sin cliente seleccionado";
        }
    }

    function getActualDate(){
        $date = new DateTime(date('d-M-Y H:i:s'));
        $date->setTimezone(new DateTimeZone("America/Costa_Rica"));
    
    
        return strval($date->format('d-M-Y'));
    }
?>
