//require('./bootstrap');

$('#reservar').click(function(event) {
    var llegada = $('#llegada').val()
    var salida = $('#salida').val()
    var cabana_id = $('#cabana_select').val()
    if (llegada != '' && salida != '' && cabana_id != '') {
        $.ajax({
            url: '/disponibilidad',
            type: 'GET',
            dataType: 'json',
            data: {llegada: llegada, salida: salida, cabana_id: cabana_id},
        })
        .done(function(disponibilidad) {
            if (disponibilidad) {
                console.log("HOLA")
                $('#reservar_cabana').modal('show')
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
        alert("Selecciona los datos para checar disponibilidad")
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
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
});


