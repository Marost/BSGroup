@extends('frontend.layout')

@section('titulo')
	{{ $row->titulo }} | @parent
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	<section class="page-title" style="background-image:url(/images/background/3.jpg)">
		<div class="container">
			<div class="outer-box">
				<h1>Blog: {{ $row->titulo }}</h1>
				<ul class="bread-crumb clearfix">
					<li><a href="/"><span class="fa fa-home"></span>Inicio</a></li>
					<li class="active">Blog - Categoria</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="blog-section sp-two">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						@foreach($rows as $row)
						<div class="col-md-6 news-block-two">
							<div class="inner-box hvr-float-shadow">
								<div class="image">
									<img src="{{ $row->imagen_blog }}" alt="">
									<div class="overlay">
										<a class="link-btn" href="{{ $row->url }}">
											<i class="fa fa-link"></i>
										</a>
									</div>
								</div>
								<div class="lower-content">
									<h4><a href="{{ $row->url }}">{{ $row->titulo }}</a></h4>
									<div class="text">{{ $row->descripcion }}</div>
									<div class="link-btn">
										<a href="{{ $row->url }}" class="read-more-btn">Seguir leyendo <span class="fa fa-long-arrow-right"></span></a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-4">
					<aside class="sidebar">
						@include('frontend.widgets.blog')
					</aside>
				</div>
			</div>
		</div>
	</section>
@stop

@section('contenido_footer')

@stop