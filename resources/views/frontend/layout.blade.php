<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>
		@section('titulo')
			{{ $conf_web_titulo }}
		@show
	</title>

	<meta name="robots" content="index,follow"/>
	<meta name='googlebot' content='index,follow'/>
	<meta property="fb:app_id" content="255520401560154">
	<meta name="token" id="token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
	<link rel="icon" sizes="96x96" href="{{ asset('favicon.png') }}">

	{{-- Enlace externos --}}
	{!! Html::style('https://allyoucan.cloud/cdn/icofont/1.0.0beta/css/icofont.css', ['crossorigin' => 'anonymous']) !!}
	{!! Html::style('https://s3.amazonaws.com/icomoon.io/114779/Socicon/style.css?u8vidh') !!}
	{!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css') !!}

	{{-- Enlaces Internos --}}
	{!! Html::style('css/estilos.css') !!}

	@yield('contenido_header')

	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@id": "{{ $conf_web_dominio }}",
			"@type": "Organization",
			"name": "{{ $conf_web_titulo }}",
			"url": "{{ $conf_web_dominio }}",
			"logo": "{{ asset($conf_web_logo) }}",
			"email": "{{ $conf_web_email->valor }}",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "{{ $conf_web_direccion->valor }}"
			},
			"contactPoint": [
				{
					"@type": "ContactPoint",
					"telephone": "{{ $conf_web_telefono->valor }}",
					"contactType": "customer support",
					"areaServed": [ "PE" ]
				}
			],
			"sameAs": [
				@php($data = [])
			@foreach($conf_redes as $social)
				@php($data[] = '"'.$social->enlace.'"')
			@endforeach
			{!! implode(',', $data) !!}
			]
		}
	</script>

</head>
<body>

	<nav class="navegacion-contenedor">
		<ul class="navegacion-contenedor__lista">
			@foreach ($conf_menus as $key => $item)
				@if ($item['parent'] != 0)
					@break
				@endif
				@include('partials.menu-item', ['item' => $item])
			@endforeach
		</ul>
	</nav>

	<div class="navegacion-redes">
		<div class="navegacion-redes__contenedor">
			<div class="redes-before"><a href="#" class="redes icon-sharp"></a></div>
			@foreach($conf_redes as $red)
				<div class="redes-before {{ strtolower($red->valor) }}">
					<a target="_blank" href="{{ $red->enlace }}" class="redes {{ $red->icono }}"></a>
				</div>
			@endforeach
		</div>
	</div>


@yield('contenido_body')

<footer class="footer footer-efecto">
<div class="footer-contenedor">
	<div class="footer_nexos footer_column">
		<ul>
			<li class="title">{{ $conf_web_titulo }}</li>
			<li class="info">{{ $conf_footer }}</li>
		</ul>
		<ul class="column_redes">
			<li class="column_redes__title">Síguenos</li>
			@foreach($conf_redes as $red)
				<li class="iconos"><a href="{{ $red->enlace }}" target="_blank" class="redes"><span class="{{ $red->icono }}"></span></a></li>
			@endforeach
		</ul>

	</div>
	<div class="footer_informacion footer_column">
		<ul>
			<li class="title">Información de Contacto</li>
			<li><span class="icofont {{ $conf_web_direccion->icono }}"></span> {{ $conf_web_direccion->valor }}</li>
			<li><span class="icofont {{ $conf_web_telefono->icono }}"></span> {{ $conf_web_telefono->valor }}</li>
			<li><span class="icofont {{ $conf_web_email->icono }}"></span> {{ $conf_web_email->valor }}</li>
		</ul>
	</div>
	<div class="footer_mapa footer_column">
		<ul>
			<li class="title">Mapa del Sitio</li>
			<li><a href="/">Inicio</a></li>
		</ul>
	</div>
</div>
<div class="footer-redes">
	<p class="footer-redes__titulo">Copyright © 2018 - {{ $conf_web_titulo }} - Todos los derechos reservados.</p>
</div>
</footer>

{{-- Enlaces Externos --}}
{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') !!}
{!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js') !!}

{!! Html::script('js/forms.js') !!}

{!! $conf_script !!}

@yield('contenido_footer')

</body>
</html>