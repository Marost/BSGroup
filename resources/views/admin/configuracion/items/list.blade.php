@extends('admin.layout.index')

@section('contenido_titulo')
	{{ ucfirst($url) }}
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	<div id="portlet-contenido" class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Lista de registros
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<!--begin: Datatable -->
			<div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded">
				<table class="table m-table table-striped m-table--head-bg-brand table-bordered m-table m-table--border-brand">
					<thead>
					<tr>
						<th>Titulo</th>
						@if($url == 'redes-sociales')<th width="40%" class="text-center">Enlace</th>@endif
						<th width="15%" class="text-center">Acciones</th>
					</tr>
					</thead>
					<tbody>
					@foreach($rows as $item)
						@php
							$row_id = $item->id;
							$row_titulo = $item->valor;

							if($url == 'redes-sociales'){ $row_enlace = $item->enlace ? $item->enlace : ''; }
						@endphp
						<tr data-id="{{ $row_id }}" data-title="{{ $row_titulo }}" data-url="/admin/configuracion/url/{{ $url }}/items/{{ $row_id }}">
							<td>{{ $row_titulo }}</td>
							@if($url == 'redes-sociales')
							<td class="text-center"><a href="{{ $row_enlace }}" target="_blank">{{ $row_enlace }}</a></td>
							@endif
							<td class="text-center">
								<div class="btn-group">
									<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Acciones
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="{{ route('admin.configuracion.url.items.edit', [$url, $row_id]) }}">Editar</a>
										<a class="dropdown-item opcion-eliminar" href="#">Eliminar</a>
									</div>
								</div>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<!--end: Datatable -->
		</div>
	</div>
@stop

@section('contenido_footer')
@stop
