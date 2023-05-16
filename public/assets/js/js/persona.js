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
    $('#exampleModal').on('submit', '#frm-perona', function (e) {
        e.preventDefault();
        let form = $(this);
        let boton = $('#btn btn-primary');
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var estado = $('#estado').val();

            //nombre
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
            
            //Si todo esta correcto
            alert('Formulrio enviado correctamente');
            this.submit();
        
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
                console.log(respuesta.message);
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {})
        .always(function () {
            boton.prop('disabled', false);
        });
    });
});