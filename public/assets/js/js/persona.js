$(document).ready(function () {
    $('#btn-nueva-persona').click(function () {
        let boton = $(this);
        boton.prop('disabled', true);
        $.get('/persona/create')
        .done(function (vista) {
            $('#mdl-contenido').html(vista);
            $('#exampleModal').modal('show');
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        })
        .always(function () {
            setTimeout(function () {
                boton.prop('disabled', false);
            }, 1000);
        });
    });
    // $('#btn-nueva-persona')
    // .on('click', function () {
    //     $('#modal-persona').modal('show');
    // })
    // .on('change', function () {
        
    // })
    $('#exampleModal').on('submit', '#frm-persona', function (e) {
        e.preventDefault();
        let form = $(this);
        let boton = $('#btn btn-primary');
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var estado = $('#estado').val();

            nombre
            if (nombre === ''){
                alert('Por favor ingrese su nombre');
                return;
            }
            if (/^[a-zA-Z]+$/.test(nombre) === false){
                alert('El nombre solo puede contener letras')
                return;
            }

            //apellido
            if(apellido === ''){
                alert('Por favor ingrese su apellido');
                return;
            }
            if(/^[a-zA-Z]+$/.test(apellido) === false){
                alert('El apellido solo puede contener letras')
                return;
            }
            //estado
            if(estado === ''){
                alert('Por favor ingrese se estado')
                return;
            }
            
            // //Si todo esta correcto
            // alert('Formulario enviado correctamente');
            // this.submit();
        
            boton.prop('disabled', true);
        // let data = {
        //     nombre: $('#nombre').val(),
        //     apellido: $('#apellido').val(),
        // }
        // let data = form.serialize();
        let data = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/persona',
            data: data,
            processData: false,
            contentType: false,
        })
        .done(function (respuesta) {
            if (respuesta.status == 'success') {
                $('#exampleModal').modal('hide');
                alert(respuesta.message + ' ' + respuesta.data.id);
                window.reload();
                // $('#tbl-persona').DataTable().ajax.reload();
                // toastr.success(respuesta.mensaje);
            } else {
                // toastr.error(respuesta.mensaje);
                let mensajes = '';
                $.each(respuesta.message, function (index, value) {
                    mensajes += value + ' ';
                });
                alert(mensajes);
                console.log(respuesta.message);
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {})
        .always(function () {
            boton.prop('disabled', false);
        });

    });
    $('#tbl-personas')
    .on('click', '.btn-eliminar', function () {
        let id = $(this).data('id');
        // id = $(this).attr('data-id');
        $.get(`eliminar/${id}`)
        .done(function (respuesta) {
            alert(respuesta.message);
            // if (respuesta.status == 'success') {
            //     // $('#tbl-personas').DataTable().ajax.reload();
            // } else {
            //     alert(respuesta.message);
            // }
        })
        .fail(function (xhr, textStatus, errorThrown) {
            alert('Peticion Fallada');
            console.log(xhr, textStatus, errorThrown);
        })
    })
    .on('click', '.btn-editar', function(){
        let id = $(this).data('id');
        let datos = $('#frm-persona');

        $.get(`editar/${id}`)
        .done(function (respuesta) {
            // console.log(respuesta);
            // return;
            // datos.find('#nombre').val($(this).datos('nombre'));
            // datos.find('#apellido').val($(this).datos('apellido'));
            // datos.find('#fecha_registro').val($(this).datos('fecha_registro'));
            // datos.find('#estado').val($(this).datos('estado'));      
            $('#mdl-contenido').html(respuesta.data.vista);
            $('#nombre').val(respuesta.data.nombre);
            $('#apellido').val(respuesta.data.apellido);
            $('#estado').val(respuesta.data.estado);
            $('#exampleModal').modal('show');
        })
    });
    $

});