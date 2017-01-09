//require('./bootstrap');
//
require('sweetalert');

$('#reservar').click(function(event) {
    var llegada = $('#llegada').val()
    var salida = $('#salida').val()
    var cabana_type = $('#cabana_select').val()
    if (llegada != '' && salida != '' && cabana_type != null) {
        $.ajax({
            url: '/disponibilidad',
            type: 'GET',
            dataType: 'json',
            data: {llegada: llegada, salida: salida, cabana_type: cabana_type},
        })
        .done(function(disponibilidad) {
            if (disponibilidad) {
                $('#reservar_cabana').modal('show')
            }
            else {
                swal("No hay disponibilidad para las fechas que se mencionan");
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
    else {
        swal("Selecciona los datos para checar disponibilidad")
    }
});


$('#form_reservar').on('submit', function(e){
    e.preventDefault();
    var data = {
        cabana_id: $('#cabana_select').val(),
        nombre: $("[name='nombre']").val(),
        apellidos: $("[name='apellidos']").val(),
        telefono: $("[name='telefono']").val(),
        email: $("[name='email']").val(),
        fecha_llegada: $('#llegada').val(),
        fecha_salida: $('#salida').val()
    }
    console.log(email)
    $.ajax({
        url: '/reservar',
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('#token').val()},
        dataType: 'json',
        data: data,
    })
    .done(function(response) {
        if (response) {
            $("[name='nombre']").val(''),
            $("[name='apellidos']").val(''),
            $("[name='telefono']").val(''),
            $("[name='email']").val(''),
            $('#reservar_cabana').modal('hide')
        }
        swal("Su reservación ha sido guardada con éxito");
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
});


