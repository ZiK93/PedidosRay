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