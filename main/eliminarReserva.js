function eliminarReserva(idReserva) {
    var confirmar = confirm("¿Estás seguro de que deseas eliminar la reserva con id: " + idReserva + "?");
    if (confirmar) {
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "eliminarReserva.php");

        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "id_eliminarReserva");
        input.setAttribute("value", idReserva);

        form.appendChild(input);
        document.body.appendChild(form);

        form.submit();
    }
}