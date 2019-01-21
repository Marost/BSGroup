@extends('admin.layout.index')

@php
	if(Request::input('start') <> "" OR Request::input('end') <> ""){
		$buscar = true;
	}else{
		$buscar = false;
	}

	if(Request::input('start') <> "" AND Request::input('end')){
		$fecha = Request::input('start').' / '.Request::input('end');
	}else{ $fecha = ''; }
@endphp

@section('contenido_titulo')
	Contacto - Mensajes
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
							{!! Form::model(Request::all(), ['route' => ['admin.formularios.mensajes.index', $url], 'method' => 'GET', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) !!}
								<div class="m-portlet__body">
									<div class="form-group m-form__group row">
										<div class="col-lg-3">
											<label>Fecha de envío</label>
											<div class='input-group input-daterangepicker'>
												<input name="rango-fechas" type='text' class="form-control m-input" readonly placeholder="Seleccionar rango de fechas" value="{{ $fecha }}"/>
												{!! Form::hidden('start') !!}
												{!! Form::hidden('end') !!}
												<span class="input-group-addon">
													<i class="la la-calendar-check-o"></i>
												</span>
											</div>
											<span class="m-form__help"><a href="#" class="eliminar-fecha">Eliminar fecha de envío</a></span>
										</div>
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
									<div class="m-form__actions m-form__actions--solid">
										<div class="row">
											<div class="col-lg-5"></div>
											<div class="col-lg-7">
												<button type="submit" class="btn btn-brand">Buscar</button>
												<a href="{{ route('admin.formularios.mensajes.index', $url) }}" class="btn btn-secondary">Cancelar</a>
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
							<th>Nombre</th>
							<th class="text-center">Enviado el</th>
							<th class="text-center">Acciones</th>
						</tr>
					</thead>
					<tbody>
					@foreach($rows as $item)
						@php
							$row_id = $item->id;
							$row_titulo = $item->nombres;
							$row_fecha = $item->fecha_envio;
						@endphp
						<tr data-id="{{ $row_id }}" data-title="{{ $row_titulo }}" data-url="/admin/formularios/mensajes/{{ $url }}/{{ $row_id }}">
							<td>{!! '<span class="m--font-bolder">'.$row_titulo.'</span>' !!}</td>
							<td class="text-center">{{ $row_fecha }}</td>
							<td class="text-center">
								<div class="btn-group">
									<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Acciones
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="{{ route('admin.formularios.mensajes.show', [$url, $row_id]) }}">Ver mensaje</a>
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