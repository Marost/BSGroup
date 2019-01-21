@extends('admin.layout.index')

@php
	if(Request::input('titulo') <> "" OR Request::input('start') <> "" OR
		Request::input('end') <> "" OR Request::input('publicar') <> "" OR Request::input('visibilidad') <> ""){
		$buscar = true;
	}else{
		$buscar = false;
	}

	if(Request::input('start') <> "" AND Request::input('end')){
		$fecha = Request::input('start').' / '.Request::input('end');
	}else{ $fecha = ''; }
@endphp

@section('contenido_titulo')
	Noticias
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
			<!--begin: Search Form -->
			<div class="m-form m-form--label-align-right m--margin-bottom-30">
				<div class="m-accordion m-accordion--default m-accordion--solid" id="m_accordion_5" role="tablist">
					<!--begin::Item-->
					<div class="m-accordion__item m-accordion__item--brand">
						<div class="m-accordion__item-head {!! $buscar == true ? '' : 'collapsed' !!}"  role="tab" id="m_accordion_5_item_1_head" data-toggle="collapse" href="#m_accordion_5_item_1_body" aria-expanded='{!! $buscar == true ? 'true' : 'false' !!}'>
							<span class="m-accordion__item-icon"><i class="fa flaticon-search-magnifier-interface-symbol"></i></span>
							<span class="m-accordion__item-title">Buscar</span>
							<span class="m-accordion__item-mode"><i class="la la-plus"></i></span>
						</div>
						<div class="m-accordion__item-body {!! $buscar == true ? '' : 'collapse' !!}" id="m_accordion_5_item_1_body" role="tabpanel" aria-labelledby="m_accordion_5_item_1_head" data-parent="#m_accordion_5">
							{!! Form::model(Request::all(), ['route' => 'admin.blog.noticias.index', 'method' => 'GET', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) !!}
								<div class="m-portlet__body">
									<div class="form-group m-form__group row">
										<div class="col-lg-3">
											<label>Titulo</label>
											{!! Form::text('titulo', null, ['class' => 'form-control m-input']) !!}
											<span class="m-form__help"><a href="#" class="eliminar-titulo">Eliminar titulo</a></span>
										</div>
										<div class="col-lg-3">
											<label>Fecha de publicación</label>
											<div class='input-group input-daterangepicker'>
												<input name="rango-fechas" type='text' class="form-control m-input" readonly placeholder="Seleccionar rango de fechas" value="{{ $fecha }}"/>
												{!! Form::hidden('start') !!}
												{!! Form::hidden('end') !!}
												<span class="input-group-addon">
													<i class="la la-calendar-check-o"></i>
												</span>
											</div>
											<span class="m-form__help"><a href="#" class="eliminar-fecha">Eliminar fecha de publicación</a></span>
										</div>
										<div class="col-lg-3">
											<label>Estado</label>
											{!! Form::select('publicar', ['' => 'Seleccionar', '0' => 'Borrador', '1' => 'Publicado'], null, ['class' => 'form-control']) !!}
											<span class="m-form__help"><a href="#" class="eliminar-estado">Eliminar estado</a></span>
										</div>
										<div class="col-lg-3">
											<label>Visibilidad</label>
											{!! Form::select('visibilidad', ['' => 'Seleccionar', true => 'Publico', false => 'Privado'], null, ['class' => 'form-control']) !!}
											<span class="m-form__help"><a href="#" class="eliminar-visibilidad">Eliminar visibilidad</a></span>
										</div>
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
									<div class="m-form__actions m-form__actions--solid">
										<div class="row">
											<div class="col-lg-5"></div>
											<div class="col-lg-7">
												<button type="submit" class="btn btn-brand">Buscar</button>
												<a href="{{ route('admin.blog.noticias.index') }}" class="btn btn-secondary">Cancelar</a>
											</div>
										</div>
									</div>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
					<!--end::Item-->
				</div>
			</div>
			<!--end: Search Form -->
			<!--begin: Datatable -->
			<div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded">
				<table class="table m-table table-striped m-table--head-bg-brand table-bordered m-table m-table--border-brand">
					<thead>
						<tr>
							<th>Titulo</th>
							<th class="text-center">Fecha publicación</th>
							<th class="text-center">Estado</th>
							<th class="text-center">Acciones</th>
						</tr>
					</thead>
					<tbody>
					@foreach($rows as $item)
						@php
							$row_id = $item->id;
							$row_url = $item->url;
							$row_titulo = $item->titulo;
							$row_visibilidad = $item->visibilidad ? '' : '<span class="m--font-boldest m--font-transform-u"> - Privado</span>';
							$row_fecha = $item->fecha_publicacion;
							$row_publicar = $item->publicar ?
							'<div class="m-badge m-badge--brand m-badge--wide m-badge--rounded">Publicado</div>' :
							'<div class="m-badge m-badge--warning m-badge--wide m-badge--rounded">Borrador</div>';
						@endphp
						<tr data-id="{{ $row_id }}" data-title="{{ $row_titulo }}" data-url="/admin/blog/noticias/{{ $row_id }}">
							<td>
								@if($item->publicar == 1 AND $item->visibilidad == 1)
								<a href="{{ $row_url }}" target="_blank" class="btn btn-info m-btn m-btn--icon btn-sm m-btn--icon-only">
									<i class="fa fa-external-link"></i>
								</a>
								@endif
								{!! '<span class="m--font-bolder"> '.$row_titulo.'</span>'.$row_visibilidad !!}
							</td>
							<td class="text-center">{{ $row_fecha }}</td>
							<td class="text-center">{!! $row_publicar !!}</td>
							<td class="text-center">
								<div class="btn-group">
									<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Acciones
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="{{ route('admin.blog.noticias.img.list', $row_id) }}">Imagenes</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('admin.blog.noticias.edit', $row_id) }}">Editar</a>
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
@stop