@extends('admin.layout.index')

@section('contenido_titulo')
	Noticias
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	{!! Form::open(['route' => 'admin.blog.noticias.store', 'method' => 'POST', 'files' => 'true', 'class' => 'row']) !!}
		<div class="col-md-9">
			<!--begin::Portlet-->
			<div class="m-portlet m-portlet--tab">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Añadir nueva entrada
							</h3>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<div class="m-form m-form--fit m-form--label-align-right">
					<div class="m-portlet__body">
						<div class="form-group m-form__group">
							<label>Titulo</label>
							{!! Form::text('titulo', null, ['class' => 'form-control form-control-lg m-input', 'placeholder' => 'Introduce el titulo aquí']) !!}
						</div>
						<div class="form-group m-form__group">
							<label>Descripción</label>
							{!! Form::textarea('descripcion', null, ['class' => 'form-control contador-caracteres', 'maxlength' => '300', 'rows' => '4', 'placeholder' => 'Ingresa una descripción breve de la entrada']) !!}
						</div>
						<div class="form-group m-form__group">
							<label>Contenido</label>
							{!! Form::textarea('contenido', null, ['id' => 'contenido', 'class' => 'editors form-control']) !!}
						</div>
						<div class="form-group m-form__group">
							<label>Etiquetas relacionadas a la entrada</label>
							{!! Form::select('tags', $tags, null , ['name' => 'tags[]', 'class' => 'form-control m-select2 select-tag', 'multiple']) !!}
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

					<div class="m-portlet__body">

						<div class="form-group m-form__group">
							<label>Categoría</label>
							{!! Form::select('categoria', ['' => ''] + $categorias, null, ['class' => 'form-control m-select2 select-categoria']) !!}
						</div>

						<div class="form-group m-form__group">
							<label>Visibilidad</label>
							{!! Form::select('visibilidad', [true => 'Público', false => 'Privado'], null, ['class' => 'form-control']) !!}
						</div>

						<div class="form-group m-form__group">
							<label>Fecha de publicación</label>
							<div class='input-group date input-datetimepicker'>
								{!! Form::text('published_at', date('d/m/Y H:i'), ['class' => 'form-control m-input', 'readonly']) !!}
								<span class="input-group-addon"><i class="la la-calendar glyphicon-th"></i></span>
							</div>
						</div>
					</div>

					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid m-form__actions--right">
							<button type="submit" value="0" name="publicar" class="btn btn-secondary">Solo guardar</button>
							<button type="submit" value="1" name="publicar" class="btn btn-brand">Publicar</button>
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
						<div class="form-group m-form__group">
							{!! Form::label('Dimensiones: 900x550') !!}
							<div class="m-dropzone m-dropzone--brand dropzone" id="m-dropzone-one"></div>
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