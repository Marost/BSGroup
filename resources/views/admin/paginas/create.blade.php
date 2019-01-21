@extends('admin.layout.index')

@section('contenido_titulo')
	Paginas
@stop

@section('contenido_header')

@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	{!! Form::open(['route' => ['admin.paginas.store'], 'method' => 'POST', 'files' => 'true', 'class' => 'row']) !!}
		<div class="col-md-9">
			<!--begin::Portlet-->
			<div class="m-portlet m-portlet--tab">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Añadir nueva página
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
							<label>URL</label>
							<div class="input-group m-input-group">
								<div class="input-group-prepend"><span class="input-group-text">{!! Request::root() !!}/</span></div>
								{!! Form::text('slug_url', null, ['id' => 'url', 'class' => 'form-control m-input']) !!}
							</div>
							<span class="m-form__help">El URL se autogenerará al terminar de escribir el titulo. Tambien podrá editarlo.</span>
						</div>

						<div class="form-group m-form__group">
							<label>Descripción</label>
							{!! Form::textarea('descripcion', null, ['class' => 'form-control contador-caracteres', 'maxlength' => '300', 'rows' => '4', 'placeholder' => 'Ingresa una descripción breve de la entrada']) !!}
						</div>

						<div class="form-group m-form__group">
							<label>Palabras clave</label>
							{!! Form::textarea('keywords', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Ingresa un lista de palabras clave separados por coma.']) !!}
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
	<script src="/assets/app/js/jquery.seourl.min.js"></script>
	<script>
        $(document).ready(function(){
            $('#titulo').on('keyup', function() {
                $('#url').val($(this).val().seoURL({
	                'transliterate': false,
	                'lowercase': true
                }));
            });
        });
	</script>
@stop