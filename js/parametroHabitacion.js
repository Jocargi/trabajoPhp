let valorSeleccionado;

function guardarValor(valor) {
    valorSeleccionado = valor;
}

valorSeleccionado = valorSeleccionado == undefined ? 1 : valorSeleccionado;

function parametroHabitacion(id, fechaEntrada, fechaSalida) {
        var form = document.createElement("form");
        form.setAttribute("method", "get");
        form.setAttribute("action", "../main/finalizarReserva.php");

        var id_habitacion = document.createElement("input");
        id_habitacion.setAttribute("type", "hidden");
        id_habitacion.setAttribute("name", "id");
        id_habitacion.setAttribute("value", id);

        form.appendChild(id_habitacion);

        var numero_habitaciones = document.createElement("input");
        numero_habitaciones.setAttribute("type", "hidden");
        numero_habitaciones.setAttribute("name", "numero_habitaciones");
        numero_habitaciones.setAttribute("value", valorSeleccionado);
        
        form.appendChild(numero_habitaciones);

        var fecha_entrada = document.createElement("input");
        fecha_entrada.setAttribute("type", "hidden");
        fecha_entrada.setAttribute("name", "fecha_entrada");
        fecha_entrada.setAttribute("value", fechaEntrada);

        form.appendChild(fecha_entrada);

        var fecha_salida = document.createElement("input");
        fecha_salida.setAttribute("type", "hidden");
        fecha_salida.setAttribute("name", "fecha_salida");
        fecha_salida.setAttribute("value", fechaSalida);

        form.appendChild(fecha_salida);
        
        document.body.appendChild(form);
        form.submit();
    }
