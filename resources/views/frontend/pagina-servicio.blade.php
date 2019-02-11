@extends('frontend.layout')

@php
    $row_titulo = $row->titulo;
    $row_url = $row->url;
    $row_descripcion = $row->descripcion;
    $row_keywords = $row->keywords;
    $row_imagen_original = $row->imagen_original;
    $row_fecha_publicado = $row->created_at;
    $row_fecha_update = $row->updated_at;
    $row_contenido = $row->contenido;
@endphp

@section('titulo')
    {{ $row_titulo }} | @parent
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
@stop

@section('contenido_body')

    <!--Page title-->
    <section class="page-title" style="background-image:url({{ $row_imagen_original }})">
        <div class="container">
            <div class="outer-box">
                <h1>{{ $row_titulo }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/"><span class="fa fa-home"></span>Inicio</a></li>
                    <li class="active">Servicios</li>
                </ul>
            </div>        
        </div>
    </section>
    
    <!-- Project details -->
    <section class="project-details sp-four">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image mb-30">
                        <img src="{{ $row_imagen_original }}" alt="{{ $row_titulo }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content">
                        {!! $row_contenido !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <seccion-contacto></seccion-contacto>

    <seccion-blog></seccion-blog>
@stop

@section('contenido_footer')
@stop