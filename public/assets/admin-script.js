/*-----------------------------------
CONFIGURACIONES GLOBALES
 -----------------------------------*/
toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-bottom-center",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
};

/*-----------------------------------
 CONFIGURACIONES
 -----------------------------------*/
//ELIMINAR TITULO
if($(".eliminar-titulo").length){
    $(".eliminar-titulo").on("click", function (e) {
        e.preventDefault();
        $("input[name='titulo']").val('');
    });
}

//ELIMINAR FECHA
if($(".eliminar-fecha").length){
    $(".eliminar-fecha").on("click", function (e) {
        e.preventDefault();
        $("input[name='rango-fechas']").val('');
        $("input[name='start']").val('');
        $("input[name='end']").val('');
    });
}

//ELIMINAR ESTADO
if($(".eliminar-estado").length){
    $(".eliminar-estado").on("click", function (e) {
        e.preventDefault();
        $("select[name='publicar']").val('');
    });
}

//ELIMINAR VISIBILIDAD
if($(".eliminar-visibilidad").length){
    $(".eliminar-visibilidad").on("click", function (e) {
        e.preventDefault();
        $("select[name='visibilidad']").val('');
    });
}

//SELECCION DE RANGO DE FECHAS
if($('.input-daterangepicker').length){
    //RANGO DE FECHASS
    var start = moment().subtract(29, 'days');
    var end = moment();
    $('.input-daterangepicker').daterangepicker({
        buttonClasses: 'm-btn btn',
        applyClass: 'btn-brand',
        cancelClass: 'btn-secondary',
        startDate: start,
        endDate: end,
        ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
            'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
            'Mes actual': [moment().startOf('month'), moment().endOf('month')],
            'Mes anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale: {
            format: 'DD/MM/YYYY',
            customRangeLabel: 'Seleccionar rango',
            daysOfWeek: ["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
            monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
                "Agosto","Septiembre","Octubre","Noviembre","Deciembre"],
            applyLabel: "Aplicar",
            cancelLabel: "Cancelar",
        }
    }, function(start, end, label) {
        $('.input-daterangepicker .form-control').val( start.format('DD/MM/YYYY') + ' / ' + end.format('DD/MM/YYYY'));
        $('.input-daterangepicker input[name="start"]').val(start.format('DD/MM/YYYY'));
        $('.input-daterangepicker input[name="end"]').val(end.format('DD/MM/YYYY'));
    });
}

//ELIMINAR REGISTROS
if($('.opcion-eliminar').length){
    $('.opcion-eliminar').click(function(e) {
        e.preventDefault();
        var row = $(this).parents("tr").length ? $(this).parents("tr") : $(this).parents("li");
        var id = row.data('id');
        var titulo = row.data('title');
        var url = row.data('url');

        swal({
            title: '¿Deseas eliminar este registro?',
            text: titulo,
            type: 'question',
            showCancelButton: true,
            confirmButtonText: 'SI',
            cancelButtonText: 'Cancelar'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {"id": id},
                    headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
                    beforeSend: function () {
                        mApp.block('#portlet-contenido', {
                            overlayColor: '#000000',
                            type: 'loader',
                            state: 'brand',
                            message: 'Procesando...',
                            opacity: 0.1
                        });
                    },
                    complete: function () {
                        mApp.unblock('#portlet-contenido');
                    },
                    success: function (response) {
                        if(response.success === true){
                            row.fadeOut();
                            swal(
                                '¡Eliminado!',
                                'El registro se eliminó con éxito.',
                                'success'
                            )
                        }else{
                            swal(
                                'Info',
                                response.message,
                                'info'
                            )
                        }
                    },
                    error: function (response) {
                        row.show();
                        swal(
                            'ERROR',
                            'Se produjo un error al eliminar registro.',
                            'error'
                        )
                    }
                });
            }
        });
    });
}

//CONTADOR CARACTERRES
if($('.contador-caracteres').length){
    $('.contador-caracteres').maxlength({
        alwaysShow: true,
        threshold: 5,
        warningClass: "m-badge m-badge--brand m-badge--rounded m-badge--wide",
        limitReachedClass: "m-badge m-badge--danger m-badge--rounded m-badge--wide"
    });
}

