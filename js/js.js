function agregarCliente() { 
    //in here we can do the ajax after validating the field isn't empty.
    if($("#NombreCliente").val()!="") {
        $.ajax({
            url: "controller/nuevo_cliente.php",
            type: "POST",
            data: {'nombre_cliente': $("#NombreCliente").val()},
            success: function(data) {
                if(data=="true"){
                    alert("Cliente agregado correctamente");
                    location.reload(); 
                } else {
                    alert("Ha ocurrido un error agragando el cliente");
                }
            },  
        });
    } else {
        alert("Debe agregar el nombre del cliente");
    }
}

function agregarProducto(columna) { 
    //in here we can do the ajax after validating the field isn't empty.
    if($("#NombreProducto1").val()!="" || $("#NombreProducto2").val()!=""){
        if(columna = 1){
            if($("#NombreProducto1").val()!="") {
                $.ajax({
                    url: "../controller/nuevo_producto.php",
                    type: "POST",
                    data: {'nombre_producto': $("#NombreProducto1").val(), 'columna': columna},
                    success: function(data) {
                        console.log(data);
                        if(data=="true"){
                            location.reload(); 
                        } else {
                            alert("Producto ya existe");
                        }
                    },
                    error: function(xhr, textStatus, error){
                        console.log(xhr.statusText);
                        console.log(textStatus);
                        console.log(error);
                    }
                });
            }
        } 
        if(columna = 2){
            if($("#NombreProducto2").val()!="") {
                $.ajax({
                    url: "../controller/nuevo_producto.php",
                    type: "POST",
                    data: {'nombre_producto': $("#NombreProducto2").val(), 'columna': columna},
                    success: function(data) {
                        if(data=="true"){
                            location.reload(); 
                        } else {
                            alert("Producto ya existe");
                        }
                    },
                    error: function(xhr, textStatus, error){
                        console.log(xhr.statusText);
                        console.log(textStatus);
                        console.log(error);
                    }
                });
            }
        } 
    } else {
        alert("Debe agregar el nombre del producto");
    }
}

function agragarespacio(columna) { 
    //in here we can do the ajax after validating the field isn't empty.
        $.ajax({
            url: "../controller/nuevo_espacio_producto.php",
            type: "POST",
            data: {'columna': columna},
            success: function(data) {
                console.log(data);
                if(data=="true"){
                    location.reload(); 
                } else {
                    alert("Error agregando espaciador");
                }
            },
            error: function(xhr, textStatus, error){
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        });
}


function agregarPedido() {
    if($( "#clients option:selected" ).text() != " -- "){
        $( "#clients_list" ).submit();
    } else {
        alert("Debe seleccionar un cliente");
    } 
}

function enviarPedido() {
    $( "#products_list" ).submit();
}

function agregarproductoBTN1() {
    document.getElementById("btnAgregarP1").style.display = "none";
    document.getElementById("showformagregar1").style.visibility = "visible";
    document.getElementById("showformagregar1").style.height = "max-content";
    document.getElementById("btnAgregarespacio1").style.display = "none";
}

function agregarproductoBTN2() {
    document.getElementById("btnAgregarP2").style.display = "none";
    document.getElementById("showformagregar2").style.visibility = "visible";
    document.getElementById("showformagregar2").style.height = "max-content";
    document.getElementById("btnAgregarespacio2").style.display = "none";
}


function buscarPedido() { 
    //in here we can do the ajax after validating the field isn't empty.
    if($("#fechapedido").val()!="") {
        $.ajax({
            url: "views/historial_pedido.php",
            type: "POST",
            data: {'fecha_pedido': $("#fechapedido").val()},
            success: function(data) {
                if(data=="true"){
                    location.reload(); 
                } else {
                    alert("Ha ocurrido un error");
                }
            },  
        });
    } else {
        alert("Error en fecha");
    }
}

function login() { 
    //in here we can do the ajax after validating the field isn't empty.
    if($("#usuario").val()!="" || $("#contrasenia").val()!="") {
        $.ajax({
            url: "../controller/login_controller.php",
            type: "POST",
            data: {'usuario': $("#usuario").val(),'contrasenia': $("#contrasenia").val()},
            success: function(data) {
                console.log(data)
                if(data=="true"){
                    location.href = "../inicio.php"
                } else {
                    alert("Datos incorrectos");
                }
            },
            error: function(xhr, textStatus, error){
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        });
    } else {
        alert("Debe llenar los campos requeridos");
    }
} 

function editarCliente(id_cliente) { 
    if($("#".concat(id_cliente)).val()!="") {
        $.ajax({
            url: "../controller/editar_cliente_controller.php",
            type: "POST",
            data: {'id_cliente': id_cliente,'nombre_cliente': $("#".concat(id_cliente)).val(), 'operacion': "editar" },
            success: function(data) {
                if(data=="true"){
                    alert("Cliente editado correctamente");
                    location.reload(); 
                } else {
                    alert("Error editando el cliente");
                }
            },
            error: function(xhr, textStatus, error){
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        });
    } else {
        alert("Nombre en blanco");
    }
} 

function eliminarCliente(id_cliente) { 
    if (confirm("Está seguro que desea eliminar el cliente?") == true) {
        $.ajax({
            url: "../controller/editar_cliente_controller.php",
            type: "POST",
            data: {'id_cliente': id_cliente, 'operacion': "eliminar" },
            success: function(data) {
                console.log(data);
                if(data=="true"){
                    alert("Cliente eliminado correctamente");
                    location.reload(); 
                } else {
                    alert("Error eliminando el cliente");
                }
            },
            error: function(xhr, textStatus, error){
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        });
    }
} 

function eliminarProducto(id_producto, newpos, columna) { 
    if (confirm("Está seguro que desea eliminar el producto?") == true) {
        $.ajax({
            url: "../controller/editar_producto_controller.php",
            type: "POST",
            data: {'id_producto': id_producto, 'operacion': "eliminar", 'newpos': newpos, 'columna': columna },
            success: function(data) {
                console.log(data);
                if(data=="true"){
                    location.reload(); 
                } else {
                    alert("Error eliminando el producto");
                }
            },
            error: function(xhr, textStatus, error){
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        });
    }
} 

function editar_pos_producto(columna, id_producto) { 
    if($("#id_prod_".concat(id_producto)).val()!="") {
        $.ajax({
            url: "../controller/editar_producto_controller.php",
            type: "POST",
            data: {'newpos': $("#id_prod_".concat(id_producto)).val(), 'columna': columna, 'operacion': "editpos", 'id_producto': id_producto },
            success: function(data) {
                console.log(data);
                if(data=="true"){
                    location.reload(); 
                } else {
                    alert("Error modificando posicion del producto");
                }
            },
            error: function(xhr, textStatus, error){
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        });
    }
} 

function mostrar_edicion(id_producto) { 
    document.getElementById("div_".concat(id_producto)).style.display = "block";
}
