@extends('admin.layout.index')

@section('contenido_titulo')
	Páginas
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
							<th>URL</th>
							<th class="text-center">Estado</th>
							<th class="text-center">Acciones</th>
						</tr>
					</thead>
					<tbody>
					@foreach($rows as $item)
						@php
							$row_id = $item->id;
							$row_url = $item->slug_url;
							$row_titulo = $item->titulo;
							$row_publicar = $item->publicar ?
							'<div class="m-badge m-badge--success m-badge--wide m-badge--rounded">Publicado</div>' :
							'<div class="m-badge m-badge--warning m-badge--wide m-badge--rounded">No publicado</div>';
						@endphp
						<tr data-id="{{ $row_id }}" data-title="{{ $row_titulo }}" data-url="/admin/paginas/{{ $row_id }}">
							<td>{!! '<span class="m--font-bolder"> '.$row_titulo.'</span>' !!}</td>
							<td>
								<a class="copy-button" data-clipboard-text="{!! Request::root().'/'.$row_url !!}" href="#" title="Copiar URL"><i class="la la-copy"></i></a>
								<span>{{ $row_url }}</span>
							</td>
							<td class="text-center">{!! $row_publicar !!}</td>
							<td class="text-center">
								<div class="btn-group">
									<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Acciones
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="{{ route('admin.paginas.editar', $row_id) }}">Editar Página</a>
										<a class="dropdown-item" href="{{ route('admin.paginas.edit', $row_id) }}">Editar Metadata</a>
										<a class="dropdown-item" href="{{ route('admin.paginas.items.index', $row_id) }}">Slider</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('admin.paginas.duplicar', $row_id) }}">Duplicar registro</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item opcion-eliminar" href="#">Eliminar</a>
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
	{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js') !!}
	<script>
        var clipboard = new Clipboard('.copy-button');
        clipboard.on('success', function(e) {
            alert('El URL se copio a tu portapapeles.');
            console.log(e);
        });
        clipboard.on('error', function(e) {
            alert('Se produjo un error.');
            console.log(e);
        });
	</script>
@stop