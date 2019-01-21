@extends('admin.layout.index')

@section('contenido_titulo')
	Usuarios
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	{!! Form::model($post, ['route' => ['admin.usuarios.update', $post->id], 'method' => 'PUT', 'files' => 'true', 'class' => 'row']) !!}
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
						<label>Nombres</label>
						{!! Form::text('nombres', $post->profile->nombres, ['class' => 'form-control m-input']) !!}
					</div>
					<div class="form-group m-form__group">
						<label>Apellidos</label>
						{!! Form::text('apellidos', $post->profile->apellidos, ['class' => 'form-control m-input']) !!}
					</div>
					<div class="form-group m-form__group">
						<label>Email</label>
						{!! Form::text('email', null, ['class' => 'form-control m-input']) !!}
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
						<label>Estado</label>
						{!! Form::select('estado', ['0' => 'Inactivo', '1' => 'Activo'], $post->estado, ['class' => 'form-control']) !!}
					</div>
				</div>

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
@stop