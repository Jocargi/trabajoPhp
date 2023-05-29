function eliminarHabitacion(id) {
    var confirmar = confirm("¿Estás seguro de que deseas eliminar la habitacion con id: " + id + "?");
    if (confirmar) {
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "eliminarHabitacion.php");

        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "id");
        input.setAttribute("value", id);

        form.appendChild(input);
        document.body.appendChild(form);

        form.submit();
    }
}