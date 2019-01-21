@extends('admin.layout.index')

@section('contenido_titulo')
	{{ ucfirst($url) }}
@stop

@section('contenido_header')
	<style>
		#sortable { list-style-type: none; margin: 0; padding: 0; cursor:s-resize; }
		#sortable li { margin: 0 0 10px 0; font-size: 1.2em; }
		#sortable li .m-accordion__item-head{ cursor:s-resize; }
		html>body #sortable li { line-height: 1.2em; }
		.ui-state-highlight { line-height: 1.2em; height: 1.5em; }
	</style>
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	<div id="portlet-contenido" class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Ordenar registros
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<!--begin::Section-->
			{!! Form::open(['route' => ['admin.configuracion.url.items.order.update', $url], 'method' => 'POST', 'id' => 'FormOrder']) !!}
				<ul id="sortable" class="m-accordion m-accordion--default m-accordion--solid">
					@foreach($rows as $item)
						@php
							$row_id = $item->id;
							$row_titulo = $item->valor;
						@endphp
						<li class="ui-state-default m-accordion__item">
							<div class="m-accordion__item-head" >
								<input type="hidden" name="ordenar[]" value="{{ $row_id }}">
								<span class="m-accordion__item-icon"><i class="fa flaticon-shapes"></i></span>
								<span class="m-accordion__item-title">{{ $row_titulo }}</span>
							</div>
						</li>
					@endforeach
				</ul>
			{!! Form::close() !!}
			<!--end::Item-->
		</div>
		<!--end::Section-->
	</div>

@endsection

@section('contenido_footer')
@endsection