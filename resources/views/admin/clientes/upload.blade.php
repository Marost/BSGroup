@extends('admin.layout.index')

@section('contenido_titulo')
	Subir clientes
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	<div class="col-md-12">
		<!--begin::Portlet-->
		<div class="m-portlet m-portlet--tab">
			<div class="m-form m-form--fit m-form--label-align-right">
				<div class="m-portlet__body">
					<div class="form-group m-form__group">
						{!! Form::open(['route' => ['admin.clientes.img.store'], 'method' => 'POST', 'class' => 'm-dropzone m-dropzone--brand dropzone']) !!}
							<div class="dz-default dz-message"><span>Seleccionar las imagenes que desea subir.</span></div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		<!--end::Portlet-->
	</div>
@stop

@section('contenido_footer')
@stop