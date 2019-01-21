@extends('frontend.layout')

@php
	$titulo = $row->titulo;
@endphp

@section('titulo')
	{{ $titulo }} | @parent
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	<div class="container">

		<!-- Page title -->
		<div class="page-title">
			<h1>{{ $titulo }}</h1>
		</div>


		<div id="blog" class="m-b-30">

			<div id="row-1" class="row"></div>
			<div id="row-2" class="row"></div>
			<div id="row-3" class="row"></div>

			@foreach($rows as $key => $row)
				<div id="item-{{ $key + 1 }}" class="post-item col-md-4 border">
					<div class="post-item-wrap">
						<div class="post-image">
							<a href="{{ $row->url }}">
								<img alt="" src="{{ $row->imagen_blog }}">
							</a>
							@if ($row->blog_categoria_id <> 0)
								<span class="post-meta-category"><a href="{{ $row->categoria->url }}">{{ $row->categoria->titulo }}</a></span>
							@endif
						</div>
						<div class="post-item-description">
							<span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{ $row->fecha }}</span>
							<h2><a href="{{ $row->url }}">{{ $row->titulo }}</a></h2>
							<p>{{ $row->descripcion }}</p>
							<a href="{{ $row->url }}" class="item-link">Seguir leyendo <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			@endforeach

		</div>

		<div class="pagination pagination-simple">
			{!! $rows->appends(Request::all())->render() !!}
		</div>

	</div>
@stop

@section('contenido_footer')
	<script>
        $("#row-1").prepend($("#item-3")).prepend($("#item-2")).prepend($("#item-1"));
        $("#row-2").prepend($("#item-6")).prepend($("#item-5")).prepend($("#item-4"));
        $("#row-3").prepend($("#item-9")).prepend($("#item-8")).prepend($("#item-7"));
	</script>
@stop