//PICKER DE FECHA
if($('.input-datetimepicker').length){
    $('.input-datetimepicker').datetimepicker({
        todayHighlight: true,
        autoclose: true,
        pickerPosition: 'bottom-left',
        todayBtn: true,
        format: 'dd/mm/yyyy hh:ii'
    });
}

//DROPZONE
if($('.dropzone').length){
    Dropzone.options.mDropzoneOne = {
        dictDefaultMessage: 'De click aquí para seleccionar una imagen.',
        dictMaxFilesExceeded: 'No se puede cargar más archivos.',
        headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
        maxFiles: 1,
        method: 'POST',
        url: '/admin/documentos/upload-imagen',
        success: function (file, result) {
            var archivo = result.archivo;
            var carpeta = result.carpeta;
            $('#upload_imagen').val(archivo);
            $('#upload_imagen_carpeta').val(carpeta);
            if($("#tab_foto").length)
            {
                usuarioFoto.datos.imagen = archivo;
                usuarioFoto.datos.imagen_carpeta = carpeta;
            }
        },
        errors: function (file) {
            alert('Se produjo un error. Intenten de nuevo refrescando la página.');
        }
    };
}

if($('.select-categoria').length){
    $('.select-categoria').select2({
        placeholder: "Selecciona una categoría"
    });
}

if($('.select-tag').length){
    $('.select-tag').select2({
        placeholder: "Selecciona las etiquetas relacionadas a la entrada",
        tags: true
    });
}

if($('.select-redsocial').length){
    $('.select-redsocial').select2({
        placeholder: "Selecciona una red social"
    });
}

