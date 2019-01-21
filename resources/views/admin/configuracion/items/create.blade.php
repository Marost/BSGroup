@extends('admin.layout.index')

@section('contenido_titulo')
	{{ ucfirst($url) }}
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	{!! Form::open(['route' => ['admin.configuracion.url.items.store', $url], 'method' => 'POST', 'files' => 'true', 'class' => 'row']) !!}
	<div class="col-md-9">
		<!--begin::Portlet-->
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Añadir nuevo registro
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<div class="m-form m-form--fit m-form--label-align-right">
				<div class="m-portlet__body">
					@if($url == 'redes-sociales')
						<div class="form-group m-form__group">
							<label>Elegir red social</label>
							{!! Form::select('red', ['' => ''] + $iconsRedes, null, ['class' => 'form-control m-select2 select-redsocial']) !!}
						</div>

						<div class="form-group m-form__group">
							<label>Enlace</label>
							{!! Form::text('enlace', null, ['class' => 'form-control m-input']) !!}
						</div>
					@else
						<div class="form-group m-form__group">
							<label>Titulo</label>
							{!! Form::text('titulo', null, ['class' => 'form-control m-input']) !!}
						</div>
					@endif

					@if($url == 'testimonios')
						<div class="form-group m-form__group">
							<label>Descripción</label>
							{!! Form::textarea('descripcion', null, ['class' => 'form-control m-input', 'rows' => 3]) !!}
						</div>
					@endif
				</div>
			</div>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>

	<div class="col-md-3">
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
						<button type="submit" name="publicar" class="btn btn-brand">Guardar</button>
					</div>
				</div>
			</div>
		</div>
		<!--end::Portlet-->

		@if($url == 'clientes' OR $url == 'marcas' OR $url == 'testimonios')
			<!--begin::Portlet-->
			<div class="m-portlet m-portlet--tab">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Imagen
							</h3>
						</div>
					</div>
				</div>
				<div class="m-form m-form--fit m-form--label-align-right">

					<div class="m-portlet__body">
						<div class="form-group m-form__group">
							<div class="m-dropzone m-dropzone--brand dropzone" id="m-dropzone-one"></div>
							{!! Form::hidden('imagen', null, ['id' => 'upload_imagen']) !!}
							{!! Form::hidden('imagen_carpeta', null, ['id' => 'upload_imagen_carpeta']) !!}
						</div>
					</div>
				</div>
			</div>
			<!--end::Portlet-->
		@endif
	</div>
	{!! Form::close() !!}
@stop

@section('contenido_footer')
@stop