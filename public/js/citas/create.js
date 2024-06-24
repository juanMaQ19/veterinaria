// Obtener el campo de selección de usuarios y agregar un evento de cambio
$('#medico').change(function() {
    var userId = $(this).val();

    // Hacer la solicitud AJAX para obtener los horarios disponibles
    $.ajax({
        url: '/ruta/horarios-disponibles',
        type: 'GET',
        data: { user_id: userId },
        success: function(response) {
            // Limpiar el campo de selección de horarios
            $('#horarios').empty();

            // Llenar el campo de selección con los horarios disponibles
            $.each(response, function(index, horario) {
                var option = $('<option>').attr('value', horario.id).text(horario.nombre);
                $('#horarios').append(option);
            });
        },
        error: function() {
            // Manejar el error de la solicitud AJAX
            alert('Ocurrió un error al obtener los horarios disponibles.');
        }
    });
});
