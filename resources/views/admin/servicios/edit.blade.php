@extends('admin.layout.index')

@section('contenido_titulo')
	Servicios
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	{!! Form::model($post, ['route' => ['admin.servicios.update', $post->id], 'method' => 'PUT', 'files' => 'true', 'class' => 'row']) !!}
	<div class="col-md-9">
		<!--begin::Portlet-->
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Editar
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<div class="m-form m-form--fit m-form--label-align-right">
				<div class="m-portlet__body">
					<div class="form-group m-form__group">
						<label>Titulo</label>
						{!! Form::text('titulo', null, ['id' => 'titulo', 'class' => 'form-control form-control-lg m-input', 'placeholder' => 'Introduce el titulo aquí']) !!}
					</div>

					<div class="form-group m-form__group">
						<label>Descripción</label>
						{!! Form::textarea('descripcion', null, ['class' => 'form-control contador-caracteres', 'maxlength' => '300', 'rows' => '4', 'placeholder' => 'Ingresa una descripción breve de la entrada']) !!}
					</div>

					<<div class="form-group m-form__group">
						<label>Contenido</label>
						{!! Form::textarea('contenido', null, ['id' => 'contenido', 'class' => 'editors form-control']) !!}
					</div>
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
						<button type="submit" value="0" name="publicar" class="btn btn-secondary">No publicar</button>
						<button type="submit" value="1" name="publicar" class="btn btn-brand">Actualizar</button>
					</div>
				</div>
			</div>
		</div>
		<!--end::Portlet-->

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
					@if($post->imagen <> "")
						<div class="form-group m-form__group">
							<img src="{{ $post->imagen_admin }}" alt="Imagen">
						</div>
					@endif

					<div class="form-group m-form__group">
						{!! Form::label('Dimensiones: 900x550') !!}
						<div class="m-dropzone m-dropzone--primary dropzone" id="m-dropzone-one"></div>
						{!! Form::hidden('imagen', null, ['id' => 'upload_imagen']) !!}
						{!! Form::hidden('imagen_carpeta', null, ['id' => 'upload_imagen_carpeta']) !!}
					</div>
				</div>
			</div>
		</div>
		<!--end::Portlet-->
	</div>
	{!! Form::close() !!}
@stop

@section('contenido_footer')
	{{-- CKEDITOR --}}
	{!! Html::script('//cdn.ckeditor.com/4.6.2/full/ckeditor.js') !!}
	{!! Html::script('/assets/app/js/ckeditor.js') !!}
@stop