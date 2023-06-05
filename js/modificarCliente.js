function modificarCliente(idEliminacion){

    var form = document.createElement("form");
    form.setAttribute("method", "get");
    form.setAttribute("action", "../main/modificar_cliente.php");

    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "id");
    input.setAttribute("value", idEliminacion);

    form.appendChild(input);
    document.body.appendChild(form);

    form.submit();

}