//ORDENAR REGISTROS
if($("#sortable").length){
    $("#sortable").sortable({
        placeholder: "ui-state-highlight",
        serialize: { key: 'ordenar' },

        stop: function (evt, ui) {
            var form = $("#FormOrder");
            var url = form.attr('action');
            var data = form.serialize();

            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                beforeSend: function () {
                    mApp.block('#portlet-contenido', {
                        overlayColor: '#000000',
                        type: 'loader',
                        state: 'brand',
                        message: 'Procesando...',
                        opacity: 0.1
                    });
                },
                complete: function () {
                    mApp.unblock('#portlet-contenido');
                },
                success: function (success) {
                    swal({
                        type: 'success',
                        title: 'Los registros se ordenaron con éxito.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function (xhr) {
                    swal({
                        type: 'error',
                        title: 'Se produjo un error al procesar la solicitud.',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        }
    });

    $("#sortable").disableSelection();
}

//MENU
if($("#nestable").length){
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable().on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    $(".submit").on("click", function(e){
        e.preventDefault();
        var tipo = $(this).data('tipo');

        $.ajax({
            type: "POST",
            url: '/admin/configuracion/menu',
            data: $('form#'+tipo).serialize(),
            dataType: "json",
            headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
            cache : false,
            beforeSend: function () {
                mApp.block('#portlet-contenido', {
                    overlayColor: '#000000',
                    type: 'loader',
                    state: 'brand',
                    message: 'Procesando...',
                    opacity: 0.1
                });
            },
            complete: function () {
                mApp.unblock('#portlet-contenido');
            },
            success: function(data){
                $(".menu-id").append(data.menu);
                $('form#'+tipo).resetForm();
                swal({
                    type: 'success',
                    title: 'Se agregaron las opciones con éxito.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }, error: function(xhr, status, error) {
                swal({
                    type: 'error',
                    title: 'Se produjo un error al procesar la solicitud.',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    });

    $('.dd').on("change", function() {
        var dataString = {
            data : $("#nestable-output").val(),
        };

        $.ajax({
            type: "POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
            url: '/admin/configuracion/menu-change',
            data: dataString,
            cache : false,
            beforeSend: function () {
                mApp.block('#portlet-contenido', {
                    overlayColor: '#000000',
                    type: 'loader',
                    state: 'brand',
                    message: 'Procesando...',
                    opacity: 0.1
                });
            },
            complete: function () {
                mApp.unblock('#portlet-contenido');
            },
            success: function(data){
                swal({
                    type: 'success',
                    title: 'El menú se actualizó con éxito',
                    showConfirmButton: false,
                    timer: 1500
                });
            } ,error: function(xhr, status, error) {
                swal({
                    type: 'error',
                    title: 'Se produjo un error al procesar la solicitud.',
                    showConfirmButton: false,
                    timer: 2000
                });
            },
        });
    });

    $(".del-button").on("click", function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var titulo = $(this).data('titulo');

        swal({
            title: '¿Deseas eliminar este registro?',
            text: titulo,
            type: 'question',
            showCancelButton: true,
            confirmButtonText: 'SI',
            cancelButtonText: 'Cancelar'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
                    url: '/admin/configuracion/menu-delete',
                    data: { id : id },
                    cache : false,
                    beforeSend: function () {
                        mApp.block('#portlet-contenido', {
                            overlayColor: '#000000',
                            type: 'loader',
                            state: 'brand',
                            message: 'Procesando...',
                            opacity: 0.1
                        });
                    },
                    complete: function () {
                        mApp.unblock('#portlet-contenido');
                    },
                    success: function(data){
                        $("li[data-id='" + id +"']").remove();
                        swal(
                            '¡Eliminado!',
                            'El registro se eliminó con éxito.',
                            'success'
                        )
                    } ,error: function(xhr, status, error) {
                        swal(
                            'ERROR',
                            'Se produjo un error al eliminar registro.',
                            'error'
                        )
                    },
                });
            }
        });
    });
}

//BLOG HOME
if($("#blog_home").length)
{
    $("#blog_home").on("click", function (e) {
        e.preventDefault();
        var form = $("#blog_home_form");

        $.ajax({
            url: '/admin/blog/noticias',
            type: 'POST',
            data: form.serialize(),
            beforeSend: function () {
                mApp.block('#portlet-contenido', {
                    overlayColor: '#000000',
                    type: 'loader',
                    state: 'brand',
                    message: 'Procesando...',
                    opacity: 0.1
                });
            },
            complete: function () {
                mApp.unblock('#portlet-contenido');
            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'El registro se agregó con éxito.'
                });
                form.resetForm();
            },
            error: function (response) {
                swal({
                    type: 'error',
                    title: 'Se produjo un error al procesar la solicitud.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    })
}

//USUARIO
if($("#password-view").length)
{
    var passwordInput = $("input[name='password']");

    $("#password-view").on("click", function (e) {
        e.preventDefault();
        if(passwordInput.attr('type') === 'password'){
            passwordInput.attr('type', 'text');
            $(this).html('<i class="fa fa-eye-slash"></i> Ocultar');
        }else{
            passwordInput.attr('type', 'password');
            $(this).html('<i class="fa fa-eye"></i> Mostrar');
        }
    });

    $("#password-refresh").on("click", function (e) {
        e.preventDefault();
        $.ajax({
            url: '/admin/usuarios-generar-password',
            type: 'GET',
            success: function (response) {
                passwordInput.val(response);
                toastr.success("Se generó nueva contraseña.");
            }
        });
    })
}

if($("#listFotos").length)
{
    $("#listFotos").sortable({
        placeholder: "ui-state-highlight",
        handle : '.handle',
        serialize: { key: 'listFoto' },
        revert: true,

        stop: function(evt, ui){
            var form = $("#FormOrder");
            var url = form.attr('action');
            var data = form.serialize();

            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                beforeSend: function () {
                    mApp.block('#portlet-contenido', {
                        overlayColor: '#000000',
                        type: 'loader',
                        state: 'brand',
                        message: 'Procesando...',
                        opacity: 0.1
                    });
                },
                complete: function () {
                    mApp.unblock('#portlet-contenido');
                },
                success: function(success) {
                    toastr.success("Se generó nueva contraseña.");
                },
                error: function (xhr, textStatus, thrownError) {
                    toastr.error("Se produjo un error.");
                }
            });
        }
    });
}