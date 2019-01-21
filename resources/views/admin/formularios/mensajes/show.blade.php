@extends('admin.layout.index')

@section('contenido_titulo')
	Contacto - Mensajes
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	<div class="row">
		<div class="col-md-9">
			<!--begin::Portlet-->
			<div class="m-portlet m-portlet--creative m-portlet--bordered-semi">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h2 class="m-portlet__head-label m-portlet__head-label--brand"><span>{{ $row->nombres }}</span></h2>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<p class="lead"><i class="la la-calendar-check-o"></i> {{ fechaPubAdmin($row->created_at) }}</p>
					<p class="lead"><i class="la la-at"></i> {{ $row->email }}</p>
					<p class="lead"><i class="la la-phone"></i> {{ $row->telefono }}</p>
					<p class="lead">{!! $row->mensaje !!}</p>
				</div>
			</div>
			<!--end::Portlet-->
		</div>

		<div class="col-md-3 pt-5">
			<!--begin::Portlet-->
			<div class="m-portlet m-portlet--tab">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Opciones
							</h3>
						</div>
					</div>
				</div>
				<div class="m-form m-form--fit m-form--label-align-right">
					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid m-form__actions--right">
							<a href="{{ route('admin.formularios.mensajes.index', $url) }}" class="btn btn-brand">Regresar</a>
						</div>
					</div>
				</div>
			</div>
			<!--end::Portlet-->
		</div>
	</div>
@stop

@section('contenido_footer')
@stop