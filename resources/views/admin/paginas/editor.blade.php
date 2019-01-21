<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Editor</title>
	<meta name="description" content="Gestor de contenido">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="token" id="token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
	<link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
	<link rel="stylesheet" href="/assets/app/plugins/grapesjs/addons/grapesjs-preset-webpage.min.css">

	<script type="text/javascript" src="https://dme0ih8comzn4.cloudfront.net/imaging/v3/editor.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://unpkg.com/grapesjs"></script>
	<script src="/assets/app/plugins/grapesjs/addons/grapesjs-preset-webpage.min.js"></script>
	<script src="/assets/app/plugins/grapesjs/addons/grapesjs-blocks-basic.min.js"></script>
	<script src="/assets/app/plugins/grapesjs/addons/grapesjs-aviary.min.js"></script>

	<style>
		html, body{
			padding: 0;
			margin: 0;
		}

		.gjs-am-file-uploader,
		.gjs-am-assets-cont,
		.gjs-am-preview-cont{
			width: 100%;
		}

		.gjs-am-preview-cont{
			height: 100px;
		}

		.gjs-am-preview{
			background-size: contain;
		}

		.gjs-am-assets-header,
		.gjs-pn-commands .gjs-pn-buttons, #gjs-pn-commands .gjs-pn-buttons{
			display: none;
		}

		.gjs-am-file-uploader #gjs-am-title,
		.gjs-am-file-uploader>form #gjs-am-uploadFile{
			padding: 50px 10px;
		}

		.gjs-am-asset{
			width: 25%;
		}

		.gjs-am-assets-cont{
			height: 495px;
		}

		.gjs-am-assets{
			height: 486px;
		}

		.gjs-pn-panel#gjs-pn-views-container, .gjs-pn-panel.gjs-pn-views-container{
			height: calc(100% - 150px);
		}

		.gjs-logo {
			height: 25px;
		}

		.gjs-logo-cont {
			position: relative;
			display: inline-block;
			top: 3px;
		}

		.gjs-logo-cont a{
			color: #fff;
			text-decoration: none;
		}

		.barra {
			position: absolute;
			right: 0;
			bottom: 0;
			z-index: 2;
			width: 15%;
			height: 150px;
		}

		.barra a{
			font-family: Helvetica,sans-serif;
			display: block;
			padding: 20px 0;
			text-align: center;
			width: 90%;
			margin: 10px auto;
			border-radius: 7px;
			color: #fff;
			text-decoration: none;
			text-transform: uppercase;
		}

		.barra a#pagina-guardar{
			background-color: #009688;
		}

		.barra a#pagina-regresar{
			background-color: #F44336;
		}

	</style>
</head>
<body data-id="{{ $id }}">

<div class="gjs-logo-cont">
	<a href="http://chilcanoweb.com" target="_blank">
		<img class="gjs-logo" src="/assets/admin-logo-nombre.png"><i style="display: none;" class="fa fa-spinner fa-spin fa-2x fa-fw"></i>
	</a>
</div>

<div class="barra">
	<a id="pagina-guardar" href="#"><i class="fa fa-save"></i> Guardar <i style="display: none;" class="fa fa-spinner fa-spin fa-fw"></i></a>
	<a id="pagina-regresar" href="{{ route('admin.paginas.index') }}"><i class="fa fa-arrow-left"></i> Regresar</a>
</div>

<div id="gjs"></div>

{{-- GrapesJS --}}
<script type="text/javascript">
    //VARIABLE DE ID
	var pageID = $("body").data('id');

    //EDITOR
	var editor = grapesjs.init({
		height: '100vh',
        container : '#gjs',
        showOffsets: 1,
        noticeOnUnload: 0,
        fromElement: true,
		components: '',
        style: '',
		canvas: {
            styles: [],
			scripts: []
		},
        plugins: ['gjs-preset-webpage','gjs-aviary'],
        pluginsOpts: {
            'gjs-blocks-basic': {
                blocks: ['text', 'link', 'image']
            },
            'gjs-aviary': {
                config: {
                    key: 'd1209333b9e644cc96ba45401b785b9a'
                },
                onApply: function(url, filename, imageModel) {
                    $.ajax({
                        url: '/admin/documentos/copiar-archivo',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                        },
                        data: {
                            'url': url,
	                        'nombre': filename
                        },
                        success: function(result){
                            editor.AssetManager.add(result);
                            imageModel.set('src', result);
                        }
                    });
                },
                getFilename: function(model) {
                    var name = model.get('src').split('/').pop();
                    return Date.now() + '_' + name.slice(-15);
                }
            }
        },
        assetManager: {
            upload: true,
	        uploadName: 'file',
            uploadText: 'Suelta los archivos aquí o haz clic para cargar',
            modalTitle: 'Seleccionar imagen',
            uploadFile: function(e) {
                var files = e.dataTransfer ? e.dataTransfer.files : e.target.files;
                var formData = new FormData();
                formData.append('file', files[0]);

                $.ajax({
	                url: '/admin/documentos/upload-imagen-grapes',
                    type: 'POST',
	                headers: {
                        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
	                },
                    data: formData,
                    contentType: false,
                    crossDomain: true,
                    mimeType: "multipart/form-data",
                    processData:false,
                    success: function(result){
                        var images = result;
                        editor.AssetManager.add(images);
                    }
                });

            }
        },
        storageManager: {
            type: 'remote',
            autoload: true,
            autosave: false,
            contentTypeJson: true,
            urlLoad: '/admin/paginas/'+pageID,
            urlStore: '/admin/paginas-save/'+pageID,
	        params: {
                _token: $('meta[name="token"]').attr('content')
	        }
        }
    });

    //COMANDO PARA GUARDAR
    editor.Commands.add('save-db',{
        run: function(editor, sender){
            editor.store();
	        editor.on('storage:end', function () {
                $(".fa-spinner").hide();
                alert('Los cambios se guardaron con éxito.');
            });
        }
    });

    //GUARDAR PAGINA
    $("#pagina-guardar").on("click", function (e) {
        e.preventDefault();
        $(".fa-spinner").show();
        editor.runCommand('save-db');
    });

    //CARGAR AL INICIALIZAR PAGINA
    editor.on('load', function() {
        var $ = grapesjs.$;

        //AGREGAR LOGO
        var logoCont = document.querySelector('.gjs-logo-cont');
        var logoPanel = document.querySelector('.gjs-pn-commands');
        logoPanel.appendChild(logoCont);

        //AGREGAR BARRA CON BOTONES
        $('#gjs').append($('.barra'));
    });
</script>
</body>
</html>