<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Error</title>

	<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
	<link rel="icon" sizes="96x96" href="{{ asset('favicon.png') }}">

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
</head>
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="m-grid__item m-grid__item--fluid m-grid  m-error-1" style="background-image: url(/assets/app/media/img/error/bg1.jpg);">
		<div class="m-error_container">
					<span class="m-error_number">
						<h1>
							404
						</h1>
					</span>
			<p class="m-error_desc">
				El enlace no está disponible
			</p>
			<p class="m-error_desc m--font-boldest">
				<a href="/">Ir a la Página principal</a>
			</p>
		</div>
	</div>
</div>
<script src="/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
</body>
</html>
