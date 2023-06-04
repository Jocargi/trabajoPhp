let valorSeleccionado;
let fechaEntrada;
let fechaSalida;


function guardarFechaEntrada(fechaEntrada){
    this.fechaEntrada = fechaEntrada;
}

function guardarFechaSalida(fechaSalida){
    this.fechaSalida = fechaSalida;
}

function guardarValor(valor) {
    valorSeleccionado = valor;
}

valorSeleccionado = valorSeleccionado == undefined ? 1 : valorSeleccionado;

function parametroHabitacion(id) {
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
        
        document.body.appendChild(form);
        form.submit();
    }
