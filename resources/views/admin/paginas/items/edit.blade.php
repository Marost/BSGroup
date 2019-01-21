@extends('admin.layout.index')

@section('contenido_titulo')
	{{ $row->titulo }} - Slider
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	{!! Form::model($post, ['route' => ['admin.paginas.items.update', $pagina, $post->id], 'method' => 'PUT', 'files' => 'true', 'class' => 'row']) !!}
	<div class="col-md-9">
		<!--begin::Portlet-->
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Editar registro
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<div class="m-form m-form--fit m-form--label-align-right">
				<div class="m-portlet__body">
					<div class="form-group m-form__group">
						<label>Titulo</label>
						{!! Form::text('titulo', $post->valor, ['class' => 'form-control m-input']) !!}
					</div>

					<div class="form-group m-form__group">
						<label>Subtitulo</label>
						{!! Form::text('subtitulo', $post->subtitulo, ['class' => 'form-control m-input']) !!}
					</div>

					<div class="form-group m-form__group">
						<label>Boton - Nombre</label>
						{!! Form::text('boton', $post->boton, ['class' => 'form-control m-input']) !!}
					</div>

					<div class="form-group m-form__group">
						<label>Boton - Enlace</label>
						{!! Form::text('boton_enlace', $post->boton_enlace, ['class' => 'form-control m-input']) !!}
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
						<button type="submit" name="publicar" class="btn btn-brand">Guardar</button>
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
						{!! Form::label('Dimensiones: 1600x900') !!}
						<div class="m-dropzone m-dropzone--primary dropzone" id="m-dropzone-one"></div>
						{!! Form::hidden('imagen', $post->imagen, ['id' => 'upload_imagen']) !!}
						{!! Form::hidden('imagen_carpeta', $post->carpeta, ['id' => 'upload_imagen_carpeta']) !!}
					</div>
				</div>
			</div>
		</div>
		<!--end::Portlet-->
	</div>
	{!! Form::close() !!}
@stop

@section('contenido_footer')
@stop