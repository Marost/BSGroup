@extends('frontend.layout')

@php
	$nota_titulo = $row->titulo;
	$nota_url = $row->url;
	$nota_descripcion = $row->descripcion;
	$nota_contenido = $row->contenido;
	$nota_imagen_or = $row->imagen_original;
	$nota_imagen = $row->imagen_noticia;
	$nota_fecha = $row->fecha;
@endphp

@section('titulo')
	{{ $nota_titulo }} | @parent
@stop

@section('contenido_header')
	{{-- Meta Tags --}}
	<meta name="description" content="{{ $nota_descripcion }}">

	{{-- Open Graph --}}
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{ $nota_titulo }}">
	<meta property="og:url" content="{{ $nota_url }}">
	<meta property="og:image" content="{{ asset($nota_imagen_or) }}">
	<meta property="og:description" content="{{ $nota_descripcion }}">

	{{-- Twitter Card --}}
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="{{ $nota_titulo }}">
	<meta name="twitter:image" content="{{ asset($nota_imagen_or) }}">
	<meta name="twitter:description" content="{{ $nota_descripcion }}">

	{{-- JSON-LD --}}
	<script type="application/ld+json">
		{
		  "@context": "http://schema.org/",
		  "@type": "NewsArticle",
		  "headline": "{{ $nota_titulo }}",
		  "description": "{{ $nota_descripcion }}",
		  "image": {
		    "@type": "ImageObject",
		    "height": "200",
		    "width": "200",
		    "url": "{{ asset($nota_imagen_or) }}"
		  },
		  "articleBody": "{!! $nota_contenido !!}"
		}
	</script>
@stop

@section('contenido_body')
	<section class="page-title" style="background-image:url(/images/background/3.jpg)">
		<div class="container">
			<div class="outer-box">
				<h1>Blog</h1>
				<ul class="bread-crumb clearfix">
					<li><a href="/"><span class="fa fa-home"></span>Inicio</a></li>
					<li class="active">Blog</li>
				</ul>
			</div>
		</div>
	</section>

	<div class="blog single-post sp-two">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="news-block-three">
						<div class="inner-box">
							<div class="lower-content">
								<h2>{{ $nota_titulo }}</h2>
								<div class="post-meta">{{ $nota_descripcion }}</div>
								<ul class="opciones">
									@if($row->categoria)
									<li>
										<a href="{{ $row->categoria->url }}">
											<i class="fa fa-tag" aria-hidden="true"></i> {{ $row->categoria->titulo }}
										</a>
									</li>
									@endif
									<li>
										<i class="fa fa-calendar-o" aria-hidden="true"></i> {{ $nota_fecha }}
									</li>
								</ul>
							</div>
							<div class="image">
								<img src="{{ $nota_imagen_or }}" alt="{{ $nota_titulo }}">
							</div>
							<div class="lower-content">
								<div class="text">
									{!! $nota_contenido !!}
								</div>
							</div>

							<ul class="share-box">
								@foreach($row->tags as $tag)
								<li><a href="{{ $tag->url }}">{{ $tag->titulo }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<aside class="sidebar">
						@include('frontend.widgets.blog')
					</aside>
				</div>

			</div>
		</div>
	</div>
@stop

@section('contenido_footer')
	<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c661e1f0c169bd3"></script>
@stop