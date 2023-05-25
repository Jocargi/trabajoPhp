
function eliminarCliente(correoE) {
    var confirmar = confirm("¿Estás seguro de que deseas eliminar el cliente con correo: " + correo + "?");
    if (confirmar) {
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "eliminarCliente.php");

        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "correo");
        input.setAttribute("value", correoE);

        form.appendChild(input);
        document.body.appendChild(form);

        form.submit();
    }
}