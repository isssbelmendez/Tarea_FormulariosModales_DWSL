function mostrarFormulario() {
    $('#modalTitulo').text('Agregar Persona');
    $('#formularioPersona').trigger('reset');
    $('#modalPersona').modal('show');
}

function cerrarFormulario() {
    $('#modalPersona').modal('hide');
}

function guardarPersona() {
    // Obtener datos del formulario
    var nombre = $('#nombre').val().trim();
    var telefono = $('#telefono').val().trim();
    var dui = $('#dui').val().trim();

    // Validar que los campos no estén vacíos
    if (nombre === '' || telefono === '' || dui === '') {
        alert('Todos los campos son obligatorios');
        return;
    }

    // Enviar datos al servidor (usando AJAX)
    $.ajax({
        type: 'POST',
        url: 'create.php',
        data: { nombre: nombre, telefono: telefono, dui: dui },
        success: function (response) {
            alert(response);
            cargarDatosTabla(); // Recargar datos en la tabla
            $('#modalPersona').modal('hide'); // Cerrar el formulario después de que la solicitud AJAX se haya completado
        },
        error: function (error) {
            console.error('Error al enviar datos:', error);
        }
    });
}

function cargarDatosTabla() {
    // Obtener datos del servidor (usando AJAX)
    $.ajax({
        type: 'GET',
        url: 'read_all.php',
        dataType: 'json',
        success: function (data) {
            // Limpiar y llenar la tabla
            var tablaPersonas = $('#tablaPersonas tbody');
            tablaPersonas.empty();

            $.each(data, function (index, persona) {
                tablaPersonas.append(
                    '<tr>' +
                    '<td>' + persona.id + '</td>' +
                    '<td>' + persona.nombre + '</td>' +
                    '<td>' + persona.telefono + '</td>' +
                    '<td>' + persona.dui + '</td>' +
                    '<td>Acciones</td>' +
                    '</tr>'
                );
            });
        },
        error: function (error) {
            console.error('Error al obtener datos:', error);
        }
    });
}

// Cargar datos iniciales al cargar la página
$(document).ready(function () {
    cargarDatosTabla();
});
