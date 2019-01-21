@extends('admin.layout.index')

@section('contenido_titulo')
	Usuarios
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	{!! Form::open(['route' => ['admin.usuarios.password.cambiar', $row->id], 'method' => 'PUT', 'class' => 'row']) !!}
		<div class="col-md-9">
			<!--begin::Portlet-->
			<div class="m-portlet m-portlet--tab">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Cambiar contraseña
							</h3>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<div class="m-form m-form--fit m-form--label-align-right">
					<div class="m-portlet__body">
						<div class="form-group m-form__group">
							<label>Email</label>
							<span class="form-control m-input disabled">{{ $row->email }}</span>
						</div>
						<div class="form-group m-form__group">
							<label>Contraseña</label>
							<div class="input-group">
								<span class="input-group-btn"><a id="password-refresh" href="#" class="btn btn-info"><i class="fa fa-refresh"></i> Nueva contraseña</a></span>
								{!! Form::password('password', ['class' => 'form-control m-input']) !!}
								<span class="input-group-btn"><a id="password-view" href="#" class="btn btn-danger" data-toggle="0"><i class="fa fa-eye"></i> Mostrar</a></span>
							</div>
						</div>
						<div class="m-form__group form-group">
							<label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
								{!! Form::checkbox('enviar_correo', 1, 'checked') !!}
								Envía al usuario nuevo un correo electrónico con información sobre su cuenta.
								<span></span>
							</label>
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
							<button type="submit" class="btn btn-brand">Guardar</button>
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