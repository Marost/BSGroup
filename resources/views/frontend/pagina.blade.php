@extends('frontend.layout')

@php
	$row_titulo = $row->titulo;
	$row_url = $row->url;
	$row_descripcion = $row->descripcion;
	$row_keywords = $row->keywords;
	$row_imagen_original = $row->imagen_original;
	$row_fecha_publicado = $row->created_at;
	$row_fecha_update = $row->updated_at;
@endphp

@section('titulo')
	@if(Request::is('/') OR Request::is('home'))
		@parent
	@else
		{{ $row_titulo }} | @parent
	@endif
@stop

@section('contenido_header')
	<link rel="canonical" href="{{ $row_url }}" />

	<meta name="description" content="{{ $row_descripcion }}">
	<meta name="keywords" content="{{ $row_keywords }}">

	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{ $row_titulo }}" />
	<meta property="og:description" content="{{ $row_descripcion }}" />
	<meta property="og:url" content="{{ $row_url }}" />
	<meta property="og:image" content="{{ asset($row_imagen_original) }}" />

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="{{ $row_titulo }}">
	<meta name="twitter:description" content="{{ $row_descripcion }}">
	<meta name="twitter:image" content="{{ asset($row_imagen_original) }}">

	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "NewsArticle",
			"mainEntityOfPage": {
				"@type": "WebPage",
				"@id": "{{ $conf_web_dominio }}"
			},
			"headline": "{{ $row_titulo }}",
			"description": "{{ $row_descripcion }}",
			"image": [
				"{{ asset($row_imagen_original) }}"
			],
			"datePublished": "{{ $row_fecha_publicado }}",
			"dateModified": "{{ $row_fecha_update }}",
			"author": "{{ $conf_web_titulo }}",
			"publisher": {
				"@type": "Organization",
				"name": "{{ $conf_web_titulo }}",
				"logo": {
					"@type": "ImageObject",
					"url": "{{ asset($conf_web_logo) }}"
				}
			}
		}
	</script>

	<style>{!! $row->css !!}</style>
@stop

@section('contenido_body')
	@if($sliders->count() > 1)
		<section class="main-slider2">
			<div class="container-fluid">
				<ul class="main-slider-carousel owl-carousel owl-theme slide-nav">
					<li class="slider-wrapper">
						<div class="image"><img src="images/main-slider/image-1.jpg" alt=""></div>
						<div class="slider-caption text-center">
							<div class="container">
								<h2>Gestión Estratégica</h2>
								<div class="link-btn">
									<a href="#servicios" class="theme-btn btn-style-one">Nuestros servicios</a>
									<a href="#contacto" class="theme-btn btn-style-seven">Contacto</a>
								</div>
							</div>
						</div>
						<div class="slide-overlay"></div>
					</li>
					<li class="slider-wrapper">
						<div class="image"><img src="images/main-slider/image-2.jpg" alt=""></div>
						<div class="slider-caption text-center">
							<div class="container">
								<h1>Gestión Financiera y Tributaria</h1>
								<div class="link-btn">
									<a href="#servicios" class="theme-btn btn-style-one">Nuestros servicios</a>
									<a href="#contacto" class="theme-btn btn-style-seven">Contacto</a>
								</div>
							</div>
						</div>
						<div class="slide-overlay"></div>
					</li>
					<li class="slider-wrapper">
						<div class="image"><img src="images/main-slider/image-3.jpg" alt=""></div>
						<div class="slider-caption text-center">
							<div class="container">
								<h1>Gestión del Talento Humano</h1>
								<div class="link-btn">
									<a href="#servicios" class="theme-btn btn-style-one">Nuestros servicios</a>
									<a href="#contacto" class="theme-btn btn-style-seven">Contacto</a>
								</div>
							</div>
						</div>
						<div class="slide-overlay"></div>
					</li>
				</ul>
			</div>
		</section>
	@endif

	{!! $row->html !!}

	<seccion-contacto></seccion-contacto>

	<seccion-blog></seccion-blog>
@stop

@section('contenido_footer')
	@if($sliders->count() > 1)

	@endif
@stop