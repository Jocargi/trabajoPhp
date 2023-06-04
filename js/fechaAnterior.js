document.addEventListener('DOMContentLoaded', function() {
const fechaEntradaInput = document.getElementById('fecha-entrada');
const fechaSalidaInput = document.getElementById('fecha-salida');

fechaEntradaInput.addEventListener('change', () => {
const fechaEntrada = new Date(fechaEntradaInput.value);
fechaSalidaInput.min = fechaEntrada.toISOString().split('T')[0];
});
});
