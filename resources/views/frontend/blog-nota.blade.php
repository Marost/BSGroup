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
	<div class="container">
		<div class="row">
			{{-- NOTICIA --}}
			<div class="content col-md-9">
				<!-- Blog -->
				<div id="blog" class="single-post">
					<!-- Post single item-->
					<div class="post-item">
						<div class="post-item-wrap">
							<div class="post-item-description">
								<h2>{{ $nota_titulo }}</h2>
								<div class="post-meta">
									<span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{ $nota_fecha }}</span>

									@if($row->blog_categoria_id <> '')
										<span class="post-meta-category">
											<a href="{{ $row->categoria->url }}"><i class="fa fa-tag"></i>{{ $row->categoria->titulo }}</a>
										</span>
									@endif

									<div class="post-meta-share">
										<div class="addthis_inline_share_toolbox"
										     data-url="{{ $nota_url }}"
										     data-title="{{ $nota_titulo }}"
										     data-description="{{ $nota_descripcion }}"
										     data-media="{{ asset($nota_imagen) }}"></div>
									</div>
								</div>

								<div class="post-image">
									<img alt="{{ $nota_titulo }}" src="{{ $nota_imagen }}">
								</div>

								{!! $nota_contenido !!}

							</div>
							@if($row->tags->count() > 0)
								<div class="post-tags">
									@foreach($row->tags as $tag)
										<a href="{{ $tag->url }}">{{ $tag->titulo }}</a>
									@endforeach
								</div>
							@endif
						</div>
					</div>
					<!-- end: Post single item-->
				</div>

			</div>
			{{-- FIN NOTICIA --}}

			{{-- SIDEBAR --}}
			<div class="sidebar col-md-3 mt-30">
				<div class="pinOnScroll">

					{{-- TABS NOTICIAS --}}
					<div class="widget">
						<div id="tabs-01" class="tabs simple">
							<ul class="tabs-navigation">
								<li class="active"><a href="#recientes">Recientes</a> </li>
								<li class=""><a href="#relacionadas">Relacionadas</a> </li>
							</ul>
							<div class="tabs-content">
								<div class="tab-pane active" id="recientes">
									<div class="post-thumbnail-list">
										@foreach($recientes as $item)
											<div class="post-thumbnail-entry">
												<img alt="{{ $item->titulo }}" src="{{ $item->imagen_sidebar }}">
												<div class="post-thumbnail-content">
													<a href="{{ $item->url }}">{{ $item->titulo }}</a>
													<span class="post-date"><i class="fa fa-clock-o"></i> {{ $item->fecha }}</span>
													@if($item->blog_categoria_id <> '')
														<span class="post-category"><i class="fa fa-tag"></i> {{ $item->categoria->titulo }}</span>
													@endif
												</div>
											</div>
										@endforeach
									</div>
								</div>
								<div class="tab-pane" id="relacionadas">
									<div class="post-thumbnail-list">
										@foreach($relacionadas as $item)
											<div class="post-thumbnail-entry">
												<img alt="{{ $item->titulo }}" src="{{ $item->imagen_sidebar }}">
												<div class="post-thumbnail-content">
													<a href="{{ $item->url }}">{{ $item->titulo }}</a>
													<span class="post-date"><i class="fa fa-clock-o"></i> {{ $item->fecha }}</span>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- FIN TABS NOTICIAS --}}

					{{-- TAGS --}}
					<div class="widget  widget-tags">
						<h4 class="widget-title">Etiquetas</h4>
						<div class="tags">
							@foreach($tags as $tag)
								<a href="{{ $tag->url }}">{{ $tag->titulo }}</a>
							@endforeach
						</div>
					</div>
					{{-- FIN TAGS --}}

				</div>
			</div>
		</div>
	</div>
@stop

@section('contenido_footer')
@stop