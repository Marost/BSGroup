@extends('admin.layout.index')

@section('contenido_titulo')
	Menú
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	{!! Form::model($post, ['route' => ['admin.configuracion.menu.update', $post->id], 'method' => 'PUT', 'files' => 'true', 'class' => 'row']) !!}
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
						{!! Form::text('titulo', null, ['class' => 'form-control form-control-lg m-input', 'placeholder' => 'Introduce el titulo aquí']) !!}
					</div>
					<div class="form-group m-form__group">
						<label>Descripción</label>
						{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 3]) !!}
					</div>
					<div class="form-group m-form__group">
						<label>URL</label>
						@if($post->tipo == 'enlace')
							{!! Form::text('url', null, ['class' => 'form-control m-input']) !!}
						@else
							{!! Form::text('url', $post->url_enlace, ['class' => 'form-control m-input', 'disabled']) !!}
						@endif
					</div>
					<div class="form-group m-form__group">
						<label>Class</label>
						{!! Form::text('class', null, ['class' => 'form-control', 'placeholder' => 'Introduce el nombre de las clases']) !!}
					</div>
					<div class="form-group m-form__group">
						<label>Icono</label>
						{!! Form::text('icono', null, ['class' => 'form-control', 'placeholder' => 'Introduce la clase del icono']) !!}
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
						<button type="submit" class="btn btn-primary">Actualizar</button>
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