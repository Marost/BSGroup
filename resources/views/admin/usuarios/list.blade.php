@extends('admin.layout.index')

@section('contenido_titulo')
	Usuarios
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
							<th>Nombre</th>
							<th class="text-center">Email</th>
							<th class="text-center">Estado</th>
							<th class="text-center">Acciones</th>
						</tr>
					</thead>
					<tbody>
					@foreach($rows as $item)
						@php
							$row_id = $item->id;
							$row_titulo = $item->nombre_completo;
							$row_email = $item->email;
							$row_estado = $item->estado ?
							'<div class="m-badge m-badge--brand m-badge--wide m-badge--rounded">Activo</div>' :
							'<div class="m-badge m-badge--warning m-badge--wide m-badge--rounded">Inactivo</div>';
						@endphp
						<tr data-id="{{ $row_id }}" data-title="{{ $row_titulo }}" data-url="/admin/usuarios/{{ $row_id }}">
							<td>{!! $row_titulo !!}</td>
							<td class="text-center">{{ $row_email }}</td>
							<td class="text-center">{!! $row_estado !!}</td>
							<td class="text-center">
								<div class="btn-group">
									<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Acciones
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="{{ route('admin.usuarios.edit', $row_id) }}">Editar</a>
										<a class="dropdown-item" href="{{ route('admin.usuarios.password.cambiar', $row_id) }}">Cambiar contraseña</a>
										{{--<a class="dropdown-item opcion-eliminar" href="#">Eliminar</a>--}}
									</div>
								</div>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="m-datatable__pager m-datatable--paging-loaded clearfix">
					{!! $rows->appends(Request::all())->render('vendor.pagination.admin') !!}
					<div class="m-datatable__pager-info">
						<span class="m-datatable__pager-detail">Mostrando {{ $rows->firstItem() }} - {{ $rows->lastItem() }} de {{ $rows->total() }} registros</span>
					</div>
				</div>
			</div>
			<!--end: Datatable -->
		</div>
	</div>
@stop

@section('contenido_footer')
@stop