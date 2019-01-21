<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="utf-8" />
	<title>Administrador</title>
	<meta name="description" content="Gestor de contenido">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="token" id="token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.0beta/css/icofont.css">

	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
        WebFont.load({
	        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
	        active: function() {
	            sessionStorage.fonts = true;
	        }
        });
	</script>
	<link href="/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
	<link href="/assets/admin-estilos.css" rel="stylesheet">

	@yield('contenido_header')
</head>
<body class="m-page--fluid m--skin- m-page--loading m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

@include('admin.layout.partials._loader-base')

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
@include('admin.layout.partials._header-base')
<!-- begin::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
		@include('admin.layout.partials._aside-left')

		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			@include('admin.layout.partials._subheader-default')

			<div class="m-content">

				@yield('contenido_body')

			</div>

		</div>
	</div>
	<!-- end:: Body -->
	@include('admin.layout.partials._footer-default')
</div>
<!-- end:: Page -->
@include('admin.layout.partials._layout-scroll-top')

<script src="/assets/vendors/base/vendors.bundle.min.js" type="text/javascript"></script>
<script src="/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="/assets/app/js/dashboard.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(window).on('load', function() {
        $('body').removeClass('m-page--loading');
    });
</script>

@yield('contenido_footer')

<script src="/assets/admin-script.js" type="text/javascript"></script>

</body>
</html>